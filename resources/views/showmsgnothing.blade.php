@extends('app')

@section('htmlheader_title')
    Message
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Message</div>

				<div class="panel-body">
					<div class="alert alert-info">
              <h2><i class="fa fa-alert"></i> Notification</h2>

          </div>
          <br>
          <br>
          <p>
            <strong>
              You currently do not have any records saved please, add some registration before coming to this section. Thank you!
            </strong>
          </p>
          <br>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
