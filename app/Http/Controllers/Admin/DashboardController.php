<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller as Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin/dashboard');
    }

}
