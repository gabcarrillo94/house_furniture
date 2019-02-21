<style>
.foot {
    position: initial;
}

.inner {
    margin-top: .5%;
    margin-bottom: -.5%;
}
</style>
<section class="foot">
  <footer id="footer">
    <div class="inner">
    	<a href="{{ route('/') }}" class="logo"><img src="{{ asset('/front/images/logo-luxluk.png') }}"></a>
    </div>
    
    <div style="padding-top: 1%;">
        <ul class="actions">
	<li><span class="icon fa-phone"></span> {{ $Company->numberPhone }}</li>
	<li><span class="icon fa-envelope"></span> <a href="#"> {{ $Company->mainEmail }}</a></li>
	<li><span class="icon fa-map-marker"></span> {{ $Company->direction }}</li>
	</ul>
    </div>

    <div class="copyright">
    	&copy; Copyrights LuxLuk Design. Development by: <a href="https://herdzdesign.com" target="_blank">Herdz Design</a>
    </div>
  </footer>
</section>
