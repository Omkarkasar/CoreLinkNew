<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Member;
use App\Models\Ourcst;
use App\Models\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function login()
    // {
    //     return view('login');
    // }
    
    //delete index leter
    public function index()
    {
        return view('index');
    }
    public function tables()
    {
        return view('tables');
    }
    public function ourcstform()
    {
        $regions = Region::all();
        $ourcst = Ourcst::all();
        $chapters = Chapter::all();
        return view('ourcstform', compact('regions', 'chapters'));
    }
    public function regionform()
    {
        return view('regionform');
    }

    public function chapterform()
    {
        $regions = Region::all();
        $chapters = Chapter::all();
        return view('chapterform', compact('regions', 'chapters'));
    }

    public function memberform()
    {
         $categorys=Category::all();
         $chapters=Chapter::all();
         $regions=Region::all();
         $members=Member::all();
         return view('memberform', compact('members','regions','chapters','categorys'));
    }
    public function categoryform()
    {
        return view('categoryform');
    }

    
}
