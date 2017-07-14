@extends('layouts.main')

@section('content')	
	<div class="workarea">
		<h1>Sign in Portal</h1>
		@if ($error)
			<div class="reg-form-error" style="display: block;">Sorry, user didn't found</div>
		@else
			<div class="reg-form-error">Sorry, user didn't found</div>
		@endif
		<form class="reg-form" method="POST">
			<div class="reg-form-block -req">
				<label>Email</label>
				<input name="email" type="text" value="">
			</div>
			<div class="reg-form-block -req">
				<label>Password</label>
				<input name="password" type="password" value="">
			</div>	
			<div>
				<input class="reg-form-button" type="submit" value="Sign in">
			</div>
		</form>
	</div>
@endsection