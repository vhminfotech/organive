<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.include.header')
    </head>

    <body class="animsition">
        
        @include('frontend.include.body_header') 

        @yield('content')

        @include('frontend.include.body_footer')

        @include('frontend.include.footer')

    </body>
</html>