# advance-laravel11  
## データを取得  
 public function index()
    {
        $authors = Author::all();
        return view('index', ['authors' => $authors]);
    }  

Eloquentのallメソッドを利用して、テーブルから全件取得できる  

基本的に取得したデータはforeach文などを使用することで、値を加工することができる。(1つずつレコードを取り出して表示)  

取得したデータの型はLaravelのオブジェクトのコレクションという型になる。コレクションとして格納され、複数のレコードが複数の配列となって格納される  


データ全件が格納されたauthorsをパラメータとして渡し、index.blade.phpを呼び出している。

### シングルアロー演算子	->	配列へのアクセス（配列から値を取り出す）具体的にはキーの値を取り出す  

### ダブルアロー演算子	=>	配列に値を代入するとき 
具体的にはキーに対して値を代入する  

## データの追加機能  
1. カラムに対して書き換え可・不可の設定を行わないと、データの登録が出来ずエラーが発生するため、まず最初にモデルファイルでカラムの書き換え可・不可の設定を行う。  
($fillable, $guarded)  
2. データ追加用ページのフォームに入力した値を取得  
public function add(){
        return view('add');
    }

    public function create(Request $request){
        $form = $request->all();
        return redirect('/');
    }  
 
リクエストボディとLaravelでの値の取得方法: リクエストボディとは、HTTPリクエストを構成する要素の1つ。  
 POSTメソッドの場合に送信するformタグ内に入力した値が格納される。  
formタグ内のinputタグのname属性がkey、inputタグに入力された値がvalueとして連想配列となって送信している。その他にも、リクエストボディにはクエリパラメータなども含まれる。  
コントローラのアクションの引数にRequest $requestを指定することでリクエストボディを受け取ることができ、$request→contentと記述することで、name属性がcontentの値を取得している。  
3. データベースに追加(保存)  

public function create(Request $request)
  {
    $form = $request->all();
    + Author::create($form);
    return redirect('/');
  }  
  inputタグのname属性がテーブルのカラム名と一致しているため、 createメソッドの引数にrequest->all()の値を代入することで、そのままテーブルに保存することができる。(そうでない場合は、以下のように連想配列を作成し、createメソッドに渡す.確認テスト１みたいに)  

   $form = [
    'name' => $request->name,
    'age' => $request->age,
    'nationality' => $request->country,
];
Author::create($form); 
  データ挿入後はデータの一覧が表示される画面に遷移するようにリダイレクト  
  ## データの更新  
  1. 画面作成  
  2. データ編集ページを呼び出すアクションを作成  
  public function edit(Request $request){
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }  
    どのデータを更新するかの情報を取得する必要がある。  
    基本的にidを元に更新するデータを取得  

「データ編集用ページ」にアクセスする際は、更新対象のデータのidをクエリパラメータに含めている。  
 $request->idで、クエリパラメータからidを取得できる。  
 IDによるレコード検索を行う際にはfindメソッドを利用する。  
 $変数 = モデルクラス::find(ID);  
 3. ルーティング  
 4. データ編集用ページから送信されたフォームの値を取得し、データベースにデータの更新を保存  
 public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }  
    findメソッドの引数にリクエストで取得したidを指定。これで更新対象のレコードを取得し、そのレコードをupdateメソッドで$formの内容を元にして更新。  
    unset($form['_token'])ではこのデータの更新の上で余計なカラムとなる_tokenを排除している。bladeファイルに記述した@csrfにより、csrf対策用のトークンが生成される。このトークンがリクエストの情報として含まれてしまう。データベースへ保存するときには必要ないので、ここで削除。  
5. ルーティング  
  
## 削除機能  
1. 画面作成  

2. データ削除用ページを呼び出すアクション作成とルーティング  

public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }  
3.データ削除処理  
 削除対象のidを取得し、そのidに対応するレコードをデータベースから削除  
 public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }  
    findメソッドの引数に削除対象のidを指定し、削除対象のレコードを取得、このレコードをdeleteメソッドで削除  
    ルーティングの設定  
    削除対象のidをコントローラに渡せていないためaction属性にクエリパラメータを指定し、削除対象のidが代入されるよう記述  
    <form action="/delete?id={{$author->id}}" method="POST">  
    更新処理の時にこの記述が必要なかった理由は、編集用ページのフォームに更新対象のidが含まれていたため、
リクエストからidを取得できたから。
## 検索 
 
1. IDを指定してレコードを取り出す際は、findメソッドを利用  
2. ID以外での検索には、whereメソッド  whereメソッドを使用する際は、基本的にgetメソッドまたは 、firstメソッドを最後に記述  
getメソッド(複数件の取得)$変数 = モデルクラス::where(フィールド名 , 値)->get();

3. firstメソッド(1件の取得のみ)  
$変数 = モデルクラス::where(フィールド名 , 値)->first();  
4. 
name属性を利用した検索(フォームに入力した値と一致するデータを検索したい場合) 　　

## モデル結合　　
 ルーティングの際にパラメータの値と Eloquent モデルが一致すると、そのパラメータの値に一致する ID をもつモデルインスタンスを生成
  public function bind(Author $author)
   {
        $data = [
            'item'=>$author,
        ];
        return view('author.binds', $data);
    } 
    Author $authorという形で引数が用意。これにより自動的にパラメータ{author}の数値がAuthorのID を示す値として扱われ、取り出されたAuthorインスタンスが引数として渡されるようになる。 この時、データベースにアクセスするための処理は、一切必要ない。 
Route::get('/author/{author}', [AuthorController::class, 'bind']);  
{author} の数字とAuthorモデルのidが合致するレコードが結びついて取り出される。/author/2というようにパラメータにID番号をつけてアクセスすると authorsテーブルのid=2のレコードが表示される。  
##  getDetail()  
 一つ一つのデータを加工するメソッド(モデルに入れる)
public function getDetail()
  {
    $txt = 'ID:'.$this->id . ' ' . $this->name . '(' . $this->age .  '才'.') '.$this->nationality;
    return $txt;  
  }  
 モデルを利用する場合は、簡単に処理を追加し、データを加工していくことができる。 
