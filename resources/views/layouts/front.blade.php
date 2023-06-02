<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/foto/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/foto/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/foto/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('front/foto/favicon/site.webmanifest') }}" />
    <link rel="mask-icon" href="{{ asset('front/foto/favicon/safari-pinned-tab.svg') }}" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#000000" />
    <meta name="theme-color" content="#000000" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/fancybox-main.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}" />
    <title>Mirankul</title>
  </head>

  <body>
    <!-- header start -->

    @yield('content')

  <!-- footer start -->

  <footer>
    <div class="footer_in">
      <section class="container">
        <div class="footer_in__cart"></div>
      </section>
    </div>
  </footer>

  <!-- footer end -->

  <script src="{{ asset('front/js/jquery-3.6.1.min.js') }}"></script>
  <script src="{{ asset('front/js/wow.min.js') }}"></script>
  <script src="{{ asset('front/js/index.js') }}"></script>
  <script src="{{ asset('front/js/loading.js') }}"></script>
  <script src="{{ asset('front/js/fancyapps-ui.js') }}"></script>
  <script src="{{ asset('front/js/fancybox_main.js') }}"></script>
  <script src="{{ asset('front/js/materialize.min.js') }}"></script>
  <script src="{{ asset('front/js/slick.min.js') }}"></script>
  <script src="{{ asset('front/js/owl.carousel.js') }}"></script>
  <script src="{{ asset('front/js/slic.js') }}"></script>
  <script> new WOW().init(); </script>
</body>
</html>


  