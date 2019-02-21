@extends('app')

@section('htmlheader_title')
    Add image to ShowRoom
@endsection
@section('contentheader_title')
    Add image to ShowRoom
@endsection

@section('main-content')
<div class="container">
	<div class="row">
    @if(session()->has('messageError'))
    <div class="alert alert-danger col-md-10 col-md-offset-1">{{ session('messageError') }}</div>
    @endif
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">

				<div class="panel-heading">Add image</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/showroom', 'method' => 'POST', 'files' => true]) !!}
              {!! Form::token() !!}
              <br>
              <div class="form-group">
                {!! Form::label('NameImage', 'Upload the Show Room image', ['class' => 'form-control']) !!}
                <br>
                {!! Form::file('NameImage') !!}
                <strong class="text text-danger" style="margin-bottom: 10px;">Dimensions allowed are: Width <u> (670px-710px)</u> and Height <u> (550px-590px) </u></strong>
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Add image', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
