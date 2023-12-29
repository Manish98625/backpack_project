<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ backpack_theme_config('html_direction') }}">

<head>
    @include(backpack_view('inc.head'))

</head>

<body class="{{ backpack_theme_config('classes.body') }}">

    @include(backpack_view('inc.sidebar'))

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">

        @include(backpack_view('inc.main_header'))

        <div class="app-body flex-grow-1 px-2">

            <main class="main">

                @yield('before_breadcrumbs_widgets')

                @includeWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'))

                @yield('after_breadcrumbs_widgets')

                @yield('header')

                <div class="container-fluid animated fadeIn">

                    @yield('before_content_widgets')

                    @yield('content')

                    @yield('after_content_widgets')

                </div>

            </main>

        </div>{{-- ./app-body --}}

        <footer class="{{ backpack_theme_config('classes.footer') }}">
            @include(backpack_view('inc.footer'))
        </footer>
    </div>

    @yield('before_scripts')
    @stack('before_scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include(backpack_view('inc.scripts'))
    @include(backpack_view('inc.theme_scripts'))

    @yield('after_scripts')
    @stack('after_scripts')
</body>

</html>
