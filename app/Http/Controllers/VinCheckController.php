<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use App\Models\VinReport;
use App\Models\VinUserLessReport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use \Illuminate\Foundation\Application;

class VinCheckController extends BaseController
{

    //VinBasic  = https://mc-api.marketcheck.com/v2/decode/car/1FAHP3F28CL148530/specs?api_key={{api_key}}
    //NeoVIN    = https://mc-api.marketcheck.com/v2/decode/car/neovin/1FAHP3F28CL148530/specs?api_key={{api_key}}&include_generic=true
    //Enhanced  = https://mc-api.marketcheck.com/v2/decode/car/epi/1FAHP3F28CL148530/specs?api_key={{api_key}}

    private string $vinCheckBase;

    public function __construct()
    {
        $this->vinCheckBase = "https://mc-api.marketcheck.com/v2";
    }



    /**
     * @return Factory|View|Application
     */
    public function listReports():Factory|View|Application
    {
        // Fetch all reports for the authenticated user
        $reports = VinReport::where('user_id', auth()->id())->get();

        // Return the view with the list of reports
        return view('front.dashboard.reports', compact('reports'));
    }


    /**
     * @param $vin
     * @return JsonResponse
     */
    public function viewReport($vin): JsonResponse
    {
        // Find the report by VIN and the authenticated user
        $report = VinReport::where('vin_code', $vin)->firstOrFail();

        if (!$report) {
            return response()->json(['report'=>[], 'error' => 'VIN report not found'], 404);
        }

        return response()->json(['report' => $report->json_data], 200);

    }


    /**
     * run vin-decode api request
     * @param Request $request
     * @return JsonResponse
     */
    public function vinCheck(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'vin'   => 'string|required|min:17',
            'type'  => 'string|required',
            'api'   => 'nullable|string',
        ]);

        if ($validator->fails())
        {
            return $this->sendException($validator->errors(), 401);
        }

        //try {

            $user = null;

            if (Auth::check())
            {
                $user = Auth::user();

                $vinCheck = VinReport::where(['vin_code' => $request->vin, 'user_id' => auth()->id()])->first();
                if(!$vinCheck)
                {
                    $vinCheck = VinUserLessReport::where('vin_code', $request->vin)->first();
                    if($vinCheck)
                    {
                        VinReport::updateOrCreate(
                            ['vin_code' => $request->vin, 'user_id' => auth()->id()],
                            [
                                'json_data' => $vinCheck->json_data,
                                'refresh_count' => $vinCheck ? $vinCheck->refresh_count + 1 : 1,
                            ]
                        );
                    }
                }

            }else{
                $vinCheck = VinUserLessReport::where('vin_code', $request->vin)->first();
            }



            // continue to handle the vin-check response
            $response = $vinCheck;
            $info   = "Something went wrong!";
            if(!$response)
            {
                $response   = $this->vinDecode($request->vin, (isset($response->api)) ? $response->api : null);
                $info       = $response['info'];
                $response   = $response['response'];
            }


            $decoded = json_decode($response, true);
            if(!isset($decoded['message']))
            {
                $saveData = [
                    'json_data' => $decoded,  // Overwrite the entire json_data
                    'refresh_count' => $vinCheck ? $vinCheck->refresh_count + 1 : 1,
                ];

                if ($user) {
                    VinReport::updateOrCreate(['vin_code' => $request->vin, 'user_id' => $user->id], $saveData);
                } else {
                    VinUserLessReport::updateOrCreate(['vin_code' => $request->vin], $saveData);
                }

                switch ($user)
                {
                    // user has an active subscription
                    case ($user && $user->hasActiveSubscription()):
                        $decoded = $decoded;
                        break;

                    // user has a pending subscription
                    case ($user && $user->hasPendingSubscription()):
                        $decoded = Helper::getFirstHalfArray($decoded);
                        break;

                    // user has an active subscription.
                    case ($user && $user->hasExpiredSubscription()):
                        // check if the record from DB return full report else half
                        if(!($vinCheck && Auth::check()))
                        {
                            $decoded = Helper::getFirstHalfArray($decoded);
                        }
                        break;

                    default:
                        $decoded = Helper::getFirstHalfArray($decoded);
                }

                return $this->sendResponse($decoded, 'API Response');

            }else{
                return $this->sendError($decoded['message'], $info['http_code']);
            }

        /*}catch(\Exception $e)
        {
            return $this->sendError($e->getMessage(), $e->getCode());
        }*/
    }


    /**
     * run vin decode api request
     * @param $vin
     * @param $api
     * @return array
     */
    private function vinDecode($vin, $api): array
    {
        switch ($api)
        {
            case "neovin": // neovin check
                $action   = $this->vinCheckBase.'/decode/car/neovin/'.$vin.'/specs?api_key='.env("VIN_KEY").'&include_generic=true';
                break;

            case "epi": // epi - enhanced vin-check
                $action   = $this->vinCheckBase.'/decode/car/epi/'.$vin.'/specs?api_key='.env("VIN_KEY");
                break;

            default: // basic vic-check
                $action   = $this->vinCheckBase.'/decode/car/'.$vin.'/specs?api_key='.env("VIN_KEY");
        }

        $curl       = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $action,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);

        //dd($response);

        return ['response' => $response, 'info' => $info];
    }


}
