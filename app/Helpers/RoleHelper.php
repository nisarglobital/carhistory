<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class RoleHelper
{
    /**
     * Load permissions from the JSON file
     *
     * @return array|mixed
     */
    public static function getRoles($type = "")
    {
        $jsonPath = storage_path('roles.json');

        if (!File::exists($jsonPath)) {
            return [];
        }

        if(!empty($type))
        {
            $json = json_decode(File::get($jsonPath), true);
            return $json[$type];
        }

        $json = File::get($jsonPath);
        return json_decode($json, true);
    }

}
