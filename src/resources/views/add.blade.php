@extends('layouts.default')
<!-- <style> 
    th {
        background-color: #289adc;
        color: white;
        padding: 5px 40px;
    }
    tr:nth-child(odd) td {
        background-color: #fff;
    }
    td {
        padding: 25px 40px;
        background-color: #eee;
        text-align: center;
    }
    button {
        padding: 10px 20px;
        background-color: #289adc;
        border: none;
        color: white;
    }
</style>
-->
@section('title', 'add.blade.php')

@section('content')
<div class="p-6"></div>
@if(count($errors) > 0)
<p>入力に問題があります</p>
@endif
<form action="/add" method="post">
    <table class="table-fixed w-full border-collapse">
        @csrf 
        @error('name')
        
        <tr>
            <th>ERROR</th>
            <td>
                {{$errors->first('name')}}
            </td>
        </tr>
        @enderror
        <!-- <thead class="bg-blue-500 text-white"> -->
            <tr>
                <th class="w-1/4 px-5 py-4 text-center  text-2xl">name</th>
                <td><input type="text" name="name" class="w-3/4 h-12 border border-gray-300 rounded-md px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></td>
            </tr>
            <!-- </thead> -->
        @error('age')
            <tr>
            <th style="background-color: red">ERROR</th>
            <td>
                {{$errors->first('age')}}
            </td>
        </tr>
        @enderror
            <tr>
                <th class="w-1/4 px-5 py-4 text-center  text-2xl">age</th>
                <td><input type="text" name="age" class="w-1/3 h-12 border border-gray-300 rounded-md px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></td>
            </tr>
        @error('nationality')
            <tr>
            <th style="background-color: red">ERROR</th>
            <td>
                {{$errors->first('nationality')}}
            </td>
        </tr>
        @enderror
            <tr>
                <th class="w-1/4 px-5 py-4 text-center  text-2xl">nationality</th>
                <td ><input type="text" name="nationality"class="w-3/4 h-12 border border-gray-300 rounded-md px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></td>
            </tr>
            <tr>
                <th></th>
                <td><button class="bg-blue-500 border rounded-md text-white text-xl px-3 py-2 mt-4 mb-4">送信</button></td>
            </tr>    
    </table>
</form>
@endsection