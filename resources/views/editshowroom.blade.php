@extends('app')

@section('htmlheader_title')
    Edit banner # {{ $ShowRoom->id }}
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">Modified Image #{{ $ShowRoom->id }}</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'modified/image/showroom', 'method' => 'PUT', 'files' => true]) !!}
              {!! Form::token() !!}
              <br>
              {!! Form::text('id', $ShowRoom->id ,['class' => 'hidden']) !!}

              <div class="form-group">
                {!! Form::label('NameImage', 'Select another image', ['class' => 'form-control']) !!}
                <br>
                <img src="{{ asset('uploads/showroom') . $ShowRoom->NameImage }}" alt="..." class="img-responsive" style="width=100p; height:60px">
                <br>
                {!! Form::file('NameImage') !!}
              </div>
              <strong class="text text-danger" style="margin-bottom: 10px;">Dimensions allowed are: Width <u> (670px-710px)</u> and Height <u> (550px-590px) </u></strong>
              <br>
              <div class="form-group">
                {!! Form::submit('Modified Image', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
