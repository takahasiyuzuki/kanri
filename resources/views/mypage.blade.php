<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>一覧</title>
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
<form id="sampleForm" method="post" action="{{ route('crate') }}">
 @csrf
</form>

<form  action="{{ url('/search')}}", method="get">
<!-- {{ csrf_field() }}  -->
<input name="keyword" type="text" placeholder="検索" class="form-mcontrol " value= "{{ $keyword ?? '' }}">
<select name="company_name">
                <option value="{{ $com ?? '' }}" selected>商品</option>
                <option>文字</option>
                <option>製品</option>
            </select>
<button type="submit" >検索</button>
</form>

<div class="mypage2">
<a href="{{ url('/mypage2') }}">新規登録</a>
</div>

</div>
<table id="sampleTable">
    <tr>
        <th id="tableName">商品名</th>
        <th id="tableArea">メーカー</th>
        <th id="tableEn">価格</th>
		<th id="tableZaiko">在庫数</th>
        <th id="tableComent">コメント</th>
	    <th id="tableGazou">画像</th>
        <th id="tableSakujyo">削除</th> 
        
		
    </tr>
    @foreach ($Products as $lalaproduct)
    <tbody>
        <td>{{ $lalaproduct->product_name }}</td>
        <td>{{ $lalaproduct->company_id }}</td>
        <td>{{ $lalaproduct->price }}</td>
        <td>{{ $lalaproduct->stock }}</td>
        <td>{{ $lalaproduct->comment }}</td>
        <td>{{ $lalaproduct->img_path }}</td>
        <form method="POST" action="{{ route('delete', $lalaproduct->id) }}">
        @csrf
        <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
    </tbody>
    @endforeach
    </table>


</body>
</html>