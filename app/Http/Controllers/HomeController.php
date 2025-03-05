<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Member;
use App\Models\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login()
    {
        return view('login');
    }
    
    //delete index leter
    public function index()
    {
        return view('index');
    }
    public function tables()
    {
        return view('tables');
    }
}
