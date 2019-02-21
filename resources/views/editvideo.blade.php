@extends('app')

@section('htmlheader_title')
    edit video
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
        <div class="panel-heading">Edit video # {{ $Video->id }} </div>
        <div class="panel-body">
          {!! Form::open(['route' => 'modified/video', 'method' => 'PUT']) !!}
              {!! Form::token() !!} 
              {!! Form::text('id', $Video->id, ['class' => 'hidden']) !!}
              <div class="form-group">
                {!! Form::label('url', 'Video url, example: https://m.youtube.com/watch?feature=share&v=NM_3wsvo3fs', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('url', $Video->url, ['class' => 'col-md-8']) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('description', 'Short description', ['class' => 'form-control']) !!}
                <br>
                {!! Form::textarea('description', $Video->description) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Edit video', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
