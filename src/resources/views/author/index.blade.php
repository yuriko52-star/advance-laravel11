@extends('layouts.default')
<!-- <style> 
th {
  background-color: #289ADC;
  color: white;
  padding: 5px 40px;
}

tr:nth-child(odd) td {
  background-color: #FFFFFF;
}
td table {
  margin: 0 auto;

}
td {
  padding: 25px 40px;
  background-color: #EEEEEE;
  text-align: center;
}
td table tbody tr td {
  background-color: #eee !important
}
</style>-->
@section('title','author.index.blade.php')

@section('content')
<div class="p-6"></div>
<table class="min-w-full border border-grey-300 shadow-sm rounded-lg overflow-hidden mb-20">
  <thead class="bg-blue-500 text-white">
    <tr> 
        <th class="px-6 py-3 text-center text-3xl">Author</th>
        <th class="px-6 py-3 text-center text-3xl">BOOK</th>
    </tr>
    </thead>
    @foreach($hasItems as $item)
    <tr>
    <td class="px-6 py-5 border border-gray-500 text-center text-2xl">
        {{$item->getDetail()}}
    </td>
    <td class="px-6 py-5 border border-gray-500 text-center text-2xl">
        {{--@if($item->books !=null)--}}
        <table width="100%">
            @foreach($item->books as $obj)
            <tr>
                <td class="px-6 py-5 text-center text-3xl  border-gray-500">{{$obj->getTitle()}}</td>
            </tr>
            @endforeach
        </table>
        {{--@endif--}}
    </td>
    </tr>
    @endforeach
</table>
<table class="min-w-full border border-grey-300 shadow-sm rounded-lg overflow-hidden">
  <thead>
  <tr>
    <th class="px-6 py-3 text-center text-3xl bg-blue-500 text-white">Author</th>
  </tr>
  @foreach($noItems as $item)
  <tr>
    <td class="px-6 py-5 text-center text-3xl border border-gray-500">{{ $item->getDetail() }}</td>
  </tr>
  @endforeach
  
</table>
@endsection