@extends('app')

@section('htmlheader_title')
   Add Category
@endsection

@section('contentheader_title')
    Create a Category
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">Add Category</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/category', 'method' => 'POST']) !!}
              {!! Form::token() !!}
              <div class="form-group">
                {!! Form::label('category', 'Category name', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('category') !!}
              </div>
              <br><br>
              <div class="form-group">
                {!! Form::submit('Add category', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
