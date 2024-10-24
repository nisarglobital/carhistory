<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class PermissionHelper
{
    /**
     * Load permissions from the JSON file
     *
     * @return array|mixed
     */
    public static function getCategoriesWithPermissions()
    {
        $jsonPath = storage_path('permissions.json');

        if (!File::exists($jsonPath)) {
            return [];
        }

        $json = File::get($jsonPath);
        return json_decode($json, true);
    }

    /**
     * Function to update permission in JSON
     *
     * @param $permissionName
     * @param $category
     * @param $oldName
     * @return void
     */
    public static function updatePermissionInJson($permissionName, $category, $oldName = null)
    {
        // If an old name is passed, remove it first
        if ($oldName) {
            self::removePermissionFromJson($oldName);
        }

        $jsonPath = storage_path('permissions.json');
        $permissionsData = self::getCategoriesWithPermissions();

        // Add the new permission to the category
        if (!isset($permissionsData[$category])) {
            $permissionsData[$category] = [];
        }

        // Add permission to the category if it's not already present
        if (!in_array($permissionName, $permissionsData[$category])) {
            $permissionsData[$category][] = $permissionName;
        }

        // Save back to the JSON file
        File::put($jsonPath, json_encode($permissionsData, JSON_PRETTY_PRINT));
    }

    /**
     * Function to remove permission from JSON
     *
     * @param $permissionName
     * @return void
     */
    public static function removePermissionFromJson($permissionName)
    {
        $jsonPath = storage_path('permissions.json');
        $permissionsData = self::getCategoriesWithPermissions();

        foreach ($permissionsData as $category => $permissions) {
            if (($key = array_search($permissionName, $permissions)) !== false) {
                // Remove the permission and re-index the array
                unset($permissionsData[$category][$key]);

                // Re-index the permissions array to avoid gaps in indices
                $permissionsData[$category] = array_values($permissionsData[$category]);
            }
        }

        // Save back to the JSON file
        File::put($jsonPath, json_encode($permissionsData, JSON_PRETTY_PRINT));
    }
}
