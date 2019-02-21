@extends('app')

@section('htmlheader_title')
    Edit products {{ $Product->id }}
@endsection

@section('script_tinymce')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea', toolbar: "undo redo | styleselect fontselect fontsizeselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent", plugins: "textcolor" });</script>
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @include('errors.validate')
			<div class="panel panel-default">
				<div class="panel-heading">Edit Product {{ $Product->id }}</div>
				<div class="panel-body">
          {!! Form::open(['route' => 'modified/product', 'method' => 'PUT', 'files' => true]) !!}
              {!! Form::token() !!}
              {!! Form::text('idProduct', $Product->id ,['class' => 'hidden']) !!}
              <div class="form-group">
                {!! Form::label('name', 'Edit product name' , ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('name', $Product->name) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('code', 'Edit product code', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('code', $Product->code) !!}
              </div>
              <br>
			  <div class="form-group">
                {!! Form::label('price', 'Product price', ['class' => 'form-control']) !!}
                <br>
				{!! Form::text('price', $Product->price) !!}
              </div>
              <br>
			  <div class="form-group">
                {!! Form::label('percent', 'Discount %', ['class' => 'form-control']) !!}
                <br>
                {!! Form::text('percent', $Product->percent) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('category', 'Product category', ['class' => 'form-control']) !!}
                <br>
                {!! Form::select('category', $arrayCategories, $Product->category); !!} 
              </div>
              <br>
			  <div class="form-group" style="display: flex;">
				<div style="width: 49%;text-align: center;">
					{!! Form::label('inStock', 'Product In Stock', ['class' => 'form-control']) !!}
					<br>
					<select multiple="multiple" name="inStock[]" id="inStock">
						@foreach($Colors as $color)
							{{ $inStockBand = '' }}
							@if(!is_null($ColorsInStock) && $ColorsInStock!='')
								@foreach($ColorsInStock as $colorStock)
									@if($color->id == $colorStock)
										{{ $inStockBand = 'selected'}}
									@endif
								@endforeach
							@endif
							<option value="{{$color->id}}" {{$inStockBand}}>
									{{$color->name}}
							</option>
						@endforeach
					</select>
				</div>
				<div style="width: 49%;text-align: center;">
					{!! Form::label('soldOut', 'Product Sold Out', ['class' => 'form-control']) !!}
					<br>
					<select multiple="multiple" name="soldOut[]" id="soldOut">
						@foreach($Colors as $color)
							{{ $soldOutBand = '' }}
							@if(!is_null($ColorsSoldOut) && $ColorsSoldOut!='')
								@foreach($ColorsSoldOut as $colorSold)
									@if($color->id == $colorSold)
										{{ $soldOutBand = 'selected'}}
									@endif
								@endforeach
							@endif
							<option value="{{$color->id}}" {{$soldOutBand}}>
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
                {!! Form::textarea('description', $Product->description) !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::label('mainImage', 'Upload product image', ['class' => 'form-control']) !!}
                <img src="{{ asset('uploads/products') . $Product->mainImage }}" alt="..." class="img-responsive" style="width=100p; height:60px">
                <br>
                {!! Form::file('mainImage') !!}
              </div>
              <br>
              <div class="form-group">
                {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
              </div>

          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
