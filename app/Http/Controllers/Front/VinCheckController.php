<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class VinCheckController extends BaseController
{
    public function vinCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vin' => 'string|required|min:17',
            'type' => 'string|required'
        ]);

        if ($validator->fails())
        {
            return $this->sendException($validator->errors(), 401);
        }

        try {

            $filePath = storage_path('app/public/json_data.txt');
            if (File::exists($filePath)) {
                $response = File::get($filePath);
                $response = "";

            }else{

                /*$checkVin   = 'https://api.vehicledatabases.com/vin-decode/'.$request->vin;
                $curl       = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $checkVin,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'x-Authkey: 25c93c935444458cb1bd1e7937314d87'
                        //'x-Authkey: 8d3f39a32b4c4e9b9110a991d47f25df'
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);

                info($response);

                // save data for next time use instead of making api call
                $filePath = storage_path('app/public/json_data.txt'); // Change path as needed
                File::put($filePath, $response);*/
            }

            if(empty($response))
            {
                $checkVin   = 'https://mc-api.marketcheck.com/v2/decode/car/'.$request->vin.'/specs?api_key=qtrV82HdZjmVbqqubhNwvOMgeRP6COw5';
                $curl       = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $checkVin,
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

                // save data for next time use instead of making api call
                $filePath = storage_path('app/public/json_data.txt'); // Change path as needed
                File::put($filePath, $response);
            }

            $decoded = json_decode($response, true);
            if(!isset($decoded['message']))
            {
                /*// Calculate the middle index of the array
                $middleIndex = ceil(count($decoded) / 2);

                // Get the first half of the array
                $decoded     = array_slice($decoded, 0, $middleIndex);*/

                return $this->sendResponse($decoded, 'API Response');
            }else{
                return $this->sendError($decoded['message'], $info['http_code']);
            }

        }catch(\Exception $e)
        {
            return $this->sendError($e->getMessage(), $e->getCode());
        }

    }
}
