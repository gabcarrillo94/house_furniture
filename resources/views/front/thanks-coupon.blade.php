@extends('front.app')

@section('htmlheader_title')
    Thank You Coupon
@endsection

<style>
@font-face {
    font-family: "Libre Baskerville";
    src: url({{ asset('fonts/LibreBaskerville-Bold.otf') }}) format("truetype");
}

#button-sale:hover, #button-mail:hover {
    opacity: .7;
}

#button-sale:hover a, #button-mail:hover a {
    text-decoration: none;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 999; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 0px;
  border: 1px solid #888;
  width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
  margin-top: 2px;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  margin-bottom:1%;
  background-color: #ccc;
  color: white;
}

#button-sale a, #button-mail a {
	display: inline-block;
    line-height: 1.6;
    color: white;
    border: 1px solid white;
    border-radius: 25px;
    padding: 6%;
    background: transparent;
    width: 225px;
    margin-top: 0%!important;
}

#button-sale span, #button-mail span {
    width: auto;
}

#button-sale, #button-mail {
border-radius: 99px;
    margin-right: auto!important;
    margin-left: auto!important;
    color: #000000;
    margin-top: .5em;
    margin-bottom: .5em;
    background-color: transparent !important;
    border-color: transparent !important;
    position: relative;
    display: inline-block;
    text-transform: uppercase;
    font-size: 1.1em!important;
    letter-spacing: .03em;
    touch-action: none;
    cursor: pointer;
    font-weight: bolder;
    text-align: center;
    text-decoration: none;
    border: 1px solid transparent;
    vertical-align: middle;
    text-shadow: none;
    line-height: 2.4em;
    min-height: 2.5em;
    padding: 0 1.2em;
    max-width: 100%;
    text-rendering: optimizeLegibility;
    box-sizing: border-box;
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
				Your coupon has been sent
			</p>
			
			<p class="sub-subTitle" style="font-family: 'Libre Baskerville', Verdana, Tahoma;
			color: white;
			    text-align: center;
			    font-size: 2.7em;">
				to your email
			</p>
				
			<div style="text-align: center;">
				<div id="button-sale">
					<a href="#" target="_self" class="button primary is-link">
						<span>View Our Collection</span>
					</a>
				</div>
			</div>
			
		</div>
	</div>
    
</div>
	
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="modal-close" class="close">&times;</span>
      <h2 style="color: white;">Select a Category</h2>
    </div>
    <div class="row">
    	@foreach($Categories as $category)
		<?php
			$id_category = str_replace(' ', '', $category->category);
		?>
		<div class="col-md-4 col-sm-6 col-xs-12" style="text-align: center;">
			<div id="button-sale">
				<a href="{{ url('sales/category', $id_category) }}" target="_self" class="button primary is-link" style="color: black;border: 1px solid black;width: 182px;">
					<span>{{ $category->category }}</span>
				</a>
			</div>
		</div>
	@endforeach
    </div>
  </div>

</div>
@endsection

<script>
setTimeout( function() {
	// Get the modal
	var modal = document.getElementById('myModal');
	
	// Get the button that opens the modal
	var btn = document.getElementById("button-sale");
	
	// Get the <span> element that closes the modal
	var span = document.getElementById("modal-close");
	
	// When the user clicks the button, open the modal
	btn.onclick = function() {
	  modal.style.display = "block";
	}
	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}
	
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}
}, 1000);
</script>