<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('front.partials.htmlheader')

<body>
  @include('front.partials.mainheader')
      <!-- Main content -->
      <section class="content">
          <!-- Your Page Content Here -->
          @yield('main-content')
      </section><!-- /.content -->
      <!-- Three -->
			<div class="clear"></div>
  @include('front.partials.footer')
  @include('front.partials.scripts')
</body>

</html>
