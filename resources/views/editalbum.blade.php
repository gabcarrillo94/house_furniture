@extends('app')

@section('htmlheader_title')
    Edit album # {{ $Album->id }}
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
				<div class="panel-heading">Modified album #{{ $Album->id }}</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'modified/album', 'method' => 'PUT', 'files' => true]) !!}
              {!! Form::text('idAlbum', $Album->id, ['class' => 'hidden'])  !!}
              {!! Form::token() !!}
              <br>
              {!! Form::text('idAlbum', $Album->id ,['class' => 'hidden']) !!}
              <div class="form-group">
                {!! Form::label('name', 'Write a new name of album', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('name', $Album->name) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('description', 'Write a new short description of your album', ['class' => 'form-control']) !!}
                <br>
                {!! Form::textarea('description', $Album->description) !!}
              </div>
              <br>
              <img src="{{ asset('uploads/') .'/'. $Album->ubication }}" alt="..." class="img-responsive" style="width=150px; height:100px">
              <br>
              <div class="form-group">
                {!! Form::label('mainImage', 'Select a main image for your album', ['class' => 'form-control']) !!}
                <br>
                {!! Form::file('mainImage') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Modified album', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
