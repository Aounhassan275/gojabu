<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- TITLE YIELD START -->
        @yield('title')
    <!-- TITLE YIELD END -->
	<!---------- CSS START ---------->
        <link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="">
        <link href="{{asset('assets/css/classic.css')}}" rel="stylesheet">
        <!-- CSS YIELD START -->
            @yield('css')
        <!-- CSS YIELD END -->
        @livewireStyles
	<!---------- CSS END ---------->
</head>

<body>
	<div class="wrapper">
        {{-- Sidebar Code Start --}}
        @include('layout.partials.sidebar')
        {{-- Sidebar Code End --}}
		<div class="main">
            {{-- Header Code Start --}}
            @include('layout.partials.header')
            {{-- Header Code End --}}
			<main class="content">
				<div class="container-fluid p-0">
                    {{-- Content Yield Start --}}
                        @yield('content')
                    {{-- Content Yield End --}}
				</div>
			</main>
                {{-- Footer Code Start --}}
                @include('layout.partials.footer')
                {{-- Footer Code End --}}
        </div>
	</div>
    <!-- Javascript START -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <!-- Javascript Yield START -->
            @yield('scripts')
        <!-- Javascript Yield END -->
        @livewireScripts
    <!-- Javascript END -->
</body>

</html>