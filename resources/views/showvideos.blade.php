@extends('app')
@section('htmlheader_title')
    show videos
@endsection
@section('contentheader_title')
    Videos 
@endsection
@section('main-content')
<div class="hidden message-status"></div>
<table class="table table-striped">
  <tr>
    <th>Url</th>
    <th>state</th>
    <th>Actions</th>
  </tr>
  @foreach($Videos as $video)
    <tr>
        <td>{{ $video->url }}</td>
        <td>
            @if($video->state == 1)
                <input data-toggle="toggle" data-id="{{ $video->id }}" type="checkbox">
            @elseif($video->state == 2)
                <input data-toggle="toggle" data-id="{{ $video->id }}" type="checkbox" checked>
            @endIf
        </td>
        <td>
            <a href="{{ route('edit/video', $video->id) }}" class="btn btn-info">Edit</a>
            <a data-toggle="modal" data-target="#ModalDelete" data-id="{{ $video->id }}" class="btn btn-danger" href="" aria-hidden="true">Delete</a>
        </td>
    </tr>
  @endForeach
</table>
{!! $Videos->render() !!}
@endsection
@include('modals.deletemodalall')
