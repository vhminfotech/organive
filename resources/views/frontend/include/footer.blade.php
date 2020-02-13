
<script src="{{asset('public/frontend/js/jquery-3.1.1.min.js')}}"></script>

<!--===============================================================================================-->	
<script src="{{asset('public/frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('public/frontend/js/revo-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('public/frontend/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/parallax100/parallax100.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/lightbox2/js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/sweetalert/sweetalert.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<!--===============================================================================================-->

<script src="{{asset('public/frontend/js/main.js')}}"></script>

<script src="{{asset('public/frontend/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/frontend/js/toastr.min.js')}}"></script>
<script src="{{asset('public/frontend/js/comman_function.js')}}"></script>
<script src="{{asset('public/frontend/js/ajaxfileupload.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.form.min.js')}}"></script>




@if (!empty($pluginjs)) 
@foreach ($pluginjs as $value) 
<script src="{{ asset('public/plugins/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif

@if (!empty($js)) 
@foreach ($js as $value) 
<script src="{{ asset('public/frontend/js/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif

<script>
jQuery(document).ready(function () {

    @if (!empty($funinit))
            @foreach ($funinit as $value)

    {{$value}}

    @endforeach
            @endif
});
</script>
