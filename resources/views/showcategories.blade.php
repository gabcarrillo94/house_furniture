@extends('app')
@section('htmlheader_title')
    show categories
@endsection
@section('main-content')
<div class="hidden message-status"></div>
<table class="table table-striped">
  <tr>
    <th>Name of Category</th>
    <th>Publication Date</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
  @foreach($Categories as $category)
    <tr>
        <td>{{ ucwords($category->category) }}</td>
        <td>{{ $category->created_at }}</td>
        <td>
            @if($category->state == 1)
                <input data-toggle="toggle" data-id="{{ $category->id }}" type="checkbox">
            @elseif($category->state == 2)
                <input data-toggle="toggle" data-id="{{ $category->id }}" type="checkbox" checked>
            @endIf
        </td>
        <td>
            <a href="{{ route('edit/category', $category->id) }}" class="btn btn-info">Edit</a>
            <a data-toggle="modal" data-target="#ModalDelete" data-id="{{ $category->id }}" class="btn btn-danger" href="" aria-hidden="true">Delete</a>
        </td>
    </tr>
  @endForeach
</table>
{!! $Categories->render() !!}
@endsection
@include('modals.deletemodalall')
