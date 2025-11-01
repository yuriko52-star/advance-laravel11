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
@section('title', 'edit.blade.php')

@section('content')
@if(count($errors) > 0)
<p>入力に誤りがあります</p>
@endif
<form action="/edit" method="post">
    <table class="min-w-80% border border-gray-300 shadow-xl rounded-lg overflow-hidden mt-10">
        @csrf
        @error('id')
        <tr>
            <th style="background-color: red">ERROR</th>
            <td>
                {{$errors->first('id')}}
            </td>
        </tr>
        @enderror  
        <tr>
            <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white">id</th>
            <td>
                <input type="text" name="id" value="{{$form->id}}" class="px-8 py-5 text-center text-3xl border-b ">
        </td>
        </tr>
        @error('name')
        <tr>
        <th style="background-color: red">ERROR</th>
        <td>
            {{$errors->first('name')}}
        </td>
    </tr>
    @enderror 
        <tr>
            <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white border">name</th>
            <td class="px-8 py-5 text-3xl bg-white border-b">
                <input type="text" name="name" value="{{$form->name}}" class="min-w-full  focus: outline-none focus:ring-2 rounded-md text-center ">
        </td>
        </tr>
        @error('age')
        <tr>
            <th style="background-color: red">ERROR</th>
            <td>
            {{$errors->first('age')}}
            </td>
        </tr>
        @enderror 
        <tr>
            <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white border-b">age</th>
            <td class="px-8 py-5 text-3xl bg-white border-b">
                <input type="text" name="age" value="{{$form->age}}" class="min-w-full  focus: outline-none focus:ring-2 rounded-md text-center">
        </td>
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
            <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white border-b">nationality</th>
            <td class="px-8 py-5 text-3xl bg-white border-b">
                <input type="text" name="nationality" value="{{$form->nationality}}" class="min-w-full  focus: outline-none focus:ring-2 rounded-md text-center" >
        </td>
        </tr>
        <tr>
            <th class="px-8 py-9 text-center text-3xl bg-blue-500 text-white"></th>
            <td class="px-8 py-5 text-3xl bg-white text-center">
                <button class="text-blue-500">送信</button>
            </td>
        </tr>
    </table>
</form>
@endsection