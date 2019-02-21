@extends('app')

@section('htmlheader_title')
    Site Settings
@endsection


@section('main-content')
<div class="col-md-3 col-lg-3">
	@include('partials.settings_bar')
</div>
<div class="col-lg-9 col-md-9">
	<div class="box box-info box_info">
            <div class="box-header with-border">
              <h3 class="box-title">Site Settings Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(@$count_setting > 0)
              	{!! Form::open(['url' => 'settings/site/update', 'class' => 'form-horizontal', 'files' => true]) !!}
              	{!! Form::hidden('site_id', @$setting[0]->id) !!}
            @else
            	{!! Form::open(['url' => 'settings/site/create', 'class' => 'form-horizontal', 'files' => true]) !!}

            @endif  
              <div class="box-body">
                <div class="form-group">
                  <label for="input_site_name" class="col-sm-3 control-label">Site Name<em class="text-danger">*</em>  <span data-toggle="tooltip" class="fa fa-question-circle-o" title="This number of site will be present of prefix in each of the pages like title" style="cursor: pointer;"></span> </label>
                  <div class="col-sm-6">
                    {!! Form::text('site_name', @$setting[0]->site_name, ['class' => 'form-control', 'id' => 'input_site_name', 'placeholder' => 'Site Name']) !!}
                    <span class="text-danger">{{ $errors->first('site_name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_site_name" class="col-sm-3 control-label">
                  <div class="col-md-11" style="padding: 0;">
                  		Add a description of your website (To improve the SEO of your website and therefore the position in google analytics ) 
                  </div> 
                  <div class="col-md-1" style="padding: 0;">
                  		 <span data-toggle="tooltip" class="fa fa-question-circle-o" title="This meta description defines the home (/)" style="cursor: pointer;"></span>
                  </div> 
                 </label>
                  <div class="col-sm-6">
                    {!! Form::textarea('site_description', @$setting[0]->site_description, ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Example: ']) !!}
                    <span class="text-danger">{{ $errors->first('site_description') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_logo" class="col-sm-3 control-label">Favicon</label>
                  <em>Size: 16x16</em>
                  <div class="col-sm-6">
                    {!! Form::file('favicon_url', '', ['class' => 'form-control', 'id' => 'input_logo']) !!}
                    <span class="text-danger">{{ $errors->first('favicon_url') }}</span>
                    @if(@$count_setting > 0)
              			<img src="{{ asset('uploads/site') . @$setting[0]->favicon_url }}">
		            @endif  
                    
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="submit" value="submit">Submit</button>
              </div>
              <!-- /.box-footer -->
            {!! Form::close() !!}
          </div>
</div>
</div>

@endsection

