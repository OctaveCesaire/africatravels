<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyages;
use App\Models\Transactions;

class ViewsAgences extends Controller
{
    //
    function index(){
        $transactionStats = Transactions::all();
        $chartData = $transactionStats->map(function ($stat) {
            return ['label' => $stat->status, 'value' => $stat->count];
        });
        return view('pages.managers.index')->with('chartData', $chartData);
    }
    function event(){
        $eventList = Voyages::select('id','titre','status','eventDate')->get();
        return view('pages.managers.event')->with('list',$eventList);
    }
    function transaction(){
        $eventList = Transactions::select('transactions.id','name','status','transactions.created_at')->join('users','users.id','transactions.user_id')
                    ->get();
        return view('pages.managers.transaction')->with('list',$eventList);}
}
