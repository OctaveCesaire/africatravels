<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyages;

class ViewsClients extends Controller
{
    //
    function index() {return view('pages.clients.index');}
    function about(){return view('pages.clients.about-us');}
    function trip(){$eventList = Voyages::all();return view('pages.clients.voyages')->with('list',$eventList);}
}
