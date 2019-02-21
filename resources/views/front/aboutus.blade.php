
@extends('front.app')

@section('htmlheader_title')
  About US
@endsection


@section('main-content')

<section id="products" class="wrapper2 portfolio">
    <div class="inner">
      <div class="row">
        @if(count($AboutUS) > 0)
          <div class="6u 12u$(small)">
      		     <h3>About Us</h3>
               <span style="font-size:0.85em; color:#444;">{!! $AboutUS->shortDescription !!}</span>
                <p class="justify">{!!$AboutUS->fullDescription !!}.</p>
           </div>
      	    <div class="6u$ 12u$(small)">
      			      <img class="img-responsive" src="{{ asset('uploads/aboutus' . $AboutUS->usImage ) }}">
            </div>
        @endIf
        </div>
      </div>
</section>

@endsection
