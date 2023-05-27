<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index',compact('categories'));

    }
    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'priority'=>'required|numeric'
        ]);
        Category::create($data);
        return redirect(route('category.index'))->with('success','Category Added Sucessfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $data = $request->validate([
            'name'=>'required',
            'priority'=>'required|numeric'
        ]);
        $category = Category::find($id);
        $category->update($data);
        return redirect(route('category.index'))->with('success','Category Updated Sucessfully');
    }
    
    public function delete(Request $request)
    {
        $category = Category::find($request->dataid);
        $category->delete();
        return redirect(route('category.index'))->with('success','Category Deleted Sucessfully');
    }
}
