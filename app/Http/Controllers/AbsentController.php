<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsentController extends Controller
{
    public function index()
    {
        return view('pages.event.detailEvent.absent.list-user-absent');
    }
}
