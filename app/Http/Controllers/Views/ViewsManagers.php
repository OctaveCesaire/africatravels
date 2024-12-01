<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyages;

class ViewsManagers extends Controller
{
    //
    function index(){return view('pages.arc.index');}
    function transactions(){$eventList = Voyages::all();return view('pages.arc.transaction')->with('list',$eventList);}
    function classsement(){$eventList = Voyages::all();return view('pages.arc.classement')->with('list',$eventList);}
    function analytic(){$eventList = Voyages::all();return view('pages.arc.analytic')->with('list',$eventList);}
}
