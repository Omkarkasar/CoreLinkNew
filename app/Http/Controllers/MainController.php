<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Member;
use App\Models\Ourcst;
use App\Models\Region;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //Our Cst Store
    public function ourcststore(Request $request)
    {
        $data = new Ourcst();
        $data->designation = $request->designation;
        $data->ourcstname = $request->ourcstname;
        $data->mobile = $request->mobile;
        $data->region = $request->region;
        $data->chapter = $request->chapter;
        $data->save();

        return response()->json(['success' => 'CST Member Created Successfully']);
    }
    public function ourcstget()
    {
        $data = Ourcst::all();
        return response()->json($data);
    }
    public function ourcstdelete($id)
    {
        $data = Ourcst::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'CST Member Deleted Successfully']);

    }
    //Region
    public function regionstore(Request $request)
    {
        $data = new Region();
        $data->regionname = $request->regionname;
        $data->save();

        return response()->json(['success' => 'Region Created Successfully']);
    }
    public function regionget()
    {
        $data = Region::all();
        return response()->json($data);
    }
    public function regiondelete($id)
    {
        $data = Region::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Region Deleted Successfully']);

    }
    //Chapter
    public function chapterstore(Request $request)
    {
        $data = new Chapter();
        $data->chaptername = $request->chaptername;
        $data->regionname = $request->regionname;
        $data->save();

        return response()->json(['success' => 'Chapter Created Successfully']);
    }

    public function chapterget()
    {
        $data = Chapter::all();
        return response()->json($data);
    }
    public function chapterdelete($id)
    {
        $data = Chapter::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Chapter Deleted Successfully']);
    }

    //Category
    public function categorystore(Request $request)
    {
        $data = new Category();
        $data->categoryname = $request->categoryname;
        $data->save();

        return response()->json(['success' => 'Category Created Successfully']);
    }

    public function categoryget()
    {
        $data = Category::all();
        return response()->json($data);
    }
    public function categorydelete($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Category Deleted Successfully']);
    }
    //Memmbers
    public function memberstore(Request $request)
    {
        $data = new Member();

        $data->membername = $request->membername;
        $data->memberemail = $request->memberemail;
        $data->membermobile = $request->membermobile;
        $data->membercompany = $request->membercompany;
        $data->categoryname = $request->categoryname;
        $data->chaptername = $request->chaptername;
        $data->regionname = $request->regionname;
        $data->save();

        return response()->json(['success' => 'Member Created Successfully']);
    }
    public function memberget()
    {
        $data = Member::all();
        return response()->json($data);
    }
    public function memberdelete($id)
    {
        $data = Member::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Member Deleted Successfully']);
    }
}
