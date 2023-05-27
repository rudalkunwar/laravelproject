<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Notice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $tcategory = Category::count();
        $tnews = News::count();
        $tnotice = Notice::count();
        return view('dashboard',compact('tcategory','tnews','tnotice'));
    }
}
