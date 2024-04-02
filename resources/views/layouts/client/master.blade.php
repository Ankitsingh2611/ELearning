<!doctype html>
<html lang="en">
    <head>
    @include('layouts.client.head')
    <title>@yield('title')</title>

    @yield('custom_styles')
    </head>

    <body id="top">

        <main>

            @include('layouts.client.navbar')


            @yield( 'content' )
        </main>

        @include('layouts.client.footer')


       @include('layouts.client.scripts')

        @yield('custom_scripts')

    </body>
</html>
