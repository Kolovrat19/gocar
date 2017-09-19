<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">--}}
    <link type="text/css" href="{{ asset('css/bulma.css') }}" rel="stylesheet">

    @stack('css')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

   <div id="app">


        @yield('main')

        {{-- Footer --}}
        {{--<footer class="footer">--}}
            {{--<div class="container">--}}
                {{--<div class="has-text-centered">--}}
                    {{--<p>--}}
                        {{--<strong>Bulma</strong> by <a href="http://jgthms.com">Jeremy Thomas</a>. The source code is licensed--}}
                        {{--<a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content--}}
                        {{--is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>.--}}
                    {{--</p>--}}
                    {{--<p>--}}
                        {{--<a class="icon" href="https://github.com/jgthms/bulma">--}}
                            {{--<i class="fa fa-github"></i>--}}
                        {{--</a>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}

    </div>

    <!-- Scripts -->

    <script async type="text/javascript" src="{{ asset('js/bulma.js') }}"></script>
    <script type="text/javascript" src="{{ asset('demo/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('demo/raphael.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('demo/morris.js') }}"></script>
    <script type="text/javascript" src="{{ asset('demo/admin.js') }}"></script>
    @stack('script')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
