<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @param array|object $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendResponse(array|object $result, string $message): JsonResponse
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @param $message
     * @param string|array|object $errors
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($message, string|array|object $errors = [], int $code = 404): JsonResponse
    {
    	$response = [
            'success'   => false,
            'message'   => $message,
        ];

        if(is_string($errors)){
            $response['error'] = $errors;
        }else{
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @param string $error
     * @param int $code
     * @return JsonResponse
     */
    public function sendException(string $error, int $code = 500): JsonResponse
    {
        $response = [
            'success'   => false,
            'message'   => 'Exception occurred.',
            'exception' => $error
        ];
        return response()->json($response, $code);
    }
}
