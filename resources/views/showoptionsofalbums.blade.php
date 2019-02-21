@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Album edit</div>

				<div class="panel-body">
              <div class="col-md-10">
                  <h2 class="text text-info">What do you want to do with album # {{ session('idAlbum') }}?</h2>
              </div>
              <div class="clearfix"></div>
              <br>
				      <div class="col-md-9">
                  <ul class="list-group">
                    <a href="{{ route('item/show') }}" class="list-group-item">
                      <i class="fa fa-more"></i> Show items</i>
                    </a>
                    <a href="{{ route('item/add') }}" class="list-group-item">
                      <i class="fa fa-more"></i> Add items</i>
                    </a>
                    <a href="{{ route('album/edit') }}" class="list-group-item">
                      <i class="fa fa-more"></i> Edit Album</i>
                    </a>
                    <a data-toggle="modal" data-target="#ModalDelete" href="" data-id="{{ session('idAlbum') }}" aria-hidden="true" class="list-group-item">
                      <i class="fa fa-more"></i> Delete Album and your items</i>
                    </a>
                  </ul>
              </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@include('deletemodal')
