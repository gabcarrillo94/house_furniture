@extends('app')

@section('htmlheader_title')
    Edit banner # {{ $Banner->id }}
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">Mofied Banner #{{ $Banner->id }}</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'modified/banner', 'method' => 'PUT', 'files' => true]) !!}
              {!! Form::token() !!}
              <br>
              {!! Form::text('idBanner', $Banner->id ,['class' => 'hidden']) !!}
              <div class="form-group">
                {!! Form::label('priority', 'Selecciona la prioridad de tu banner', ['class' => 'form-control']) !!}
                <br>
                {!! Form::select('priority', ['1' => 'frist', '2' => 'second', '3' => 'three'], $Banner->priority) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('url', 'selecciona otra imagen si desea modificar la existente', ['class' => 'form-control']) !!}
                <br>
                <img src="{{ asset('uploads/banners') . $Banner->url }}" alt="..." class="img-responsive" style="width=100p; height:60px">
                <br>
                {!! Form::file('url') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Modified banner', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
