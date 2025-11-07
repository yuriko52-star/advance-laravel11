@extends('layouts.default')

@section('title', 'add.blade.php')

@section('content')
<div class="p-6">

<form action="/add" method="post">
    
        @csrf 
        <div class="grid grid-cols-3 gap-4 items-center w-full">
           
            <label for="name" class="col-span-1 text-center text-2xl">name</label>
             <div class="col-span-2">
                <input type="text" name="name" class=" h-12 w-full border border-gray-300 rounded-md px-3 focus:ring-2 focus:ring-blue-500 border-red-500" autocomplete="name">
                <p class="text-red-500 text-sm hidden js-error">名前を入力してください</p>
           </div>
            
             <label for="age" class="col-span-1 text-center text-2xl">age</label>
             <div class="col-span-2">
                <input type="text" name="age" class=" h-12 w-full border border-gray-300 rounded-md px-3 focus:ring-2 focus:ring-blue-500 border-red-500" autocomplete="age">
                <p class="text-red-500 text-sm  hidden js-error">数字で入力してください</p>
           </div>
           
            <label for="nationaity" class="col-span-1 text-center text-2xl">nationality</label>
            <div class="col-span-2">
                <input type="text" name="nationality" class=" h-12 w-full border border-gray-300 rounded-md px-3 focus:ring-2 focus:ring-blue-500 border-red-500" autocomplete="nationality">
                <p class="text-red-500 text-sm  hidden js-error">国籍を入力してください。</p>
            </div>
            <button disabled class="bg-blue-500 border rounded-md text-white text-xl px-4 py-2 opacity-50">送信</button>
        </div>
</form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.querySelector("form");
        const inputs = form.querySelectorAll("input");
        const button = form.querySelector("button");
       
        function checkInputs() {
            
            let allFilled = true;
            let valid = true;
            
            inputs.forEach(input => {
                const value = input.value.trim();
                // 前後の空白を取り除く メソッド
                const name = input.name;
                const errorMsg = input.parentElement.querySelector(".js-error"); // 安全に取得
                

                // もしエラーメッセージの要素がなければ、そのinputはスキップ
                 if (!errorMsg) return;

                 // リセット
                 errorMsg.classList.add("hidden");
                 
                input.classList.remove("border-red-500");
                // 値が空ならNG
                if(value.replace(/\s/g, "") === "") {
                    allFilled = false;
                    valid = false;
                    input.classList.add("border-red-500");
                    //  errorMsg.textContent = "この項目は必須です。"; 
                     errorMsg.classList.remove("hidden");
                    
                    return;// この時点でこのinputの次のチェックはスキップ
                }
                // name は空白だけではNG
                if(name === "name" && value.replace(/\s/g, "") === "") {
                    // /\s/g→ 「空白文字をすべて」という正規表現
                    // "" → 「空白を空文字に置き換える」
                    valid = false;
                    input.classList.add("border-red-500");
                    // errorMsg.textContent = "スペースだけの入力は無効です";
                    errorMsg.classList.remove("hidden");
                    
                    
                }
                 // age は数字でなければNG 文字列全体が数字だけで構成されているか？」をチェック
                if (name === "age" && !/^\d+$/.test(value)) {
                    valid = false;
                    input.classList.add("border-red-500");
                    // errorMsg.textContent = "数字で入力してください"; 
                     errorMsg.classList.remove("hidden");
                    
                    
                 }
                  // nationality も空欄や空白だけはNG
                  if(name === "nationality" && value.replace(/\s/g, "") === "") {
                    valid = false;
                    input.classList.add("border-red-500");
                    // errorMsg.textContent = "スペースだけの入力は無効です。"; 
                    
                    errorMsg.classList.remove("hidden");
                    
                    
                  }
                 
            });

        
        
            button.disabled = !(allFilled && valid);
            button.classList.toggle('opacity-50', button.disabled);
            button.classList.toggle('bg-blue-500', !button.disabled);
           
            
        }
            // 入力のたびにチェック
            form.addEventListener("input", checkInputs);
            // 初期状態でもチェック
              checkInputs();
            // 送信前確認
            form.addEventListener("submit", (e) => {
                const result = confirm("この内容で送信する？");
                if(!result)e.preventDefault();
            });
            
        });
    
</script>
@endsection