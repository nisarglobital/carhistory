<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use \App\Http\Controllers\Admin\PlanController as AdminPlanController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plans = (new AdminPlanController())->getPlanByCategory();
        return view('front/home', compact('plans'));
    }
}
