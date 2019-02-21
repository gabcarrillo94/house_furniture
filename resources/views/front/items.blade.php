@extends('front.app')

@section('htmlheader_title')
    Show Room
@endsection


@section('main-content')
	<section id="three" class="wrapper2 portfolio">

    @if(count($ItemsShowRoom) > 0 and count($ItemsShowRoom) < 3 )
        <div class="container showroom-items">
              @foreach($ItemsShowRoom as $itemsshowroom)
                  <div class="col-md-5 col-xs-12" style="margin:10px 30px;">
                      <div class="image fit show-room">
                        <<a data-lightbox="roadtrip" href="{{ asset('uploads/showroom' . $itemsshowroom->NameImage ) }}">
                          <img src="{{ asset('uploads/showroom' . $itemsshowroom->NameImage ) }}" alt="..." />
                        </a>
                  </div>
              @endForeach
        </div>
      @endIf
      @if(count($ItemsShowRoom) > 2)
          <div class="container showroom-items">
                @foreach($ItemsShowRoom as $itemsshowroom)
                    <div class="col-md-4 col-xs-12">
                        <div class="image fit show-room">
                            <!--<a href="{{ asset('uploads/showroom' . $itemsshowroom->NameImage ) }}" data-lightbox="roadtrip">Image #2</a>
                            -->
                            <a data-lightbox="roadtrip" href="{{ asset('uploads/showroom' . $itemsshowroom->NameImage ) }}">
                              <img src="{{ asset('uploads/showroom' . $itemsshowroom->NameImage ) }}" alt="..." />
                            </a>
                            <!--<a class="fa fa-eye" aria-hidden="true" href="{{ asset('uploads/showroom' . $itemsshowroom->NameImage ) }}" data-lightbox="roadtrip" style="color:black; margin-top:10px; position: relative; left: 80px; text-decoration:none;"> view image</a>
                          --></div>
                    </div>
                @endForeach
          </div>
        @endIf
		</section>
@endsection
