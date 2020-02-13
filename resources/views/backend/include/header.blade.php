<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="{{asset('public/backend/images/favicon.ico')}}">

<title>{{ $title }}</title>

<!-- Bootstrap 4.1.3-->
<link rel="stylesheet" href="{{asset('public/backend/assets/vendor_components/bootstrap/css/bootstrap.css')}}">

<!-- Bootstrap-extend-->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-extend.css')}}">


<link rel="stylesheet" href="{{asset('public/backend/css/toastr.min.css')}}">

<!-- font awesome -->
<link rel="stylesheet" href="{{asset('public/backend/assets/vendor_components/font-awesome/css/font-awesome.css')}}">

<!-- ionicons -->
<link rel="stylesheet" href="{{asset('public/backend/assets/vendor_components/Ionicons/css/ionicons.css')}}">

<!-- theme style -->
<link rel="stylesheet" href="{{asset('public/backend/css/master_style.css')}}">

<!-- Minimal-art Admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('public/backend/css/skins/_all-skins.css')}}">

<!-- jvectormap -->
<link rel="stylesheet" href="{{asset('public/backend/assets/vendor_components/jvectormap/jquery-jvectormap.css')}}">

<!-- Morris charts -->
<link rel="stylesheet" href="{{asset('public/backend/assets/vendor_components/morris.js/morris.css')}}">


<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<script>var baseurl = "{{ asset('/') }}";</script>
<!-- END HEAD -->

@if (!empty($css)) 
@foreach ($css as $value) 
@if(!empty($value))

<link rel="stylesheet" href="{{ asset('public/backend/css/'.$value) }}">
@endif
@endforeach
@endif

@if (!empty($plugincss)) 
@foreach ($plugincss as $value) 
@if(!empty($value))

<link rel="stylesheet" href="{{ asset('public/backend/assets/'.$value) }}">
@endif
@endforeach
@endif

<style>
    .has-error{
        border-color: red !important;
    }
    
</style>
