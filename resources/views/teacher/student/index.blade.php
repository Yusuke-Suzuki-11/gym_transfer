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
				<div class="tc-student-search-content">
					<div class="tc-student-search-sub">
						<div class="tc-student-search-form">
							<p>名前</p>
							<input type="text" name='name'>
						</div>
						<div class="tc-student-search-form">
							<p>曜日</p>
							<select name="dayOfWeek">
								@foreach (config('const.DAY_OF_WEEK') as $__id => $__week)
									<option value="{{$__id}}">{{$__week}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="tc-student-search-sub">
						<div class="tc-student-search-form">
							<p>クラス</p>
							<select name="grade">
									<option value="">----</option>
								@foreach ($GradeRowset as $__GradeRow)
									<option value="{{$__GradeRow->id}}">{{$__GradeRow->grade}}</option>
								@endforeach
							</select>
						</div>
						<div class="tc-student-search-form">
							<p>性別</p>
							<select name="gender">
									<option value="">----</option>
								@foreach (config('const.STUDENTS.GENDER_TYPE') as $__id =>  $__gender)
									<option value="{{$__id}}">{{$__gender}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="tc-student-search-sub">
						<div class="tc-student-search-form">
							<p>性別</p>
							<select name="gender">
									<option value="">----</option>
								@foreach (config('const.STUDENTS.GENDER_TYPE') as $__id =>  $__gender)
									<option value="{{$__id}}">{{$__gender}}</option>
								@endforeach
							</select>
						</div>
						<div class="tc-student-search-form">
							<p>振替</p>
							<select name="transfar">
									<option value="">----</option>
									<option value="1">振替している</option>
									<option value="0">振替していない</option>
							</select>
						</div>
					</div>
					<div class="tc-student-search-button">
						<button class="btn btn-outline-info search-btn"><i class="fas fa-search"></i> 検索する</button>
						<button class="btn btn-outline-danger cross-btn"><i class="fas fa-times"></i> 条件をクリア</button>
					</div>
				</div>
			</div>
		</div>


		{{-- メインコンテンツ --}}
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


