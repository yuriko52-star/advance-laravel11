@extends('layouts.default')
<!-- <style>
th {
  background-color: #289ADC;
  color: white;
  padding: 5px 40px;
}

td {
  padding: 25px 40px;
  background-color: #EEEEEE;
  text-align: center;
}

button {
  padding: 10px 20px;
  background-color: #289ADC;
  border: none;
  color: white;
}
</style>
 -->
@section('title', 'book.add.blade.php')

@section('content')
@if(count($errors) > 0)
<ul>
    @foreach($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>
@endif
<form action="/book/add" method="post">
    <table class="min-w-80% border border-gray-300 shadow-xl rounded-lg overflow-hidden mt-10">
        @csrf
        <tr>
            <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white border">author_id:</th>
            <td class="px-8 py-5 text-center text-3xl border-b bg-white">
              <input type="id" name="author_id" class="min-w-full  focus: outline-none focus:ring-2 rounded-md text-center ">
            </td>
        </tr>
        <tr>
            <th class="px-8 py-5 text-center text-3xl bg-blue-500 text-white">title:</th>
            <td class="px-8 py-5 text-center text-3xl border-b bg-white">
              <input type="text" name="title" class="min-w-full  focus: outline-none focus:ring-2 rounded-md text-center">
            </td>
        </tr>
        
    </table>
	<button class="bg-blue-500 text-white px-8 py-3 rounded-md text-lg mt-10">送信</button>
    
</form>
<script>
	document.addEventListener("DOMContentLoaded", () => {
		const form = document.querySelector("form");
		form.addEventListener("submit", (e) => {
			const result = confirm("これを送信してもいいですかね？");
			if(!result) {
				e.preventDefault();
			}
		});
	});
</script>
@endsection