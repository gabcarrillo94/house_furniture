@extends('app')
@section('htmlheader_title')
    show items
@endsection
@section('contentheader_title')
    Items 
@endsection
@section('main-content')
<div class="hidden message-status"></div>
<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Photo of item</th>
    <th>state</th>
    <th>Actions</th>
  </tr>
  @foreach($Items as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td><img src="{{ asset('uploads/' . $item->ubication) }}" alt="..." class="img-responsive" style="width:100px; height: 60px; "></td>
        <td>
            @if($item->state == 1)
                <input data-toggle="toggle" data-id="{{ $item->id }}" type="checkbox">
            @elseif($item->state == 2)
                <input data-toggle="toggle" data-id="{{ $item->id }}" type="checkbox" checked>
            @endIf
        </td>
        <td>
            <a href="{{ route('edit/item', $item->id) }}" class="btn btn-info">Edit</a>
            <a data-toggle="modal" data-target="#ModalDelete" data-id="{{ $item->id }}" class="btn btn-danger" href="" aria-hidden="true">Delete</a>
        </td>
    </tr>
  @endForeach
</table>
{!! $Items->render() !!}
@endsection
@include('modals.deletemodalall')
