<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shops;

class AboutController extends Controller
{
    public function index(){
        return view('about',['shops'=>Shops::all()]);
    }
}
