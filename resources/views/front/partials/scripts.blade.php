<!-- Scripts -->
<script type="text/javascript">
    $(window).load(function() {
        //setTimeout(function () {
            $('#slider').nivoSlider();
        //}, 10000);
    });
    $('.products-menu').click( function () {
        if($('.m1').hasClass('hidden')){
          $('.m1').removeClass('hidden');
        }
        else {
          $('.m1').addClass('hidden');
        }
        $('.m2').addClass('hidden');
    });
    $('.products-menu1').click( function () {
        if($('.m2').hasClass('hidden')){
          $('.m2').removeClass('hidden');
        }
        else {
          $('.m2').addClass('hidden');
        }
        $('.m1').addClass('hidden');
    });
   $('[data-toggle="tooltip"]').tooltip(); 
</script>
<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    });
</script>
  <script src="{{ asset('dist/js/lightbox.js') }}"></script>
  <script src="{{ asset('/front/assets/js/jquery.scrolly.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/ajaxForm.js') }}"></script>
  <script src="{{ asset('/front/assets/js/skel.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/util.js') }}"></script>
  <script src="{{ asset('/front/assets/js/main.js') }}"></script>
  
<script type="text/javascript" src="js/jquery.dropdown.js"></script>
<script type="text/javascript">
    
  $( function() {
    
    $( '#cd-dropdown' ).dropdown( {
      gutter : 5,
      stack : false,
      delay : 100,
      slidingIn : 100
    } );

  });

</script>
<script src="{{ asset('js/ajaxFilter.js') }}"></script>
