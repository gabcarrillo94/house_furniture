@extends('front.app')

@section('htmlheader_title')
Info Products
@endsection

@section('main-content')
@if(count($Product) > 0)
<style>
    .button {
  display: inline-block;
  position: relative;
  width: 27px;
  height: 27px;
  margin: 2px;
  cursor: pointer;
  background-color: transparent!important;
  padding: 0 1em!important;
}

.button span {
  display: block;
  position: absolute;
  width: 27px;
  height: 27px;
  padding: 0!important;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  border-radius: 100%;
  background: #eeeeee;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  transition: ease .3s;
}

input {
  display: none!important;
}

.button span:hover {
  padding: 10px!important;
  width: 32px;
  height: 32px;
}

.layer {
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: transparent;
  /*transition: ease .3s;*/
  z-index: -1;
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
	font-size: 1.2em;
	margin-top: -6%;
}
.product-price {
	text-transform: uppercase;
	color: #1b1718;
	font-weight: bold;
	font-size: 1.5em;
	margin-top: -2%;
}
.product-old-price {
	font-size: .8em;
	text-decoration: line-through;
	color: #a5a6a8;
}

.no-color .button span {
  opacity: .5;
    width: 24px;
    height: 24px;
    border: 2px solid red;
}

.color {
	margin-right: 4%;
	text-align: center;
}
</style>
<section id="products" class="wrapper2 portfolio">
    <div class="inner">
      <div class="divider"></div>
      <div class="row">
            <div class="3u 12u$(small)">
               <!--  <h3>Product #{{ $Product->id }}</h3> -->
                <br>
                <p><strong class="text-danger"> Ref. </strong> <strong>{{ $Product->code }}</strong></p>
                <p> <strong class="text-danger"> Description: </strong>{!! $Product->description !!}</p>
                
                @if(!is_null($Product->price) && $Product->price!=0)
                    <p> <strong class="text-danger"> Price: </strong></p>
					@if($Product->price != $Product->current_price)
						<p class="product-price">
							<span class="product-old-price">
							<span class="currency">$</span>{{ money_format('%i', $Product->price) }}
							</span> 
							<span class="currency">$</span>{{ money_format('%i', $Product->current_price) }}
						</p>
					@endif
					@if($Product->price == $Product->current_price)
						<p class="product-price">
							<span class="currency">$</span>{{ money_format('%i', $Product->price) }}
						</p>
					@endif
				@endif
                    
                <p><strong class="text-danger"> Colors: </strong></p>
                <div style="text-align: center;">
					@foreach($Colors as $color)
						@if(!is_null($ColorsInStock) && $ColorsInStock!='')
							@foreach($ColorsInStock as $colorStock)
								@if($color->id == $colorStock)
									<label class="color" title="{{$color->name}} In Stock">
										<input type="radio" name="color">
										<div class="layer"></div>
										<div class="button">
											<span style="background: {{$color->hex_code}};"></span>
										</div>
										<p>{{$color->name}}</p>
									</label>
								@endif
							@endforeach
						@endif
					@endforeach
					
					@if(!is_null($ColorsInStock) && $ColorsInStock!='')
						<br>
					@endif
					
					@foreach($Colors as $color)
						@if(!is_null($ColorsSoldOut) && $ColorsSoldOut!='')
							@foreach($ColorsSoldOut as $colorSold)
								@if($color->id == $colorSold)
									<label class="color no-color" title="{{$color->name}} Sold Out">
										<input type="radio" name="color">
										<div class="layer"></div>
										<div class="button">
											<span style="background: {{$color->hex_code}};"></span>
										</div>
										<p>{{$color->name}}</p>
									</label>
								@endif
							@endforeach
						@endif
					@endforeach
					
					<p id="color-title" style="margin-bottom: -28%;color: #727a82;font-size: .9em;">&nbsp;</p>
		</div>
		<br><br><br><br>
		<p><strong>
			For additional information and orders please call us or visit our showroom: <br>
			+ 1 305 705 2735 <br>
			8031 NE 5th Avenue, Miami, Florida
		</strong></p>
            </div>
            <div class="9u$ 12u$(small)">
              <img src="{{ asset('uploads/products' . $Product->mainImage) }}">
            </div>
      </div>
  </div>
  
	<script>
		var colors = document.getElementsByClassName("color");

		var myTitle = function() {
		    document.getElementById("color-title").innerHTML = this.title;
		};
		
		for (var i = 0; i < colors.length; i++) {
		    colors[i].addEventListener('click', myTitle, false);
		}
	</script>
</section>
@endIf
@endsection
