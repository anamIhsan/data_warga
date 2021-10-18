<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Title --}}
        <title>@yield('title')</title>

        {{-- Style --}}
        @include('includes.style')
    
    </head>
    <body class="hold-transition login-page">
        {{-- Content --}}
        @yield('content')

        {{-- Script --}}
        @include('includes.script')
    </body>
</html>
