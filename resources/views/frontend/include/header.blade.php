 

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title }}</title> 
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="{{asset('public/frontend/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/lightbox2/css/lightbox.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/revolution/css/layers.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/revolution/css/navigation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/revolution/css/settings.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/toastr.min.css')}}">
<!--===============================================================================================-->
<script>var baseurl = "{{ asset('/') }}";</script>

<!-- END HEAD -->
<!--#8fae4a-->
@if (!empty($css)) 
@foreach ($css as $value) 
@if(!empty($value))

<link rel="stylesheet" href="{{ asset('public/css/'.$value) }}">
@endif
@endforeach
@endif

@if (!empty($plugincss)) 
@foreach ($plugincss as $value) 
@if(!empty($value))

<link rel="stylesheet" href="{{ asset('public/plugins/'.$value) }}">
@endif
@endforeach
@endif

<style>
    .pagination > li > a
    {
        background-color: white;
        color: #8fae4a;
    }

    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover
    {
        color: #8fae4a !important;
        background-color: #eee;
        border-color: #ddd;
    }

    .pagination > .active > a
    {
        color: white;
        background-color: #8fae4a !important;
        border: solid 1px #8fae4a !important;
    }

    .pagination > .active > a:hover
    {
        background-color: #8fae4a !important; 
        border: solid 1px #8fae4a !important;
    }

    .page-item.active .page-link {
        z-index: 2;
        color: #fff;
        background-color: #8fae4a !important;
        border-color: #8fae4a !important;
    }

</style>