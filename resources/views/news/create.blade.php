@extends('layouts.app')
@section('content')
<h2 class="text-4xl text-blue-600 border-b-4 border-blue-300">Add News</h2>

<form action="{{route('news.store')}}" method="POST" class="py-5" enctype="multipart/form-data">
    @csrf
    <select name="category_id" id="" class="w-full rounded-lg mt-5">
        <option selected disabled>Choose a Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <input type="date" class="w-full rounded-lg mt-5" name="news_date" value="{{old('news_date')}}">
    @error('priority')
        <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <input type="text" class="w-full rounded-lg mt-5" name="title" placeholder="Title" value="{{old('title')}}">
    @error('priority')
        <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <input type="text" class="w-full rounded-lg mt-5" placeholder="Description" name="description" value="{{old('description')}}">
    @error('description')
        <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <input type="file" name="photopath" class="mt-5">
    @error('photopath')
    <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <div class="mt-4 flex">
        <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded cursor-pointer" value="Add News">
        <a href="{{route('news.index')}}" class="bg-red-600 text-white px-6 mx-2 py-2 rounded">Exit</a>
    </div>
</form>
@endsection