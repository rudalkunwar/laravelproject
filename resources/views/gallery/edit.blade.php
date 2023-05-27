@extends('layouts.app')
@section('content')
<h2 class="text-4xl text-blue-600 border-b-4 border-blue-300">Edit Gallery</h2>

<form action="{{route('gallery.update',$gallery->id)}}" method="POST" class="py-5" enctype="multipart/form-data">
    @csrf
    <input type="text" class="w-full rounded-lg mt-5" placeholder="Description" name="description" value="{{$gallery->description}}">
    @error('description')
        <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <input type="text" class="w-full rounded-lg mt-5" placeholder="Priority" name="priority" value="{{$gallery->priority}}">
    @error('priority')
        <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <p>Current Image: <br></p>
    <img class="w-32" src="{{asset('images/gallery/'.$gallery->photopath)}}" alt="">
    <input type="file" name="photopath" class="mt-5">
    @error('photopath')
    <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <div class="mt-4 flex">
        <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded cursor-pointer" value="Update Gallery">
        <a href="{{route('gallery.index')}}" class="bg-red-600 text-white px-6 mx-2 py-2 rounded">Exit</a>
    </div>
</form>
@endsection