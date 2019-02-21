<!-- Header -->
<header id="header">
	<nav class="right">
		<a class="active" href="{{route('/')}}">HOME</a>
              <a href="{{route('show/aboutus')}}">ABOUT US</a>
              <a href="{{route('show/items')}}">SHOWROOM</a>
              <a href="#" class="products-menu">PRODUCTS <i class="caret"></i></a>
              <div class="submenu hidden m1">
              		@foreach($Categories as $category)
              			<?php 
              				$id_category = str_replace(' ', '', $category->category);
              			?>
          				<a href="{{ url('products/category', $id_category) }}">{{ $category->category }}</a>
              		@endforeach	
              </div>
              <a href="#" class="products-menu1">SALE <i class="caret"></i></a>
              <div class="submenu hidden m2">
              		@foreach($Categories as $category)
              			<?php 
              				$id_category = str_replace(' ', '', $category->category);
              			?>
          				<a href="{{ url('sales/category', $id_category) }}">{{ $category->category }}</a>
              		@endforeach	
              </div>
              <a href="{{route('show/portfolio')}}">PORTFOLIO</a>
              <a href="{{route('show/contact')}}">CONTACT US</a>
	</nav>
</header>
