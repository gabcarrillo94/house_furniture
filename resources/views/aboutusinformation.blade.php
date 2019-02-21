@extends('app')

@section('htmlheader_title')
    Modify info - ABOUT US
@endsection
@section('contentheader_title')
    About Us 
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
				<div class="panel-heading">Modify info - ABOUT US</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'modified/aboutus', 'method' => 'PUT', 'files' => true]) !!}
                  {!! Form::token() !!}
                  <div class="form-group">
                    {!! Form::label('shortDescription', 'Short description', ['class' => 'form-control']) !!}
                    <br>
                    {!! Form::textarea('shortDescription',$AboutUS->shortDescription) !!}
                  </div>
                  <br>
                  <div class="form-group">
                    {!! Form::label('fulltDescription', 'Long description', ['class' => 'form-control']) !!}
                    <br>
                    {!! Form::textarea('fullDescription', $AboutUS->fullDescription) !!}
                  </div>
                  <br>
                  <div class="form-group">
                    {!! Form::label('usImage', 'Replace image', ['class' => 'form-control']) !!}
                    <br>
                    <img src="{{ asset('uploads/aboutus') . $AboutUS->usImage  }}" alt="..." class="img-responsive" style="height: 500px; ">
                    <br>
                    {!! Form::file('usImage') !!}
                  </div>
                  <br>
                  <div class="form-group">
                    {!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}
                  </div>
          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
