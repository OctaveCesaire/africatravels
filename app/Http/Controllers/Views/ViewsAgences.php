<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyages;

class ViewsAgences extends Controller
{
    //
    function index(){return view('pages.managers.index');}
    function event(){$eventList = Voyages::all();return view('pages.managers.event')->with('list',$eventList);}
    function transaction(){$eventList = Voyages::all();return view('pages.managers.transaction')->with('list',$eventList);}
}
