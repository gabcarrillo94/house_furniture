@extends('app')
@section('htmlheader_title')
    show banners
@endsection
@section('contentheader_title')
    Banners
@endsection
@section('main-content')
<div class="hidden message-status"></div>
<table class="table table-striped">
  <tr>
    <th>Banner</th>
    <th>Size</th>
    <th>Priority</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
  @foreach($Banners as $banner)
    <tr>
        <td><img src="{{ asset('uploads/banners') . $banner->url }}" alt="..." class="img-responsive" style="width:100px; height: 60px; "></td>
        <td>{{ $banner->dimension }}</td>
        <td>{{ $banner->priority }}</td>
        <td>
            @if($banner->state == 1)
                <input data-toggle="toggle" data-id="{{ $banner->id }}" type="checkbox">
            @elseif($banner->state == 2)
                <input data-toggle="toggle" data-id="{{ $banner->id }}" type="checkbox" checked>
            @endIf
        </td>
        <td>
            <a href="{{ route('edit/banner', $banner->id) }}" class="btn btn-info">Edit</a>
            <a data-toggle="modal" data-target="#ModalDelete" data-id="{{ $banner->id }}" class="btn btn-danger" href="" aria-hidden="true">Delete</a>
        </td>
    </tr>
  @endForeach
</table>
{!! $Banners->render() !!}
@endsection
@include('modals.deletemodalall')
