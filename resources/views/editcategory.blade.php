@extends('app')

@section('htmlheader_title')
    Modified category
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">

			<div class="panel-heading">Modified category</div>
			<div class="panel-body">
      		{!! Form::open(['route' => 'modified/category', 'method' => 'PUT']) !!}
              {!! Form::token() !!}
              {!! Form::text('id', $Category->id, ['class' => 'hidden']) !!}
              <div class="form-group">
                {!! Form::label('category', 'Category name', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('category', $Category->category) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Modified Category', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
