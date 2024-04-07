<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.partials.registerhead')
    </head>
    <body>
        @yield('content')
        @include('layouts.partials.footer')
        @include('layouts.partials.loginscript')
    </body>
</html>


