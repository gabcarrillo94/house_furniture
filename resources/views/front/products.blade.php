@extends('front.app')

@section('htmlheader_title')
	Products
@endsection

<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{width: 100%;padding: 0em 4em; clear:left; font:14px Helvetica,Arial,sans-serif; }
</style>
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
  overflow: auto!important; /* Enable scroll if needed */
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
  .modal {overflow: auto!important;}
  .modal-content {width: 90%!important;}
  #button-mail {margin-top: -1%;}   #button-mail a {font-size: 0.5em!important;padding: 3%;}
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
@if(count($Products) > 0)
  <section id="three" class="wrapper2 portfolio">
	<!-- <div class="fleft">
		<select id="cd-dropdown" class="cd-select" name="category">
			<option value="-1" selected>Filter by category</option>
			@foreach($Categories as $category)
				@if($category->state == 2)
					<option value="{{ $category->category }}" class="icon-camera">{{ ucwords($category->category) }}</option>
				@endif
			@endforeach
			
		</select>
	</div> -->
	<div style="max-height: 100%;height: 100%;position: relative;">
		<div>
			<img style="width: 100%;" src="{{ asset('uploads/banners/tmp/juliana2-cat.jpg') }}" alt="..." />
		</div>
		<div id="subtitle-content" style="position: absolute;
    top: 30%;
    left: 0;
    height: 100%;
    right: 0;
    bottom: 0;
    padding: 0 !important;
    margin: 0 !important;">
			<h2 class="subTitle">
				@if(is_null($subTitle))
					PRODUCTS
				@else
					{{ $subTitle }}
				@endif
			</h2>
			<p class="sub-subTitle" style="font-family: 'Libre Baskerville', Verdana, Tahoma;
			color: #d40505;
			    text-align: center;
			    font-size: 3.6em;margin-bottom: -1%;">
			    
			    @if(preg_match('/\barmchair\b/',$subTitle) || preg_match('/\bnightstand\b/',$subTitle) || preg_match('/\bsofa\b/',$subTitle))
			        50% Off
			    @elseif(preg_match('/\bchair\b/',$subTitle))
			        Up To 80% Off
			    @elseif(preg_match('/\baccessory\b/',$subTitle) || preg_match('/\bottoman\b/',$subTitle) || preg_match('/\bdining\b/',$subTitle))
			        Up To 50% Off
			    @elseif(preg_match('/\baccent\b/',$subTitle) || preg_match('/\bbar\b/',$subTitle) || preg_match('/\bcoffee\b/',$subTitle) || preg_match('/\bconsole\b/',$subTitle) || preg_match('/\bdesk\b/',$subTitle) || preg_match('/\bside\b/',$subTitle) || preg_match('/\bsideboard\b/',$subTitle))
			        45% Off
			    @elseif(preg_match('/\blighting\b/',$subTitle))
			        Up To 35% Off
			    @elseif(preg_match('/\bbed\b/',$subTitle))
			        30% Off
			    @else
			        25% Off
			    @endif
			     
			</p>
			<p class="sub-subTitle" style="font-family: 'Libre Baskerville', Verdana, Tahoma;
			color: #d40505;
			    text-align: center;
			    font-size: 2.6em;">
				All Products
			</p>
			<div style="text-align: center;">
				<div id="button-mail">
					<a href="#" target="_self" class="button primary is-link">
						<span>Get a 20% extra discount</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container products-cn" style="padding-top: 0%;margin-top: -3%;">
      @foreach($Products as $product)
		<div class="col-md-4">
		<div class="box">
			<a style="text-decoration: none!important;" href="{{ route('show/info/product', ['idProduct' => $product->id]) }}">
				<img src="{{ asset('uploads/products' . $product->mainImage ) }}"
				alt="..."
				class="img-responsive"
				style="margin: 30px 0;width: 300px;height: 200px;margin-right: auto;margin-left: auto;"/>
				<p class="product-name">
					{{ $product->name }}
				</p>
				@if(!is_null($product->price) && $product->price!=0 && preg_match('/\bSALE\b/',$subTitle))
					@if($product->price != $product->current_price)
						<p class="product-price">
							<span class="product-old-price">
							<span class="currency">$</span>{{ money_format('%i', $product->price) }}
							</span> &emsp;
							<span class="currency">$</span>{{ money_format('%i', $product->current_price) }}
						</p>
					@endif
					@if($product->price == $product->current_price)
						<p class="product-price">
							<span class="currency">$</span>{{ money_format('%i', $product->price) }}
						</p>
					@endif
				@endif
			</a>
		</div>
		</div>
      @endForeach
    </div>
  </section>
@endIf

<!-- The Modal Mail -->
<div id="myModalMail" class="modal">
  <!-- Modal content -->
  <div class="modal-content" style="width: 35%;">
    <div class="modal-header">
      <span id="mail-close" class="close">&times;</span>
      <h2 style="text-align: center;">
		WE ARE MOVING
	  </h2>
	  <h3 style="text-align: center;margin-top: -1%;margin-left: -2%;">
		Everything Must Go!
	  </h3>
    </div>
    <div class="row">
		<!-- Begin Mailchimp Signup Form -->
			<div id="mc_embed_signup">
				<p style="color: #727a82;text-align: center;margin-top: 2%;margin-bottom: 2%;font-size: 1.1em;">
					Get your coupon now to receive a 20% extra discount, valid for all products and which will be applied over the clearence prices. This promotion is not cumulative with other offers in the store.
				</p>
				<form action="https://luxlukdesign.us20.list-manage.com/subscribe/post?u=c16b63cfce79810f80b700136&amp;id=5198a5d863" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
					<div id="mc_embed_signup_scroll">
						<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
						<div class="mc-field-group">
							<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
							</label>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
					</div>
					
					<div class="mc-field-group">
						<label for="mce-FNAME">First Name </label>
						<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
					</div>
					
					<div class="mc-field-group">
						<label for="mce-LNAME">Last Name </label>
						<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
					</div>
						
					<div class="mc-field-group size1of2">
						<label for="mce-PHONE">Phone Number </label>
						<input type="text" name="PHONE" class="" value="" id="mce-PHONE">
					</div>
					
					<div class="mc-address-group">
						<div class="mc-field-group">
							<label for="mce-MMERGE6-addr1">Address </label>
							<input type="text" value="" maxlength="70" name="MMERGE6[addr1]" id="mce-MMERGE6-addr1" class="">
						</div>
						<div class="mc-field-group">
							<label for="mce-MMERGE6-addr2">Address Line 2</label>
							<input type="text" value="" maxlength="70" name="MMERGE6[addr2]" id="mce-MMERGE6-addr2">		
						</div>
						<div class="mc-field-group size1of2">
							<label for="mce-MMERGE6-city">City</label>
							<input type="text" value="" maxlength="40" name="MMERGE6[city]" id="mce-MMERGE6-city" class="">
						</div>
						<div class="mc-field-group size1of2">
							<label for="mce-MMERGE6-state">State/Province/Region</label>
						<input type="text" value="" maxlength="20" name="MMERGE6[state]" id="mce-MMERGE6-state" class="">
						</div>
						<div class="mc-field-group size1of2">
							<label for="mce-MMERGE6-zip">Postal / Zip Code</label>
							<input type="text" value="" maxlength="10" name="MMERGE6[zip]" id="mce-MMERGE6-zip" class="">
						</div>
						<div class="mc-field-group size1of2">
							<label for="mce-MMERGE6-country">Country</label>
							<select name="MMERGE6[country]" id="mce-MMERGE6-country" class=""><option value="">Select a country</option><option value="164" selected>USA</option><option value="286">Aaland Islands</option><option value="274">Afghanistan</option><option value="2">Albania</option><option value="3">Algeria</option><option value="178">American Samoa</option><option value="4">Andorra</option><option value="5">Angola</option><option value="176">Anguilla</option><option value="175">Antigua And Barbuda</option><option value="6">Argentina</option><option value="7">Armenia</option><option value="179">Aruba</option><option value="8">Australia</option><option value="9">Austria</option><option value="10">Azerbaijan</option><option value="11">Bahamas</option><option value="12">Bahrain</option><option value="13">Bangladesh</option><option value="14">Barbados</option><option value="15">Belarus</option><option value="16">Belgium</option><option value="17">Belize</option><option value="18">Benin</option><option value="19">Bermuda</option><option value="20">Bhutan</option><option value="21">Bolivia</option><option value="325">Bonaire, Saint Eustatius and Saba</option><option value="22">Bosnia and Herzegovina</option><option value="23">Botswana</option><option value="181">Bouvet Island</option><option value="24">Brazil</option><option value="180">Brunei Darussalam</option><option value="25">Bulgaria</option><option value="26">Burkina Faso</option><option value="27">Burundi</option><option value="28">Cambodia</option><option value="29">Cameroon</option><option value="30">Canada</option><option value="31">Cape Verde</option><option value="32">Cayman Islands</option><option value="33">Central African Republic</option><option value="34">Chad</option><option value="35">Chile</option><option value="36">China</option><option value="185">Christmas Island</option><option value="37">Colombia</option><option value="204">Comoros</option><option value="38">Congo</option><option value="183">Cook Islands</option><option value="268">Costa Rica</option><option value="275">Cote D'Ivoire</option><option value="40">Croatia</option><option value="276">Cuba</option><option value="298">Curacao</option><option value="41">Cyprus</option><option value="42">Czech Republic</option><option value="318">Democratic Republic of the Congo</option><option value="43">Denmark</option><option value="44">Djibouti</option><option value="289">Dominica</option><option value="187">Dominican Republic</option><option value="45">Ecuador</option><option value="46">Egypt</option><option value="47">El Salvador</option><option value="48">Equatorial Guinea</option><option value="49">Eritrea</option><option value="50">Estonia</option><option value="51">Ethiopia</option><option value="189">Falkland Islands</option><option value="191">Faroe Islands</option><option value="52">Fiji</option><option value="53">Finland</option><option value="54">France</option><option value="193">French Guiana</option><option value="277">French Polynesia</option><option value="56">Gabon</option><option value="57">Gambia</option><option value="58">Georgia</option><option value="59">Germany</option><option value="60">Ghana</option><option value="194">Gibraltar</option><option value="61">Greece</option><option value="195">Greenland</option><option value="192">Grenada</option><option value="196">Guadeloupe</option><option value="62">Guam</option><option value="198">Guatemala</option><option value="270">Guernsey</option><option value="63">Guinea</option><option value="65">Guyana</option><option value="200">Haiti</option><option value="66">Honduras</option><option value="67">Hong Kong</option><option value="68">Hungary</option><option value="69">Iceland</option><option value="70">India</option><option value="71">Indonesia</option><option value="278">Iran</option><option value="279">Iraq</option><option value="74">Ireland</option><option value="323">Isle of Man</option><option value="75">Israel</option><option value="76">Italy</option><option value="202">Jamaica</option><option value="78">Japan</option><option value="288">Jersey  (Channel Islands)</option><option value="79">Jordan</option><option value="80">Kazakhstan</option><option value="81">Kenya</option><option value="203">Kiribati</option><option value="82">Kuwait</option><option value="83">Kyrgyzstan</option><option value="84">Lao People's Democratic Republic</option><option value="85">Latvia</option><option value="86">Lebanon</option><option value="87">Lesotho</option><option value="88">Liberia</option><option value="281">Libya</option><option value="90">Liechtenstein</option><option value="91">Lithuania</option><option value="92">Luxembourg</option><option value="208">Macau</option><option value="93">Macedonia</option><option value="94">Madagascar</option><option value="95">Malawi</option><option value="96">Malaysia</option><option value="97">Maldives</option><option value="98">Mali</option><option value="99">Malta</option><option value="207">Marshall Islands</option><option value="210">Martinique</option><option value="100">Mauritania</option><option value="212">Mauritius</option><option value="241">Mayotte</option><option value="101">Mexico</option><option value="102">Moldova, Republic of</option><option value="103">Monaco</option><option value="104">Mongolia</option><option value="290">Montenegro</option><option value="294">Montserrat</option><option value="105">Morocco</option><option value="106">Mozambique</option><option value="242">Myanmar</option><option value="107">Namibia</option><option value="108">Nepal</option><option value="109">Netherlands</option><option value="110">Netherlands Antilles</option><option value="213">New Caledonia</option><option value="111">New Zealand</option><option value="112">Nicaragua</option><option value="113">Niger</option><option value="114">Nigeria</option><option value="217">Niue</option><option value="214">Norfolk Island</option><option value="272">North Korea</option><option value="116">Norway</option><option value="117">Oman</option><option value="118">Pakistan</option><option value="222">Palau</option><option value="282">Palestine</option><option value="119">Panama</option><option value="219">Papua New Guinea</option><option value="120">Paraguay</option><option value="121">Peru</option><option value="122">Philippines</option><option value="221">Pitcairn</option><option value="123">Poland</option><option value="124">Portugal</option><option value="126">Qatar</option><option value="315">Republic of Kosovo</option><option value="127">Reunion</option><option value="128">Romania</option><option value="129">Russia</option><option value="130">Rwanda</option><option value="205">Saint Kitts and Nevis</option><option value="206">Saint Lucia</option><option value="324">Saint Martin</option><option value="237">Saint Vincent and the Grenadines</option><option value="132">Samoa (Independent)</option><option value="227">San Marino</option><option value="255">Sao Tome and Principe</option><option value="133">Saudi Arabia</option><option value="134">Senegal</option><option value="326">Serbia</option><option value="135">Seychelles</option><option value="136">Sierra Leone</option><option value="137">Singapore</option><option value="302">Sint Maarten</option><option value="138">Slovakia</option><option value="139">Slovenia</option><option value="223">Solomon Islands</option><option value="140">Somalia</option><option value="141">South Africa</option><option value="257">South Georgia and the South Sandwich Islands</option><option value="142">South Korea</option><option value="311">South Sudan</option><option value="143">Spain</option><option value="144">Sri Lanka</option><option value="293">Sudan</option><option value="146">Suriname</option><option value="225">Svalbard and Jan Mayen Islands</option><option value="147">Swaziland</option><option value="148">Sweden</option><option value="149">Switzerland</option><option value="285">Syria</option><option value="152">Taiwan</option><option value="260">Tajikistan</option><option value="153">Tanzania</option><option value="154">Thailand</option><option value="233">Timor-Leste</option><option value="155">Togo</option><option value="232">Tonga</option><option value="234">Trinidad and Tobago</option><option value="156">Tunisia</option><option value="157">Turkey</option><option value="158">Turkmenistan</option><option value="287">Turks &amp; Caicos Islands</option><option value="159">Uganda</option><option value="161">Ukraine</option><option value="162">United Arab Emirates</option><option value="262">United Kingdom</option><option value="163">Uruguay</option><option value="165">Uzbekistan</option><option value="239">Vanuatu</option><option value="166">Vatican City State (Holy See)</option><option value="167">Venezuela</option><option value="168">Vietnam</option><option value="169">Virgin Islands (British)</option><option value="238">Virgin Islands (U.S.)</option><option value="188">Western Sahara</option><option value="170">Yemen</option><option value="173">Zambia</option><option value="174">Zimbabwe</option></select>
						</div>
					</div>
						
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					 
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c16b63cfce79810f80b700136_5198a5d863" tabindex="-1" value=""></div>
						<div class="clear">
							<input style="font-size: 15px!important;" type="submit" 
							value="Get Coupon" name="subscribe" id="mc-embedded-subscribe" class="button">
						</div>
					</div>
				</form>
				<p style="color: #727a82;text-align: center;">
					<i>This discount coupon is valid until March 2, 2019.</i>
				</p>
			</div>
			<!--End mc_embed_signup-->
    </div>
  </div>
</div>
@endsection

<script>
setTimeout(function() {
	// Get the modal
	var modalmail = document.getElementById('myModalMail');
	
	// Get the button that opens the modal
	var btnmail = document.getElementById("button-mail");
	
	// Get the <span> element that closes the modal
	var spanmail = document.getElementById("mail-close");
	
	// When the user clicks the button, open the modal
	btnmail.onclick = function() {
	  modalmail.style.display = "block";
	}
	
	// When the user clicks on <span> (x), close the modal
	spanmail.onclick = function() {
	  modalmail.style.display = "none";
	}
	
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}
}, 3000);
</script>