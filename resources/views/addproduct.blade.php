@extends('app')

@section('htmlheader_title')
    add products
@endsection
@section('contentheader_title')
    Add Product 
@endsection
@section('script_tinymce')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea', toolbar: "undo redo | styleselect fontselect fontsizeselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent", plugins: "textcolor" });</script>
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @if(session()->has('messageError'))
          <div class="alert alert-danger"> {{ session('messageError') }}</div>
      @endif
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">Add Product</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'add/product', 'method' => 'POST', 'files' => true]) !!}
              {!! Form::token() !!}
              <div class="form-group">
                {!! Form::label('name', 'Product name', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('name') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('code', 'Product code', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('code') !!}
              </div>
              <br>
			  <div class="form-group">
                {!! Form::label('price', 'Product price', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('price') !!}
              </div>
              <br>
			  <div class="form-group">
                {!! Form::label('percent', 'Discount %', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('percent') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('category', 'Product category', ['class' => 'form-control']) !!}
                <br>
                {!! Form::select('category', $arrayCategories, null, ['placeholder' => 'Select a category for your product']); !!}
              </div>
              <br>
			  <div class="form-group" style="display: flex;">
				<div style="width: 49%;text-align: center;">
					{!! Form::label('inStock', 'Product In Stock', ['class' => 'form-control']) !!}
					<br>
					<select multiple="multiple" name="inStock[]" id="inStock">
						@foreach($colors as $color)
							<option value="{{$color->id}}">
									{{$color->name}}
							</option>
						@endforeach
					</select>
				</div>
				<div style="width: 49%;text-align: center;">
					{!! Form::label('soldOut', 'Product Sold Out', ['class' => 'form-control']) !!}
					<br>
					<select multiple="multiple" name="soldOut[]" id="soldOut">
						@foreach($colors as $color)
							<option value="{{$color->id}}">
									{{$color->name}}
							</option>
						@endforeach
					</select>
				</div>
              </div>
			  <br>
              <div class="form-group">
                {!! Form::label('description', 'Write a full description of your product', ['class' => 'form-control']) !!}
                <br>
                {!! Form::textarea('description') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('mainImage', 'Upload product image', ['class' => 'form-control']) !!}
                <br>
                {!! Form::file('mainImage') !!}
              </div>
                <span class="text-danger">The size range allowed for the product image is <strong>700 to 1010px and 400 to 920px</strong> height</span>
              <br><br>
              <div class="form-group">
                {!! Form::submit('Add product', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
