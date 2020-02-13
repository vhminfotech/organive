<!-- jQuery 3 -->
<script src="{{asset('public/backend/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>

<!-- popper -->
<script src="{{asset('public/backend/assets/vendor_components/popper/dist/popper.min.js')}}"></script>

<!-- Bootstrap 4.1.3-->
<script src="{{asset('public/backend/assets/vendor_components/bootstrap/js/bootstrap.js')}}"></script>	

<!-- ChartJS -->
<script src="{{asset('public/backend/assets/vendor_components/chart-js/chart.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('public/backend/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js')}}"></script>

<!-- jvectormap -->
<script src="{{asset('public/backend/assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>	
<script src="{{asset('public/backend/assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>	

<!-- Slimscroll -->
<script src="{{asset('public/backend/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('public/backend/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset('public/backend/js/template.js')}}"></script>

<!-- Minimal-art Admin for demo purposes -->
<script src="{{asset('public/backend/js/demo.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/backend/js/toastr.min.js')}}"></script>
<script src="{{asset('public/backend/js/comman_function.js')}}"></script>
<script src="{{asset('public/backend/js/ajaxfileupload.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.form.min.js')}}"></script>

@if (!empty($pluginjs)) 
@foreach ($pluginjs as $value) 
<script src="{{ asset('public/backend/assets/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif

@if (!empty($js)) 
@foreach ($js as $value) 
<script src="{{ asset('public/backend/js/'.$value) }}" type="text/javascript"></script>
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
