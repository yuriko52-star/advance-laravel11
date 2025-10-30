@extends('layouts.default')
<!-- <style> 
    th {
        background-color: #289adc;
        color: white;
        padding: 5px 40px;
    }
    tr:nth-child(odd) td {
        background-color: #fff
    }
    td {
        padding: 25px 40px;
        background-color: #eee;
        text-align: center;
    }
        -->
<style>

    svg.w-5.h-5 {
        width: 30px;
        height: 30px;
    }
        
</style>


@section('title','index.bade.php')

@section('content')
<div class="p-6">
<table class="min-w-full border border-gray-300 shadow-xl rounded-lg overflow-hidden">
    <thead class="bg-blue-500 text-white">
    <tr>
        <th class="px-8 py-5 text-center text-3xl">Data</th>
        
    </tr>
    </thead>
    @foreach ($authors as $author)
    <tr class="even:bg-gray-200">
        <td class="px-6 py-5 border-t border-gray-200 text-center text-2xl">{{$author->getDetail()}}</td>
        
    </tr>
    @endforeach
</table>
{{ $authors->links() }}

</div>
@endsection