<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use \Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class SettingController extends Controller
{
    /**
     * **********************************************************************************************************
     *      Note: the controller is crucial don't make change without understanding the logics
     * **********************************************************************************************************
     */



    /**
     * load user defined settings either admin or customer
     * @return Factory|View|Application
     */
    public function editUserSettings(): Factory|View|Application
    {
        $user = auth()->user();

        // if the auth user is admin load data and UI as per admin
        if(auth()->user()->isAdmin())
        {
            $settings = $user->settings()->get();
            return view('admin.settings.edit', compact('settings'));
        }

        // else load for normal user load data and UI as per admin
        $settings = $user->settings()->pluck('value', 'key')->toArray();

        // load payment settings of the user
        if(Route::currentRouteName() == 'payments')
        {
            return view('front.dashboard.payments', compact('settings'));
        }

        // else load general settings of the user
        return view('front.dashboard.settings', compact('settings'));
    }



    /**
     * update settings, as per selected input type
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateUserSettings(Request $request): RedirectResponse
    {
        $input = $request->all();

        foreach ($input['keys'] as $index => $key) {

            // Check if the key exists for values and input_types
            if (!isset($input['values'][$index]) || !isset($input['input_types'][$index])) {
                continue; // Skip this iteration if data is missing
            }

            // Prioritize specific input if present (like 'receive-news-alerts'), otherwise use values[]
            if (isset($input[$key])) {
                $value = $input[$key]; // Use the specific input value
            } else {
                $value = $input['values'][$index]; // Fallback to the dynamic 'values[]' array
            }

            $inputType = $input['input_types'][$index];
            // Handle different input types
            switch ($inputType) {
                case 'number':
                case 'float':
                    $value = (float) $value;
                    break;
                case 'date':
                    $value = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
                    break;
                default:
                    $value = (string) $value;  // Default to string for text/textarea
                    break;
            }

            // Save settings with input type
            auth()->user()->settings()->updateOrCreate(
                ['key' => str_replace(' ','-',strtolower($key))],
                ['value' => $value, 'input_type' => $inputType]
            );
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }


}
