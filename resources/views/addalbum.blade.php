@extends('app')

@section('htmlheader_title')
    create album
@endsection

@section('contentheader_title')
    Create a Album 
@endsection

@section('script_tinymce')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea', toolbar: "undo redo | styleselect fontselect fontsizeselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent", plugins: "textcolor" });</script>
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">creating a new album</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/album', 'method' => 'POST', 'files' => true]) !!}
              {!! Form::token() !!}
              <div class="form-group">
                {!! Form::label('name', 'Album name', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('name', '', ['class' => 'col-md-8']) !!}

              </div>
              <br><br>
              <div class="form-group">
                {!! Form::label('description', 'Short description', ['class' => 'form-control']) !!}
                <br>
                {!! Form::textarea('description') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('mainImage', 'Select a main image', ['class' => 'form-control']) !!}
                <br>
                {!! Form::file('mainImage') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Add album', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
