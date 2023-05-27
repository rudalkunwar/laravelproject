<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('news.create',compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'category_id'=>'required',
            'description'=>'required',
            'photopath'=>'required',
            'title'=>'required',
            'news_date'=>'required',

        ]);
        if($request->file('photopath')){
            $file = $request->file('photopath');
            $filename = $file->getClientOriginalName();
            $photopath = time().'_'.$filename;
            $file->move(public_path('/images/news'),$photopath);
            $data['photopath']=$photopath;
        }
        News::create($data);
        return redirect(route('news.index'))->with('success','News Added Sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('news.edit',compact('news','categories'));
         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([

            'category_id'=>'required',
            'description'=>'required',
            'photopath'=>'nullable',
            'title'=>'required',
            'news_date'=>'required',

        ]);
       $data['photopath']=$news->photopath;
       if($request->file('photopath'))
       {
        $file=$request->file('photopath');
        $filename= $file->getClientOriginalName();
        $photopath = time().'_'.$filename;
        $file->move(public_path('/images/news/'),$photopath);
        File::delete(public_path('/images/news/'.$news->photopath));
        $data['photopath']=$photopath;
       }
        $news->update($data);
        return redirect(route('news.index'))->with('success','News Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $news = News::find($request->dataid);
        File::delete(public_path('/images/news/'.$news->photopath));
        $news->delete();
        return redirect(route('news.index'))->with ('success','News Delete Successfully');
    }
}
