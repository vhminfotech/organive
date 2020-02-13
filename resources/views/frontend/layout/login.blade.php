<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.include.header')
    </head>

    <body class="animsition">
        
        @include('frontend.login_include.body_header') 

        @yield('content')

        @include('frontend.login_include.body_footer')

        @include('frontend.include.footer')

    </body>
</html>