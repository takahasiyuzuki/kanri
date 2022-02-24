<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>編集</title>
<style>
#wrapSampleForm {
    width: 500px;
    margin: 10px;
    padding: 10px;
    border: 1px solid gray;
    border-radius: 10px;
}
#wrapSampleForm {
    background-color: #f0f8ff;
}
#sampleTable {
    background-color: #ffffcc;
}
#sampleTable th {
    color: #000000 !important;
}
#sampleTable th,
#sampleTable td {
    font-size: 15px !important;
    border: 1px solid gray;
    background-color: #ffffcc;
}
#tableName {
    width: 20%;
}
#formArea {
    width: 15%;
}
#formAge {
    width: 15%;
}
#tableComent {
    width: 50%;
}
#sampleForm * {
    margin: 0 0 7px 0;
    vertical-align: text-top;
}

</style>
</head>

<body>
<div id="wrapSampleForm">

    <form id="sampleForm" method="post" action="{{ route('update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $Products->id }}">
        【変更入力欄】
        <br>
        商品名：<input type="text" name="product_name" value="{{  $Products->product_name }}">
        <br />
        メーカー：
            <select name="company_id" value="{{  $Products->company_id }}">
                <option value="1" selected>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        <br />
        価格：<input type="text" name="price" value="{{  $Products->price }}">
        <br />
		在庫数：<input type="text" name="stock" value="{{  $Products->stock }}">
		<br />
        コメント：<input name="comment" value="{{  $Products->comment }}"></textarea>
        <br />
        画像:<input type="file" name="img_path" value="{{  $Products->img_path }}">
        <br />
        
    <button type="submit" class="btn btn-primary">更新</button>
</form>
<div class="mypage">
<a href="{{ url('/mypage') }}">戻る</a>
</div>
<div class="mypage3">
<a href="{{ url('/mypage3') }}">商品情報詳細画面</a>
</div>
</div>
</body>
</html>