@extends('front.app')

@section('htmlheader_title')
    Thank You
@endsection

<style>
@font-face {
    font-family: "Libre Baskerville";
    src: url({{ asset('fonts/LibreBaskerville-Bold.otf') }}) format("truetype");
}
.subTitle {
    font-family: "Libre Baskerville", Verdana, Tahoma;
	padding-left: 15px;
    padding-right: 15px;
    font-size: 3.8em;
    margin-top: 0%;
	text-transform: uppercase;
	text-align: center;
	    color: white;
}
.box {
	border: 1px solid #BBB;
	border-radius: 2%;
	margin-bottom: 1%;
	width: 105%;
	    height: 310px;
	text-align: center;
	-webkit-transition: 1s; /* Safari */
	transition: 1s;
}
.box:hover {
-webkit-box-shadow: 0px 0px 26px 3px rgba(186,182,186,1);
-moz-box-shadow: 0px 0px 26px 3px rgba(186,182,186,1);
box-shadow: 0px 0px 26px 3px rgba(186,182,186,1);
}
.currency {
font-size: .6em;
vertical-align: top;
}
.sale-circle {
	width: 70px;
	height: 70px;
	background: #F70505;
	border-radius: 50%;
	position: absolute;
	right: .5%;
	top: 1%;
}
.sale-text {
	color: white;
	font-style: italic;
	font-weight: bold;
	margin-top: 18%;
	margin-bottom: 0%;
}
.sale-percent {
	color: white;
    font-style: italic;
    font-weight: bold;
    margin-top: -5%;
    margin-bottom: 0%;
    font-size: 1.6em;
}
.product-name {
	text-transform: uppercase;
	color: #1b1718;
	font-size: 1.1em;
	margin-top: -5.5%;
}
.product-price {
	text-transform: uppercase;
	color: #1b1718;
	font-weight: bold;
	font-size: 1.4em;
	margin-top: -1%;
}
.product-old-price {
	font-size: .8em;
	text-decoration: line-through;
	color: #a5a6a8;
}
.portfolio {
    margin: 0em 0 3em!important;
}
@media (max-width: 520px) {
	.subTitle {
		font-size: 1.8em!important;
	}
	
	.sub-subTitle {
		font-size: 1.6em!important;
	}
	
	#subtitle-content {
		top: 3%!important;
	}
	
	.products-cn {
		margin-top: -100%!important;
	}
	
	.product-price {
	    font-size: 1.2em;
	}
	
	.product-name {
	    font-size: .8em;
	}
}
@media (max-width: 430px) {
	#subtitle-content {
		top: 7%!important;
	}
	
	.products-cn {
		margin-top: -90%!important;
	}
	
	.product-price {
	    font-size: 1.2em;
	}
	
	.product-name {
	    font-size: .8em;
	}
}

/* ----------- Windows Phone ----------- */

/* Portrait */
@media screen 
  and (device-width: 480px) 
  and (device-height: 800px)  
  and (orientation: portrait) {
	#subtitle-content {
	    top: 7%!important;
	}
	
	#header nav a {
	    font-size: 10px!important;
	}
	
	.submenu {
	    left: 0%!important;
	}
	
	.product-price {
	    font-size: 1.2em;
	}
	
	.product-name {
	    font-size: .8em;
	}
}

/* Landscape */
@media screen 
  and (device-width: 480px) 
  and (device-height: 800px) 
  and (orientation: landscape) {
	#subtitle-content {
	    top: 20%!important;
	}
}

/* ----------- iPhone X ----------- */

/* Portrait */
@media only screen 
  and (min-device-width: 375px) 
  and (max-device-width: 812px) 
  and (orientation: portrait) { 
	#subtitle-content {
	    top: 4%!important;
	}
	
	.products-cn {
	    margin-top: -155%!important;
	}
	
	.product-price {
	    font-size: 1.2em;
	}
	
	.product-name {
	    font-size: .8em;
	}
}

/* Landscape */
@media only screen 
  and (min-device-width: 375px) 
  and (max-device-width: 812px) 
  and (orientation: landscape) { 
	#subtitle-content {
	    top: 26%!important;
	}
	
	.products-cn {
	    margin-top: 7%!important;
	}
}

/* ----------- iPhone 6+, 7+ and 8+ ----------- */

/* Portrait */
@media only screen 
  and (min-device-width: 414px) 
  and (max-device-width: 736px) 
  and (orientation: portrait) { 
	.products-cn {
	    margin-top: -118%!important;
	}
	
	.product-price {
	    font-size: 1.2em;
	}
	
	.product-name {
	    font-size: .8em;
	}
}

/* Landscape */
@media only screen 
  and (min-device-width: 414px) 
  and (max-device-width: 736px) 
  and (orientation: landscape) { 
	#subtitle-content {
	    top: 18%!important;
	}
}

/* ----------- iPhone 5, 5S, 5C and 5SE ----------- */

/* Portrait */
@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 568px)
  and (orientation: portrait) {
  	#header nav a {
	    font-size: 5.5px!important;
	}
	
	#subtitle-content {
	    top: 4%!important;
	}
	
	.products-cn {
	    margin-top: -116%!important;
	}
	
	.product-price {
	    font-size: 1.2em;
	}
	
	.product-name {
	    font-size: .8em;
	}
}

/* Landscape */
@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 568px)
  and (orientation: landscape) {
  	#header nav a {
	    font-size: 10px!important;
	}
	
	#subtitle-content {
	    top: 9%!important;
	}
	
	.products-cn {
	    margin-top: -2%!important;
	}
}

/* ----------- Others ----------- */

/* Portrait */
@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
  and (orientation: portrait) {
  	#header nav a {
	    font-size: 5.5px!important;
	}
	
	#subtitle-content {
	    top: 4%!important;
	}
	
	.products-cn {
	    margin-top: -86%!important;
	}
	
	.product-price {
	    font-size: 1.2em;
	}
	
	.product-name {
	    font-size: .8em;
	}
}
</style>


@section('main-content')

<div class="hidden" id="message-contact"></div>
<section id="three" class="wrapper">

    <div>
    
    <div style="max-height: 100%;height: 100%;position: relative;">
		<div>
			<img style="width: 100%;" src="{{ asset('uploads/banners/tmp/juliana2-cat.jpg') }}" alt="..." />
		</div>
		<div id="subtitle-content" style="position: absolute;
    top: 36%;
    left: 0;
    height: 100%;
    right: 0;
    bottom: 0;
    padding: 0 !important;
    margin: 0 !important;">
			
			<p class="sub-subTitle" style="font-family: 'Libre Baskerville', Verdana, Tahoma;
			color: white;
			    text-align: center;
			    font-size: 2.6em;">
				Your email has been sent successfully,
			</p>
			
			<p class="sub-subTitle" style="font-family: 'Libre Baskerville', Verdana, Tahoma;
			color: white;
			    text-align: center;
			    font-size: 2.6em;">
				wait for your prompt response
			</p>
		</div>
	</div>
    
    </div>
@endsection
