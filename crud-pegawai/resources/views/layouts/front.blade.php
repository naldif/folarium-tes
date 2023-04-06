
<!doctype html>
<html lang="zxx">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @stack('before-style')

        @include('includes.front.style')

        @stack('after-style')

		<!-- Title -->
		<title>Hacbu - Handyman Services HTML Template</title>
    </head>

    <body>

        @include('component.front.preloader')

		@include('includes.front.nav')

		@yield('content')

        @include('component.front.gotop')

        @include('includes.front.footer')

        @include('component.front.copyright')

        @stack('before-script')

        @include('includes.front.script')

        @stack('after-script')
    </body>
</html>
