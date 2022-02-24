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
<form id="sampleForm" method="post" action="{{ route('crate') }}">
 @csrf
        
</form>

<div class="mypage3">
<a href="{{ url('/mypage3') }}">戻る</a>
</div>

</div>
<table id="sampleTable">
    <tr>
        <th id="tableId">ID</th>
        <th id="tableName">商品名</th>
        <th id="tableArea">メーカー</th>
        <th id="tableEn">価格</th>
		<th id="tableZaiko">在庫数</th>
        <th id="tableComent">コメント</th>
	    <th id="tableGazou">画像</th>
        <th></th>
		
    </tr>
    @foreach ($Products as $lalaproduct)
    <tbody>
        <td>{{ $lalaproduct->id }}</td>
        <td>{{ $lalaproduct->product_name }}</td>
        <td>{{ $lalaproduct->company_id }}</td>
        <td>{{ $lalaproduct->price }}</td>
        <td>{{ $lalaproduct->stock }}</td>
        <td>{{ $lalaproduct->comment }}</td>
        <td>{{ $lalaproduct->img_path }}</td>
        <td><button type="button" class="btn btn-primary" onclick="location.href='/edit/{{ $lalaproduct->id }}'">編集</button></td>
    </tbody>
    @endforeach
</table>

    




</body>
</html>