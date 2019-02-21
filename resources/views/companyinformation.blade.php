@extends('app')

@section('htmlheader_title')
    Edit company info
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
				<div class="panel-heading">Your Company info</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'modified/company', 'method' => 'PUT', 'files' => false]) !!}
              {!! Form::token() !!}
			  <div class="form-group">
                {!! Form::label('bannerTitle', 'Banner Title', ['class' => 'form-control']) !!}
                <br>
				{!! Form::textarea('bannerTitle', $Company->bannerTitle) !!}
              </div>
              <div class="form-group">
                {!! Form::label('numberPhone', 'Edit Phone Number', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('numberPhone', $Company->numberPhone) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('mainEmail', 'Email', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('mainEmail', $Company->mainEmail) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('secondEmail', 'Repeat Email', ['class' => 'form-control']) !!}
                <br>
                {!! Form::email('secondEmail', $Company->secondEmail) !!}
              </div>
              <div class="form-group">
                {!! Form::label('direction', 'Company Address', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('direction', $Company->direction, ['class' => 'col-md-9']) !!}
              </div>
              <br><br>
              <div class="form-group">
                {!! Form::submit('Save info', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
