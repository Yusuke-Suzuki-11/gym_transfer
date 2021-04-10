@extends('layout')

@section('content')
@include('elements.tc_sidebar')

<div class="tc-index" id="app">

	{{-- タイトル --}}
	<div class="tc-title-top">
		<p class="tc-title-txt">
			新規入会者登録
		</p>
	</div>

	<form action="{{route('tc.student.register')}}" method="POST" novalidate>
		@csrf
		<div class="tc-stadd-container">
			<div class="tc-stadd-form-box">
				<div class="tc-stadd-form-name">
					<p>
						姓
						@error('lastName')
							<span class="font-error error-min">※{{ $message }}</span>
						@enderror
					</p>
					<input class="form-control form-control-sm" value="{{ old('lastName') }}" type="text" name="lastName">
				</div>
				<div class="tc-stadd-form-name">
					<p>
						名
						@error('firstName')
							<span class="font-error error-min">※{{ $message }}</span>
						@enderror
					</p>
					<input class="form-control form-control-sm" type="text" value="{{ old('firstName') }}" name="firstName">
				</div>
			</div>

			<div class="tc-stadd-form-mainbox">
				<p>
					メールアドレス
					@error('email')
						<span class="font-error error-min">※{{ $message }}</span>
					@enderror
				</p>
				<input class="form-control form-control-sm" value="{{ old('email') }}" type="email" name="email">
			</div>

			<div class="tc-stadd-form-threebox">
				<p>
					生年月日
					@if ($errors->has('birthYear') || $errors->has('birthMonth') || $errors->has('birthDay'))
						<span class="font-error error-min">※未入力の項目があります。</span>
					@endif
				</p>
				<div class="three-form">
					<div>
						<select name="birthYear" class="form-control form-control-sm">
							<option value="">--</option>
							@foreach (range(2000,2020) as $item)
								<option value="{{$item}}" @if(old('birthYear')== $item) selected  @endif>{{$item}}年</option>
							@endforeach
						</select>
					</div>
					<div>
						<select name="birthMonth" class="form-control form-control-sm">
							<option value="">--</option>
							@foreach (range(1,12) as $item)
								<option value="{{$item}}" @if(old('birthMonth' )== $item) selected @endif>{{$item}}月</option>
							@endforeach
						</select>
					</div>
					<div>
						<select name="birthDay" class="form-control form-control-sm">
							<option value="">--</option>
							@foreach (range(1,31) as $item)
								<option value="{{$item}}" @if(old('birthDay' )== $item) selected @endif >{{$item}}日</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="tc-stadd-form-mainbox">
				<p>
					性別
					@error('gender')
						<span class="font-error error-min">※{{ $message }}</span>
					@enderror
				</p>
				<select class="form-control form-control-sm" name="gender">
					<option class="dummy" disabled selected>
						性別を選択してください
					</option>
					@foreach (config('const.STUDENTS.GENDER_TYPE') as $key => $val)
					<option value="{{$key}}" @if(old('gender' )== $key) selected @endif>
						{{$val}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="tc-stadd-form-mainbox">
				<p>
					電話番号
					@error('phone')
						<span class="font-error error-min">※{{ $message }}</span>
					@enderror
				</p>
				<input class="form-control form-control-sm" type="text" name="phone" value={{old('phone')}}>
			</div>

			<div class="tc-stadd-form-mainbox">
				<p>
					コース
					@error('courseId')
						<span class="font-error error-min">※{{ $message }}</span>
					@enderror
				</p>
				<select class="form-control form-control-sm" name="courseId">
					<option class="dummy" disabled selected>
						コースを選択してください
					</option>
					@foreach ( $CourseRowset as $CourseRow)
						<option value="{{$CourseRow->id}}" @if(old('courseId' )== $CourseRow->id) selected @endif>
							{{$CourseRow->getWeekAndLessonTimes()}}
						</option>
					@endforeach
				</select>
			</div>


			<div class="tc-stadd-form-threebox">
				<p>
					種目別スタートレベル
					{{$errors->has('birthYear')}}
					@if ($errors->has('bar') || $errors->has('floor') || $errors->has('vaulting'))
						<span class="font-error error-min">※未入力の項目があります。</span>
					@endif
				</p>
				<div class="three-form">
					<div>
						<select name="bar" class="form-control form-control-sm">
							<option value="">鉄棒級</option>
							@foreach ($barData as $data)
								<option value="{{$data['id']}}" @if(old('bar' )== $data['id']) selected @endif>{{$data['level']. '（'.$data['name'].'）'}}</option>
							@endforeach
						</select>
					</div>
					<div>
						<select name="floor" class="form-control form-control-sm">
							<option value="">マット級</option>
							@foreach ($floorData as $data)
								<option value="{{$data['id']}}" @if(old('floor' )== $data['id']) selected @endif>{{$data['level']. '（'.$data['name'].'）'}}</option>
							@endforeach
						</select>
					</div>
					<div>
						<select name="vaulting" class="form-control form-control-sm">
							<option value="">とび箱級</option>
							@foreach ($vaultingData as $data)
								<option value="{{$data['id']}}" @if(old('vaulting' )== $data['id']) selected @endif>{{$data['level']. '（'.$data['name'].'）'}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>



			<div class="tc-stadd-form-btn">
				<button type="submit" class="btn btn-success">登録</button>
			</div>
		</div>
	</form>
</div>
@endsection