@extends('layouts.app')
@section('content')
   <h2 class="text-4xl text-blue-600 border-b-2 border-blue-300 bg-green-50">Dashboard</h2>
   <div class="mt-5 grid grid-cols-3 gap-5">
   <div class="bg-green-500 text-white flex jusify-between p-5 rounded-lg">
         <span class="text-xl">Total Categories</span>
         <span class="text-4xl font-bold pl-10">{{$tcategory}}</span>
      </div><div class="bg-blue-500 text-white flex jusify-between p-5 rounded-lg">
         <span class="text-xl">Total News</span>
         <span class="text-4xl font-bold pl-10">{{$tnews}}</span>
      </div><div class="bg-red-500 text-white flex jusify-between p-5 rounded-lg">
         <span class="text-xl">Total Notice</span>
         <span class="text-4xl font-bold pl-10">{{$tnotice}}</span>
      </div>
   </div>
@endsection