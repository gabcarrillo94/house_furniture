@extends('front.app')

@section('htmlheader_title')
    Portfolio
@endsection


@section('main-content')
@if(count($Albums) > 0)
<section id="three" class="wrapper2 portfolio">
          <div class="inner flex flex-3">
              @foreach($Albums as $album)
                    <div class="col-xs-12 col-md-5">
                          <div class="image fit port-img">
                    				    <a href="{{ route('active/portfolio', ['idAlbum' => $album->id]) }}">
                                  <img src="{{ asset('uploads/'. $album->ubication) }}" alt="..." />
                                <span class="text-on-img"><span>{!! $album->description !!}</span></span></a>
                    			</div>
              						<div class="content">
            						       <h2> <a href="route('active/portfolio', ['idAlbum' => $album->id])">{{ $album->name }}</a></h2>
              						</div>
                      </div>
                @endForeach
      		</div>
          <br>
          <hr>
          <br>

          <div class="container">
          <?php  $numero_de_videos = count($Videos); ?>

              @foreach($Videos as $video)
                    <?php
                        $url = $video->url;
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                        $id = $matches[1];
                    ?>
                    @if($numero_de_videos < 2)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cn-video">
                          <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"></iframe>
                          </div>
                           <?php 
                              
                              $vide_descripcion = substr($video->description, 0, 40);

                           ?>
                          <p><strong class="text-description">{!! $video->description !!} </strong></p>
                      </div>
                    @else
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 cn-video">
                          <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"></iframe>
                          </div>
                          <p><strong class="text-description">{!! $video->description !!} </strong></p>
                      </div>
                    @endif
                    
                    <!-- 
                  <div class="col-md-6">
                        <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 400px; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 400px; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3' frameborder='0' allowfullscreen></iframe></div>
                  </div>
 -->
                @endForeach
          </div>
</section>
@endIf
@endsection
