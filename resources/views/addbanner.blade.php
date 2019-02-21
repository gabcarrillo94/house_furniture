@extends('app')

@section('htmlheader_title')
    add banner
@endsection

@section('contentheader_title')
    Create a Banner
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">Add Banner</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/banner', 'method' => 'POST', 'files' => true]) !!}
              {!! Form::token() !!}

              <br>
              <div class="form-group">
                {!! Form::label('Banner priority', 'Select the priority of your banner', ['class' => 'form-control']) !!}
                <br>
                {!! Form::select('priority', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5','6' => '6'], '1') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('url', 'Select the image for the banner', ['class' => 'form-control']) !!}
                <br>
                {!! Form::file('url') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Add banner', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
