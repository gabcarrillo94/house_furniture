@extends('front.app')

@section('htmlheader_title')
    Contact US
@endsection


@section('main-content')

<div class="hidden" id="message-contact"></div>
<section id="three" class="wrapper">

    @if(count($Company) > 0)
        <div style="text-align:center;color:#333 !important; margin-bottom: 60px!important;">
        <h3 style="color:#333 !important;">Send us a Message:</h3>
        </div>
        <form action="{{ route('send-mail') }}" id="form" method="post">
          {{ csrf_field() }}
				<div class="inner flex flex-3">
					<div class="flex-item box">
						<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">

					</div>
					<div class="flex-item box">
						<input type="text" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">

					</div>
					<div class="flex-item box">
                        <input type="text" name="Phone" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
					</div>
				</div>
                <div class="inner flex flex-3">
					<textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
				</div>
                <div style="text-align:center;" class="inner flex flex-3">
					<input type="button" class="send-contact" value="Submit">
				</div>
        </form>
			</section>

      <div id="footer">
      		<ul class="actions">
      		<li><span class="icon fa-phone"></span> {{ $Company->numberPhone }}</li>
      		<li><span class="icon fa-envelope"></span> <a href="#"> {{ $Company->mainEmail }}</a></li>
      		<li><span class="icon fa-map-marker"></span> {{ $Company->direction }}</li>
      		</ul>
      </div>
      <hr>
      <div class="container" style="margin-bottom: 20px;">
          <h3 style="margin: 15px 0px; text-align: center;">
              We are located here:
          </h3>
          <div class="col-md-10 col-lg-10 col-xs-12 map-google" style="padding-left:20%;">
                <iframe class="iframe-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3590.6290665068354!2d-80.18805358497725!3d25.848765483597294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b3d56c773eab%3A0x33dc4aa1766f6ad6!2s8031+NE+5th+Ave%2C+Miami%2C+FL+33138%2C+EE.+UU.!5e0!3m2!1ses!2sve!4v1497642758706" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>    
          </div>
          
      </div>
      
    @endIf
@endsection
