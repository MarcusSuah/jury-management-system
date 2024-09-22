<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{

    public function homepage()
    {
        return view("panel.homepage");
    }
}
