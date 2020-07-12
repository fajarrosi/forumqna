<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--  Social tags      -->

	<!-- Front CSS -->
<link type="text/css" href="{{ asset('template/dist/front/css/front.css') }}" rel="stylesheet">
<!-- Prism -->
<link type="text/css" href="{{ asset('template/dist/vendor/prismjs/themes/prism.css') }}" rel="stylesheet">	
<!-- Nucleo icons -->
<link rel="stylesheet" href="{{ asset('template/dist/dashboard/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">

<!-- Fontawesome -->
<link type="text/css" href="{{ asset('template/dist/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!-- implement upvote  -->

    <link href="{{ asset('plugins/jquery-upvote/jquery.upvote.css') }}" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  type="text/javascript" src="{{ asset('/js/upvote.js') }}"></script>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <style type="text/css">
        .modal-backdrop {
          z-index: -1;
        }
    </style>
    @stack('css')
</head>
<body>
  @include('layouts.navbar')
    <main>
        <!-- Hero -->
        <section class="section-header pb-9 pb-lg-12 bg-primary text-white">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-12 col-sm-8 col-md-7 col-lg-6 text-center">
                        <img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" class="mb-4" height="150" alt="Logo Larastack">
                        <h1 class="display-4 text-muted mb-5 font-weight-normal">Larastack (Forum Diskusi Tanya Jawab)</h1>

                    </div>
                </div>
            </div>
             <div class="pattern bottom"></div>
        </section>
        <section class="section section-lg pt-0">
<div class="container mt-n7 mt-lg-n13 z-2">
    <div class="row justify-content-center">
         <a class="github-button" href="https://github.com/fajarrosi/forumqna" data-style="mega" data-count-aria-label="# followers on GitHub" aria-label="Follow @fajarrosi on GitHub">Follow @fajarrosi</a>
    </div>
   <div class="row justify-content-center">
        @yield('content')

   </div>
</div>
    </main>

<script src="{{ asset('template/dist/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('template/dist/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/dist/vendor/headroom.js/dist/headroom.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('template/dist/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
<script src="{{ asset('template/dist/vendor/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('template/dist/vendor/jarallax/dist/jarallax.min.js') }}"></script>
<script src="{{ asset('template/dist/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Impact JS -->
<script src="{{ asset('template/dist/front/assets/js/front.js') }}"></script>
@stack('scripts')
</body>
</html>