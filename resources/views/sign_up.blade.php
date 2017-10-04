@extends('layouts.main')

@section('content')
	<div class="workarea">
		<h1>Sign Up</h1>
		<div class="reg-form-error">Funnet feil under fylling av formen</div>
		<form class="reg-form" method="POST">
			<!--<div class="reg-form-block -req">
				<label>Navn*</label>
				<input name="name" value="">
			</div>
			<div class="reg-form-block -req">
				<label>Username*</label>
				<input name="username" value="">
			</div>-->
			<div class="reg-form-block -req">
				<label>E-post*</label>
				{{--<input name="email" value="{{{ $data['email'] or '' }}}">--}}
				<input name="email" value="vlad@tomin.pro">
                <div style="color: red">{{{ $err['email'] or '' }}}</div>
			</div>
			<!--<div class="reg-form-block -req">
				<label>Epostbekreftelse*</label>
				<input name="email_2" value="">
			</div>-->
			<div class="reg-form-block -req">
				<label>Password*</label>
				{{--<input type="password" name="pass" value="{{{ $data['pass'] or '' }}}">--}}
				<input type="password" name="pass" value="aG5M86gR">
                <div style="color: red">{{{ $err['pass'] or '' }}}</div>
			</div>
			<div class="reg-form-block -req">
				<label>Repeat password*</label>
				{{--<input type="password" name="pass_1" value="{{{ $data['pass_1'] or '' }}}">--}}
				<input type="password" name="pass_1" value="aG5M86gR">
                <div style="color: red">{{{ $err['pass_1'] or '' }}}</div>
			</div>
			<div class="reg-form-block -req">
				<label>Fornavn*</label>
				{{--<input name="first_name" value="{{{ $data['first_name'] or '' }}}">--}}
				<input name="first_name" value="Test">
                <div style="color: red">{{{ $err['first_name'] or '' }}}</div>
			</div>
			<div class="reg-form-block -req">
				<label>Mobile Etternavn*</label>
				{{--<input name="last_name" value="{{ $data['last_name'] or '' }}">--}}
				<input name="last_name" value="Test">
                <div style="color: red">{!! $err['last_name'] or '' !!}</div>
			</div>
			<!--<div class="reg-form-block">
				<label>Firm</label>
				<input name="firm" value="">
			</div>-->
			<div class="reg-form-block -req">
				<label>Gateadresse*</label>
				{{--<input name="street" value="{{ $data['street'] or '' }}">--}}
				<input name="street" value="Test">
                <div style="color: red">{!! $err['street'] or '' !!}</div>
			</div>
			<div class="reg-form-block">
				<label>Postnr</label>
				{{--<input name="postcode" value="{{ $data['postcode'] or '' }}">--}}
				<input name="postcode" value="443902">
                <div style="color: red">{!! $err['postcode'] or '' !!}</div>
			</div>
			<div class="reg-form-block -req">
				<label>By/Sted*</label>
				{{--<input name="city" value="{{ $data['city'] or '' }}">--}}
				<input name="city" value="Test">
                <div style="color: red">{!! $err['city'] or '' !!}</div>
			</div>
			<!--<div class="reg-form-block -req">
				<label>Tel.*</label>
				<input name="phone" value="">
			</div>
			<div class="reg-form-block">
				<label>Tel.</label>
				<input name="phone_1" value="">
			</div>-->
			<div class="reg-form-block -req">
				<label>Land*</label>
				<input name="country" value="Norway">
                <div style="color: red">{!! $err['country'] or '' !!}</div>
				<div>Required fields are marked with an asterisk(*) must be filled in.</div>
			</div>
			<div>
				<input class="reg-form-button" type="submit" value="Register">
			</div>
		</form>
	</div>
@endsection
