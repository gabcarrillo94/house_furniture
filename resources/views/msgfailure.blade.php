@extends('app')

@section('htmlheader_title')
    Action failed
@endsection
@section('contentheader_title')
    Failure
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Message </div>

				<div class="panel-body">
					@if(isset($failed))
              <div class="alert alert-danger">
                  {{ $failed }}
              </div>
              click <a href="{{ url('/home') }}">here</a> to go back
          @else
            <div class="alert alert-danger">
                {{ "Mensaje por defecto" }}
            </div>
          @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
