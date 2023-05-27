@extends('layouts.app')
@section('content')
@include('layouts.message')
    <h2 class="text-4xl text-blue-600 border-b-4 border-blue-300">Gallery</h2>

    <div class="my-5 text-right">
        <a href="{{route('gallery.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Add Gallery</a>
    </div>

    <table id="mytable" class="display">
        <thead>
            <th>Order</th>
            <th>Description</th>
            <th>Pictures</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($galleries as $gallery)
            <tr>
                <td>{{$gallery->priority}}</td>
                <td>{{$gallery->description}}</td>
                <td><img class="w-32 " src="{{asset('images/gallery/'.$gallery->photopath)}}" alt="bcaclass"></td>
                <td>
                    <a href="{{route('gallery.edit',$gallery->id)}}" class="bg-blue-600 text-white px-3 py-1 rounded-lg mx-1">Edit</a>
                    <a onclick="showDelete('{{$gallery->id}}')" class="bg-red-600 text-white px-3 py-1 rounded-lg mx-1 cursor-pointer">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="deletebox" class="hidden fixed inset-0 bg-blue-500 bg-opacity-40 backdrop-blur-sm">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-6 rounded-lg">
                <p class="font-bold text-2xl">Are you sure to Delete ?</p>
                <form action="{{route('gallery.delete')}}" method="POST" class="flex justify-center mt-2">
                    @csrf
                    <input type="hidden" id="dataid" name="dataid" value="">
                    <input type="submit" value="Yes" class="bg-blue-600 text-white rounded-lg cursor-pointer px-8 py-2 mx-1">
                    <a onclick="hideDelete()" class="bg-red-600 text-white rounded-lg cursor-pointer px-8 py-2 mx-1">Exit</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#mytable').DataTable();
        });
    </script>

    <script>
        function showDelete(id)
        {
            $('#deletebox').removeClass('hidden');
            $('#dataid').val(id);
        }
        function hideDelete()
        {
            $('#deletebox').addClass('hidden');
        }
    </script>

@endsection