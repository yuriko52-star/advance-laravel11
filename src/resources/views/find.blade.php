@extends('layouts.default')

<!-- <style> 
    th {
        background-color: #289adc;
        color: white;
        padding: 5px 40px;
    }
    td {
        padding: 25px 40px;
        background-color: #eee;
        text-align: center;
    }

</style>
-->
@section('title','find.blade.php')

@section('content')
<div class="p-6"></div>
<form action="find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}"class="w-3/4 h-12 border border-gray-300 text-left text-2xl rounded-md pl-4">
    <input type="submit" value="見つける" class="ml-8 px-6 py-2 bg-blue-400 text-white text-2xl rounded-md">
</form>
@if (@isset($item))
<table class="mt-10 min-w-full border border-gray-300 shadow-sm rounded-lg over-flow-hidden ">
    <thead class="bg-blue-500 text-white text-2xl">
    <tr>
        <th class="w-1/4 px-6 py-4">id</th>
        <th  class="w-1/4 px-6 py-4">name</th>
        <th  class="w-1/4 px-6 py-4">age</th>
        <th  class="w-1/4 px-6 py-4">nationality</th>
    </tr>
    </thead>
    <tr>
        <td class="w-1/4 px-6 py-4 text-center text-2xl">{{$item->id}}</td>
        <td class="w-1/4 px-6 py-4 text-center text-2xl">{{$item->name}}</td>
        <td class="w-1/4 px-6 py-4 text-center text-2xl">{{$item->age}}</td>
        <td class="w-1/4 px-6 py-4 text-center text-2xl">{{$item->nationality}}</td>
    </tr>
</table>
@endif
@endsection

