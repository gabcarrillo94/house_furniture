@extends('app')

@section('htmlheader_title')
    Show all albums
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Show all albums</div>

				<div class="panel-body">
          <div class="container">
              @foreach($Albums as $album)
                  <div class="col-md-4 col-sm-2" style="margin-top:20px;">
                      <a href="{{ route('options/album/show', ['idAlbum' => $album->id]) }}">
                        <img src="{{ asset('img/folderm.png') }}" alt="..." class="img-responsive">
                        <br>
                        <strong class="text text-black">
                          {{ "Album: " . $album->name }}
                        </strong>
                      </a>
                  </div>
              @endForeach
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
