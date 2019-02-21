<head>
	<title>LuxLuk Design - @yield('htmlheader_title', 'Your title here')</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="{{ asset('uploads/site') . @$favicon_url }}">
	<link rel="stylesheet" href="{{ asset('/front/assets/css/main.css') }}" />
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('/front/assets/css/nivo-slider.css') }}"  type="text/css" rel="stylesheet" media="all" />
      <script type="text/javascript" src="{{ asset('/front/assets/js/jquery-2.1.4.min.js') }}"></script>
      <script type="text/javascript" src="{{asset('/front/assets/js/jquery.nivo.slider.js')}}"></script>
	<link href="{{ asset('dist/css/lightbox.css') }}" rel="stylesheet">
	<link href="{{ asset('css/dropdown.css') }}" rel="stylesheet">
	<script src="{{ asset('js/modernizr.custom.63321.js') }}"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131217050-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-131217050-1');
		console.log('alejandro es pato')
	</script>
	<style>
	#header nav.right {
	        width: 100%;
    		text-align: center;
    		margin-left: auto;
    margin-right: auto;
	}

	#header nav a {
	    font-size: 12px;
	}

	@media (max-width: 460px) {
		#header nav a {
		    font-size: 6.5px;
		}

		#header nav a {
		    font-size: 6.5px;
		}

		.active {
		    font-size: 9px !important;
		}
	}

	@media screen and (max-width: 480px) {
		#header {
		    position: absolute;
		}
	}

	@media (max-width: 479px) and (min-width: 300px) {
		.submenu {
		    top: 3.5em !important;
		}
	}
	</style>
</head>
