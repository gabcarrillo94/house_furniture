@extends('app')

@section('htmlheader_title')
    upload a video
@endsection
@section('contentheader_title')
    Upload Video 
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
				<div class="panel-heading">Upload a video to the portfolio section </div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/video', 'method' => 'POST']) !!}
              {!! Form::token() !!}	
              <div class="form-group">
                {!! Form::label('url', 'Video url, example: https://m.youtube.com/watch?feature=share&v=NM_3wsvo3fs', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('url', '', ['class' => 'col-md-8']) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('description', 'Short description', ['class' => 'form-control']) !!}
                <br>
                {!! Form::textarea('description') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Create a video', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
