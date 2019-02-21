@extends('app')

@section('htmlheader_title')
    show products
@endsection
@section('contentheader_title')
    Products
@endsection

@section('main-content')
<div class="hidden message-status"></div>
<table class="table table-striped">
  <tr>
    <th>Main Image</th>
    <th>Name</th>
    <th>Code</th>
    <th>Price</th>
    <th>Offer Percent</th>
    <th>Category</th>
    <th>Publication Date</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
  @foreach($Products as $product)
    <tr>
        <td><img src="{{ asset('uploads/products') .$product->mainImage  }}" alt="..." class="img-responsive" style="width:100px; height: 60px;"></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->code }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->percent }}</td>
        <td>{{ $product->category }}</td>
        <td>{{ $product->created_at }}</td>
        <td>
          @if($product->state == 1)
              <input data-toggle="toggle" data-id="{{ $product->id }}" type="checkbox">
          @elseif($product->state == 2)
              <input data-toggle="toggle" data-id="{{ $product->id }}" type="checkbox" checked>
          @endIf
        </td>
        <td>
            <a href="{{ route('edit/product', $product->id) }}" class="btn btn-info">Edit</a>
            <a data-toggle="modal" data-target="#ModalDelete" data-id="{{ $product->id }}" class="btn btn-danger" href="" aria-hidden="true">Delete</a>
        </td>
    </tr>
  @endForeach
</table>
{!! $Products->render() !!}
@endsection
@include('modals.deletemodalall')
