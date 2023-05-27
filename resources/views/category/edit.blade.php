@extends('layouts.app')
@section('content')
<h2 class="text-4xl text-blue-600 border-b-4 border-blue-300">Edit Category</h2>
<form action="{{route('category.update',$category->id)}}" method="POST" class="py-5">
    @csrf
    <input type="text" class="w-full rounded-lg mt-5 " placeholder="Category Name" name="name" value="{{$category->name}}">
    @error('name')
    <p class="text-red-600 text-sm">{{($message)}}</p>
    @enderror
    <input type="text" class="w-full rounded-lg mt-5 " placeholder="Priority" name="priority" value="{{$category->priority}}">
    @error('priority')
    <p class="text-red-600 text-sm">{{($message)}}</p>
    @enderror
    <div class="mt-4 flex">
        <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded cursor-pointer" value="Update Category">
        <a href="{{route('category.index')}}" class="bg-red-600 text-white px-6 nx-2 py-2 rounded">Exit</a>
    </div>
</form>
@endsection