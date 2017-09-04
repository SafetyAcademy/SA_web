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
				<input name="email" value="">
			</div>
			<!--<div class="reg-form-block -req">
				<label>Epostbekreftelse*</label>
				<input name="email_2" value="">
			</div>-->
			<div class="reg-form-block -req">
				<label>Password*</label>
				<input type="password" name="pass" value="">
			</div>
			<div class="reg-form-block -req">
				<label>Repeat password*</label>
				<input type="password" name="pass_1" value="">
			</div>
			<div class="reg-form-block -req">
				<label>Fornavn*</label>
				<input name="first_name" value="">
			</div>
			<div class="reg-form-block -req">
				<label>Mobile Etternavn*</label>
				<input name="last_name" value="">
			</div>
			<!--<div class="reg-form-block">
				<label>Firm</label>
				<input name="firm" value="">
			</div>-->
			<div class="reg-form-block -req">
				<label>Gateadresse*</label>
				<input name="street" value="">
			</div>
			<div class="reg-form-block">
				<label>Postnr</label>
				<input name="postcode" value="">
			</div>
			<div class="reg-form-block -req">
				<label>By/Sted*</label>
				<input name="city" value="">
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
				<div>Required fields are marked with an asterisk(*) must be filled in.</div>
			</div>	
			<div>
				<input class="reg-form-button" type="submit" value="Register">
			</div>
		</form>
	</div>
@endsection