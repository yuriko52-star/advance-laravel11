@extends('layouts.default')

@section('title', 'add.blade.php')

@section('content')
<div class="p-6"></div>
@if(count($errors) > 0)
<p>入力に問題があります</p>
@endif
<form action="/add" method="post">
    
        @csrf 
        <div class="grid grid-cols-3 gap-4 items-center w-full">
            <label for="" class="col-span-1 text-center text-2xl">name</label>
            <input type="text" name="name" class="col-span-2 h-12 border border-gray-300 rounded-md px-3 focus:ring-2 focus:ring-blue-500">

             <label class="col-span-1 text-center text-2xl">age</label>
            <input type="text" name="age" class="col-span-2 h-12 border border-gray-300 rounded-md px-3 focus:ring-2 focus:ring-blue-500">

            <label class="col-span-1 text-center text-2xl">nationality</label>
            <input type="text" name="nationality" class="col-span-2 h-12 border border-gray-300 rounded-md px-3 focus:ring-2 focus:ring-blue-500">
            <button class="bg-blue-500 border rounded-md text-white text-xl py-2 ">送信</button>
        </div>
</form>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.querySelector("form");
        // 1. ページ内の<form>タグを取得
        // 2. formが送信されそうになったとき（submitイベント）
        // 3. 確認ダイアログを出す
        form.addEventListener("submit", (e) => {
            // formが送信されるタイミングでこの関数を実行してねという命令 "submit" もイベントの種類の一つ
            // e は イベントオブジェクト（Event Object）。そのイベントに関する情報（どの要素で起きたか、何をしたかなど）を持つ
            
            const result = confirm("この内容で送信しますか？");
            // キャンセルを押したら送信を止める
            if(!result) {
                e.preventDefault();
                // フォームの標準動作 → サーバーへ送信してページをリロードするのを止めたいときに使うのが e.preventDefault() 「送信ボタンを押しても、JavaScriptで確認してから送信したい」 → 一度止める → OKなら再送信 or 何もしない、という制御ができる
            }
        });
    });
</script>
@endsection