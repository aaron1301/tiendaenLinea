<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class principalController extends Controller
{
    public function home(){
    	return view('principal');
    }
}
