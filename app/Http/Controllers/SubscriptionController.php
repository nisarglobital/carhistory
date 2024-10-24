<?php

namespace App\Http\Controllers;

use App\Models\PlanSubscription;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class SubscriptionController extends Controller
{

    /**
     * ******************************************
     *          User/Frontend Functions
     * ******************************************
     */


    /**
     * user's subscriptions to frontend
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $data = PlanSubscription::where('user_id',auth()->id())->orderBy('id','desc')->get();
        return view('front/dashboard/subscriptions', compact('data'));
    }




    /**
     * ******************************************
     *          Admin/Backend Functions
     * ******************************************
     */


    /**
     * return all subscriptions
     * @return Factory|View|Application
     */
    public function listSubscriptions(): Factory|View|Application
    {
        $data = PlanSubscription::with('user:id,name')->orderBy('id','desc')->get();
        $data->map(function ($item) {
            $item->subscription_data = json_decode($item->subscription_data);
        });
        return view('admin.subscriptions.index', compact('data'));
    }



}
