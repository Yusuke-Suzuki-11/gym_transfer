@extends('layout')

@section('content')

<div class="tc-index">
	@include('elements.tc_sidebar')

	<div class="tc-main">
		<div class="tc-title-top">
			<p>
				<span>プロフィール</span>
			</p>
		</div>

		<div class="tc-prof-box">
			<table class="tc-prof-table">
				<tr>
					<th class="tc-prof-item-title"></th>
					<th class="tc-prof-item"></th>
				</tr>
				<tr>
					<td class="item-1">
						名前
					</td>
					<td class="item-2">
						{{$StudentRow->full_name}}
					</td>
				</tr>
				<tr>
					<td>
						メールアドレス
					</td>
					<td>
						{{$StudentRow->email}}
					</td>
				</tr>
				<tr>
					<td>
						電話番号
					</td>
					<td>
						{{$StudentRow->phone}}
					</td>
				</tr>
				<tr>
					<td>
						会員番号
					</td>
					<td>
						{{$StudentRow->member_num}}
					</td>
				</tr>
				<tr>
					<td>
						クラス
					</td>
					<td>
						{{'月曜11:00~11:50'}}
					</td>
				</tr>
				<tr>
					<td>
						生年月日
					</td>
					<td>
						{{$StudentRow->birthday}}
					</td>
				</tr>
				<tr>
					<td>
						性別
					</td>
					<td>
						{{config('const.STUDENTS.GENDER_TYPE')[$StudentRow->gender]}}
					</td>
				</tr>
				<tr>
					<td>
						ストレスポイント
					</td>
					<td>
						{{config('const.STUDENTS.STRESS_POINT')[$StudentRow->stress_point]}}
					</td>
				</tr>
				<tr>
					<td>
						今月の振替
					</td>
					<td>
						{{$StudentRow->transfer_enabled}}
					</td>
				</tr>

			</table>


		</div>

		<a href="{{route('tc.student.edit', ['id' => $StudentRow->id])}}">
			編集
		</a>
	</div>
</div>

{{$StudentRow->name}}



@endsection