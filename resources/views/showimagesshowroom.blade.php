@extends('app')
@section('htmlheader_title')
    show banners
@endsection

@section('contentheader_title')
    ShowRoom Images
@endsection

@section('main-content')
<div class="hidden message-status"></div>
<table class="table table-striped">
  <tr>
    <th>Image</th>
    <th>Publication Date</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
  @foreach($ShowRooms as $ShowRoom)
     <tr>
        <td><img src="{{ asset('uploads/showroom') . $ShowRoom->NameImage }}" alt="..." class="img-responsive" style="width:100px; height: 60px; "></td>
        <td>{{ $ShowRoom->created_at }}</td>
        <td>
            @if($ShowRoom->state == 1)
                <input data-toggle="toggle" data-id="{{ $ShowRoom->id }}" type="checkbox">
            @elseif($ShowRoom->state == 2)
                <input data-toggle="toggle" data-id="{{ $ShowRoom->id }}" type="checkbox" checked>
            @endIf
        </td>
        <td>
            <a href="{{ route('edit/showroom', $ShowRoom->id) }}" class="btn btn-info">Edit</a>
            <a data-toggle="modal" data-target="#ModalDelete" data-id="{{ $ShowRoom->id }}" class="btn btn-danger" href="" aria-hidden="true">Delete</a>
        </td>
    </tr>
  @endForeach
</table>
{!! $ShowRooms->render() !!}

@endsection
@include('modals.deletemodalall')
