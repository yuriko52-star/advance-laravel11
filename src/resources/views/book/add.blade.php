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
    const button = form.querySelector("button");
		form.addEventListener("submit", (e) => {
			const result = confirm("これを送信してもいいですかね？");
			if(!result) {
				e.preventDefault();
        return;
        // ← これがないと下の行まで実行される！「キャンセルされたならフォーム送信を止めて、それ以降の処理（ボタン無効化など）をしないで終わる」
			}

       // 送信中にボタンを無効化
       button.disabled = true;
      //  ブラウザ上でそのボタンを押せない状態にするbutton.disabled = falseなら押せる
       button.textContent = "送信中・・・";
       button.classList.add("bg-gray-400");
      //  クラスをJavaScriptで追加・削除したいときに使う
       button.classList.remove("bg-blue-500");
       // ページ遷移を少し遅らせて「送信中…」を見せる
       e.preventDefault();
       setTimeout(() => {
        form.submit();// 0.5秒後に本来の送信を実行
       }, 500);
		});
	});
</script>
@endsection