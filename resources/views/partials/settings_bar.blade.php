@section('contentheader_title')
    Settings
@endsection
<div class="box box-info box_info">
      <div class="panel-body">
      <h4 class="all_settings">Manage Settings</h4>
          <ul class="nav navbar-pills nav-tabs nav-stacked no-margin" role="tablist">
                <li class="">
                    <a href="{{ url('settings/site') }}" data-group="profile">Site Settings</a>
                </li>
                <!-- <li class="">
                  <a href="{{ url('settings/metas') }}" data-group="profile">Metas</a>
                </li> -->
          </ul>
      </div>
</div>
                         