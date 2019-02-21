@extends('app')

@section('htmlheader_title')
    Site Settings
@endsection


@section('main-content')
<div class="col-md-3 col-lg-3">
	@include('partials.settings_bar')
</div>
<div class="col-lg-9 col-md-9">
	<!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info box_info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Page Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="input_name" class="col-sm-3 control-label">Name<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_content" class="col-sm-3 control-label">Content<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <textarea id="txtEditor" name="txtEditor"></textarea>
                    <textarea id="content" name="content" hidden="true">{{ old('content') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_footer" class="col-sm-3 control-label">Footer<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <span class="text-danger">{{ $errors->first('footer') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_under" class="col-sm-3 control-label">Under</label>
                  <div class="col-sm-6">
                    <span class="text-danger">{{ $errors->first('under') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_status" class="col-sm-3 control-label">Status<em class="text-danger">*</em></label>
                  <div class="col-sm-6">
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="submit" value="submit">Submit</button>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
@endsection

