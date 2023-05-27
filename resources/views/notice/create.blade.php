@extends('layouts.app')
@section('content')
<h2 class="text-4xl text-blue-600 border-b-4 border-blue-300">Add New Notice</h2>

<form action="{{route('notice.store')}}" method="POST" class="py-5">
    @csrf
    <input type="text" class="w-full rounded-lg mt-5" placeholder="Notice" name="notice" value="{{old('notice')}}">
    @error('notice')
        <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror
    <input type="text" class="w-full rounded-lg mt-5" placeholder="Priority" name="priority" value="{{old('priority')}}">
    @error('priority')
        <p class="text-red-600 text-sm">* {{$message}}</p>
    @enderror

    <div class="mt-4 flex">
        <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded cursor-pointer" value="Add Notice">
        <a href="{{route('notice.index')}}" class="bg-red-600 text-white px-6 mx-2 py-2 rounded">Exit</a>
    </div>
</form>
@endsection