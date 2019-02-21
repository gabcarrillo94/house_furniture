@extends('app')

@section('htmlheader_title')
    Add information of company
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">Add company information</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/company', 'method' => 'POST', 'files' => true]) !!}
              {!! Form::token() !!}
			  <div class="form-group">
                {!! Form::label('bannerTitle', 'Banner Title', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('bannerTitle') !!}
              </div>
              <div class="form-group">
                {!! Form::label('numberPhone', 'Number Phone', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('numberPhone') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('mainEmail', 'Add email', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('mainEmail') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('secondEmail', 'Add email second', ['class' => 'form-control']) !!}
                <br>
                {!! Form::email('secondEmail') !!}
              </div>
              <div class="form-group">
                {!! Form::label('direction', 'Add your direction', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('direction', null, ['class' => 'col-md-9']) !!}
              </div>
              <br><br>
              <div class="form-group">
                {!! Form::submit('Add information of the company', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
