<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigConrtoller extends Controller
{
    public function index() {
        return view('back.config.index');
    }
}
