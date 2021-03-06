@extends('app')

@section('htmlheader_title')
    Modified item
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">

				<div class="panel-heading">Modified item</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'modified/item', 'method' => 'PUT', 'files' => true]) !!}
              {!! Form::token() !!}
              {!! Form::text('idAlbum', $idAlbum, ['class' => 'hidden']) !!}
              <div class="form-group">
                {!! Form::label('name', 'Item name', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('name') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('itemImage', 'Upload the item image', ['class' => 'form-control']) !!}
                <br>
                {!! Form::file('itemImage') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Add item', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
