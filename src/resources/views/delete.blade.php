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
@section('title', 'delete.blade.php')

@section('content')
<table class="min-w-90% border border-gray-300 shadow-xl rounded-lg overflow-hidden mt-10">
    <tr>
        <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white">id</th>
        <td  class="w-[500px] px-20 py-5 text-center text-3xl border-b">{{$author->id}}</td>
    </tr>
    <tr>
        <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white">name</th>
        <td  class="px-8 py-5 text-center text-3xl border-b ">{{$author->name}}</td>
    </tr>
    <tr>
        <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white">age</th>
        <td  class="px-8 py-5 text-center text-3xl border-b ">{{$author->age}}</td>
    </tr>
    <tr>
        <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white">nationality</th>
        <td  class="px-8 py-5 text-center text-3xl border-b">{{$author->nationality}}</td>
    </tr>
    <tr>
        <th class="px-8 py-8 text-center text-3xl bg-blue-500 text-white"></th>
        <td  class="px-8 py-5 text-center text-3xl border-b">
            <form action="/delete?id={{$author->id}}" method="post">
                @csrf
                <button>送信</button>
            </form>
        </td>
    </tr>
</table>
@endsection