@extends('layouts.default')
<style>
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
</style>
@section('title','index.bade.php')

@section('content')
<table>
    <tr>
        <th>Data</th>
        
    </tr>
    @foreach ($authors as $author)
    <tr>
        <td>{{$author->getDetail()}}</td>
        
    </tr>
    @endforeach
</table>
@endsection