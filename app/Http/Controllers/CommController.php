<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommController extends Controller
{
    //
    public function getCommission()
    {
        return view('comm');
    }
}
