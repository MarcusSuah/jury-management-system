<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LockscreenController extends Controller
{

    public function lockscreen()
    {
        return view("panel.lockscreen");
    }
}
