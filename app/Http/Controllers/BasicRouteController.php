<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicRouteController extends Controller
{
    public function show() {
        return view('main_page');
    }
}
