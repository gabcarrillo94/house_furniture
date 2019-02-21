@extends('app')

@section('htmlheader_title')
    action proccess
@endsection
@section('contentheader_title')
    Proccess 
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					@if(isset($msg))
              <div class="alert alert-success">
                  {{ $msg }}
              </div>
              click <a href="{{ url('/home') }}">here</a> to go back
          @else
            <div class="alert alert-success">
                {{ "Mensaje por defecto" }}
            </div>
          @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
