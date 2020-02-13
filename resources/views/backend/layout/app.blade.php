<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.include.header')
    </head>

    <body class="hold-transition skin-orange-light sidebar-mini">
        <div class="wrapper">

            @include('backend.include.body_header') 

            @include('backend.include.sidebar')
            <div class="content-wrapper">
                @include('backend.include.breadcrumb')
                
                @yield('content')
            </div>
            @include('backend.include.body_footer')

            @include('backend.include.footer')
        </div>
    </body>
</html>