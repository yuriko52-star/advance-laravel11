@extends('layouts.default')
<!-- <style> 
th {
  background-color: #289ADC;
  color: white;
  padding: 5px 40px;
}
tr:nth-child(odd) td{
  background-color: #FFFFFF;
}
td {
  padding: 25px 40px;
    background-color: #EEEEEE;
  text-align: center;
}  
</style>
-->
@section('title','book.idex.blade.php')

@section('content')
<table class="mt-10 min-w-full border border-gray-300 shadow-xl rounded-lg overflow-hidden">
    <tr>
        <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white">Books</th>
    </tr>
    @foreach($items as $item)
    <tr class="even:bg-gray-200">
        <td class="px-6 py-5 border-t border-gray-200 text-center text-2xl">
            {{$item->getTitle()}}
        </td>
    </tr>
    @endforeach
</table>
@endsection
