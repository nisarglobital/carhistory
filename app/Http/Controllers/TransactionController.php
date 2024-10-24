<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class TransactionController extends Controller
{

    /**
     * ******************************************
     *          User/Frontend Functions
     * ******************************************
     */


    /**
     * user's transactions to frontend
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $data = Transaction::where('user_id',auth()->id())->orderBy('id','desc')->get();
        return view('front/dashboard/transactions', compact('data'));
    }






    /**
     * ******************************************
     *          Admin/Backend Functions
     * ******************************************
     */

    /**
     * return all transactions
     * @return Factory|View|Application
     */
    public function listTransactions(): Factory|View|Application
    {
        $data = Transaction::with('user:id,name')->orderBy('id','desc')->get();
        return view('admin.transactions.index', compact('data'));
    }

}
