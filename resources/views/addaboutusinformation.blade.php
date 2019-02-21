@extends('app')

@section('htmlheader_title')
    Add information of company
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
				<div class="panel-heading">Add about us information</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/aboutus', 'method' => 'POST', 'files' => true]) !!}
              {!! Form::token() !!}
              <div class="form-group">

                {!! Form::label('shortDescription', 'Add short description', ['class' => 'form-control']) !!}
                <br>
                {!! Form::textarea('shortDescription') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('fullDescription', 'Add a description large', ['class' => 'form-control']) !!}
                <br>
                {!! Form::textarea('fullDescription') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('usImage', 'Add an image for the section about us ', ['class' => 'form-control']) !!}
                <br>
                {!! Form::file('usImage') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Add information de about us ', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
