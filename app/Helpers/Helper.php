<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class Helper
{
    /**
     * Load permissions from the JSON file
     *
     * @return array|mixed
     */
    public static function curl($action, $request='GET', $data=[])
    {
        $curl       = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $action,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $request,
        ));

        if($request=='POST'){
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }


        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);

        return ['response' => $response, 'info' => $info];
    }


    /**
     * pass an array and get 1st half
     * @param $decoded_array
     * @return array
     */
    public static function getFirstHalfArray($decoded_array)
    {
        // Calculate the middle index of the array
        $middleIndex = ceil(count($decoded_array) / 2);
        // Get the first half of the array
        return array_slice($decoded_array, 0, $middleIndex);
    }

}
