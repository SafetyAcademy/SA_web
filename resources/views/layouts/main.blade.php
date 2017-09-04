<!DOCTYPE html>
<html lang="en" data="{{ env('API_URL') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Safety Academy</title>

    <!--<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="shortcut icon" type="image/png" href="{{ env('BASE_URL') }}favicon.ico"/>-->

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="/css/main.css?{{ time() }}" rel="stylesheet">

    @yield('css')

</head>
<body>

    <div class="wrapper-top-top"></div>
    <div class="wrapper-top"></div>

	<div class="wrapper @yield('wrapper_class')">
		<div class="header">
			<a class="header-logo" href="/"><img src="/i/logo.png"></a>
			<div class="header-right">
				<a class="header-right-search" href="#"></a>
				@if (!UserAuth::check())
					<a class="header-right-login" href="/sign_in/">Sign in Portal</a>
					<button class="header-right-signup" data="/sign_up/">Sign Up Portal</button>
				@else
					<a class="header-right-login" href="/logout/">{{ UserAuth::getUserField('first_name') }} {{ UserAuth::getUserField('last_name') }}</a>
				@endif
				<a class="header-right-lang" href="#">
					Norway
					<span></span>
				</a>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

        @yield('content')

        <div class="footer-layout">
        	<div class="footer">
	        	<a class="footer-logo" href="/"><img src="/i/logo-footer.png"></a>
	        	<div class="footer-text">
		        	Førstehjelperen AS<br /><br />
					Tvetenveien 152<br /><br />
					0671 Oslo<br /><br />
					<span>(601) 1111-1111</span>
	        	</div>
	        	<div class="clear"></div>
        	</div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.6.0/clipboard.min.js"></script>
    <script src="/js/main.js?{{ time() }}"></script>

    @yield('js')

</body>
</html>
