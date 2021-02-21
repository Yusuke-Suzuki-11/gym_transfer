@extends('layout')
@inject('utility', 'App\Library\Utility')

@section('content')
@include('elements.tc_sidebar')
<div class="tc-index" id="app">
	<div class="tc-title-top">
		<p class="tc-title-txt">
			生徒一覧
		</p>
	</div>

	<div class="tc-student-box">
		<div class="tc-student-search">
			<div class="tc-student-search-title">
				<p>検索条件</p>
			</div>
			<div class="tc-student-search-main">
				<div>
					ダミー
				</div>
			</div>
		</div>

		<div class="tc-student-list">

			<table class="table-box">
				<tr>
					<th>名前</th>
					<th>クラス</th>
					<th>メールアドレス</th>
					<th>年齢</th>
					<th>電話番号</th>
				</tr>
				@foreach ($StudentRowset as $StudentRow)
				<tr>
					<td>
						<a href="{{route('tc.student.show', ['id' => $StudentRow->id])}}">{{$StudentRow->full_name}}</a>
					</td>
					<td>
						月曜 11:00~11:50
					</td>
					<td>
						{{$StudentRow->email}}
					</td>
					<td>
						{{$utility->getAgeByBirthDay($StudentRow->birthday)}}
					</td>
					<td>
						{{$StudentRow->phone}}
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>


@endsection