@extends('layout')

@section('content')
<div class="tc-index">
	@include('elements.tc_sidebar')

	<div class="tc-main">
		<div class="tc-student-top">
			<p>生徒一覧</p>
			<h2>Table Design</h2>

		<table class="table_box">
		<tr>
			<th>アイテム一覧</th>
			<th>値段</th>
			<th>状態</th>
			<th>色</th>
			<th>場所</th>
		</tr>
		<tr>
			<td>ボトムス</td>
			<td>¥25,000</td>
			<td>古着</td>
			<td>ブラック</td>
			<td>下北沢</td>
		</tr>
		<tr>
			<td>スニーカー</td>
			<td>¥38,000</td>
			<td>古着</td>
			<td>ホワイト</td>
			<td>吉祥寺</td>
		</tr>
		<tr>
			<td>キャップ</td>
			<td>¥8,000</td>
			<td>古着</td>
			<td>ネイビー</td>
			<td>高円寺</td>
		</tr>
			<tr>
			<td>バッグ</td>
			<td>¥80,000</td>
			<td>古着</td>
			<td>ブラック</td>
			<td>代官山</td>
		</tr>
		</table>

		</div>
{{--
		@foreach ($StudentRowset as $StudentRow)



			<a href="{{route('tc.student.show', ['id' => $StudentRow->id])}}">
				{{$StudentRow->full_name}}
			</a>
			<br>
		@endforeach --}}
	</div>
</div>


@endsection