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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/fancybox-main.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}" />
    <title>Mirankul</title>
  </head>
  <body>
  
  <!-- loading start -->

  <section id="loading">
    <div id="preloader" class="start-animation loaded hidden" style="height: 1594px;">
      <div class="loading__img wow fadeInLeft">
        <img src="{{ asset('front/foto/icons/loading.svg') }}" alt="">
      </div>
      <section class="loading__list__img">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 800 120" class="icons1 svg-1">
          <defs>
          </defs>
          <text id="MIRONKUL" data-name="M I R O N K U L" class="preloader-1" x="402" y="96">
              <tspan x="402">M
                  <tspan class="preloader-2"></tspan>
                  I
                  <tspan class="preloader-2"></tspan>
                  R
                  <tspan class="preloader-2"></tspan>
                  O
                  <tspan class="preloader-2"></tspan>
                  N
                  <tspan class="preloader-2"></tspan>
                  K
                  <tspan class="preloader-2"></tspan>
                  U
                  <tspan class="preloader-2"></tspan>
                  L
          </tspan></text>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 800 100" class="icons2 svg-2">
          <text id="GROUP" data-name="G R O U P" class="preloader-3" x="399" y="81">
              <tspan x="390">G
                  <tspan class="preloader-4"></tspan>
                  R
                  <tspan class="preloader-4"></tspan>
                  O
                  <tspan class="preloader-4"></tspan>
                  U
                  <tspan class="preloader-4"></tspan>
                  P
              </tspan>
          </text>
      </svg>
      </section>
    </div>
  </section>

  <!-- loading end -->
  
  <!-- header start -->

  <header>
    <div class="header">
      <section class="container">
        <div class="header__cart">
          <div class="header__list">
            <ul class="header__locales">
              <li>
                <a href="#!" class="header__locales__link active">uz</a>
              </li>

              <li>
                <a href="#!" class="header__locales__link">ru</a>
              </li>

              <li>
                <a href="#!" class="header__locales__link">en </a>
              </li>
            </ul>

            <div class="header__logo">
              <a href="{{ route('/') }}">
                <img src="{{ asset('front/foto/logo.svg') }}" alt="logo">
              </a>
            </div>

            <button class="header__burger__menu">
              <i class="fas fa-bars"></i>
            </button>

            <div class="header__menu">
              <ul class="header__locales">
                <li>
                  <a href="#!" class="header__locales__link active">uz</a>
                </li>
  
                <li>
                  <a href="#!" class="header__locales__link">ru</a>
                </li>
  
                <li>
                  <a href="#!" class="header__locales__link">en </a>
                </li>
              </ul>
              <button class="header__menu__none">
                <i class="fas fa-times"></i>
              </button>
              
              <ul class="header__menu__list">
                <li class="header__menu__item wow">
                  <a href="#!" class="header__menu__link">Сэндвич панели</a>
                  <ul class="header__none__menu">
                    <li>
                      <a href="SandwichProducts.html" class="header__none__link">Продукция</a>
                    </li>

                    <li>
                      <a href="SandwichPortfolio.html" class="header__none__link">Портфолио</a>
                    </li>
                  </ul>
                </li>

                <li class="header__menu__item wow">
                  <a href="#!" class="header__menu__link">Металлоконструкции</a>
                  <ul class="header__none__menu">
                    <li>
                      <a href="SandwichProducts.html" class="header__none__link">Продукция</a>
                    </li>

                    <li>
                      <a href="SandwichPortfolio.html" class="header__none__link">Портфолио</a>
                    </li>
                  </ul>
                </li>

                <li class="header__menu__item wow">
                  <a href="#!" class="header__menu__link">Кисловодск</a>
                  <ul class="header__none__menu">
                    <li>
                      <a href="SandwichProducts.html" class="header__none__link">Продукция</a>
                    </li>

                    <li>
                      <a href="SandwichPortfolio.html" class="header__none__link">Портфолио</a>
                    </li>
                  </ul>
                </li>

                <li class="header__menu__item wow">
                  <a href="#!" class="header__menu__link">Кабельные лотки</a>
                  <ul class="header__none__menu">
                    <li>
                      <a href="SandwichProducts.html" class="header__none__link">Продукция</a>
                    </li>

                    <li>
                      <a href="SandwichPortfolio.html" class="header__none__link">Портфолио</a>
                    </li>
                  </ul>
                </li>

                <li class="header__menu__item wow">
                  <a href="#!" class="header__menu__link">Система вентиляции</a>
                  <ul class="header__none__menu">
                    <li>
                      <a href="SandwichProducts.html" class="header__none__link">Продукция</a>
                    </li>

                    <li>
                      <a href="SandwichPortfolio.html" class="header__none__link">Портфолио</a>
                    </li>
                  </ul>
                </li>

                <li class="header__menu__item wow">
                  <a href="aboutCompany.html" class="header__menu__link">О компании</a>
                </li>

                <li class="header__menu__item wow">
                  <a href="contacts.html" class="header__menu__link">Контакты</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="sidenav-overlay"></section>
  </header>

  <!-- header end -->

  @yield('content')

  <!-- footer start -->

   <footer>
    <div class="footer">
      <section class="container">
        <div class="footer__cart">
          <div class="footer__list">
            <ul class="footer__menu__icons">
              <li>
                <a href="#!" class="footer__link__icons"><i class="fab fa-instagram"></i></a>
              </li>

              <li>
                <a href="#!" class="footer__link__icons"><i class="fab fa-facebook-f"></i></a>
              </li>

              <li>
                <a href="#!" class="footer__link__icons"><i class="fab fa-telegram-plane"></i></a>
              </li>
            </ul>

            <a href="tel:97 442 27 26" class="footer__contacts__link">
              <span><i class="fas fa-phone"></i></span>
              <section><p>97</p>442 27 26</section>
            </a>

            <h4 class="footer__title__h4">
              © Copyright <span></span> - Web developed by <a href="https://sos.uz/" target="_blank">SOS Group</a>
            </h4>
          </div>
        </div>
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