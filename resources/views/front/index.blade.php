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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/fancybox-main.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}" />

    {!! Meta::toHtml() !!}
  </head>

  <body class="homepage-body">
    <!-- loading start -->

    <div id="loading">
      <div id="preloader" class="start-animation loaded hidden" style="height: 1594px">
        <div class="loading__img wow fadeInLeft">
            <img src="{{ asset('front/foto/icons/loading.svg') }}" alt="" />
        </div>
        <div class="loading__text wow fadeInRight">
            <span>MIRANKUL</span><span>GROUP</span>
        </div>
      </div>
    </div>

    <!-- loading end -->

    <div class="header-and-main-content homepage-main-content">
      <!-- header start -->
      <header>
        <div class="header">
          <div class="container">
            <div class="header__cart">
              <div class="header__list">
                <ul class="header__locales">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <li>
                    <a rel="alternate"class="header__locales__link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                      {{ $properties['native'] }}
                    </a>
                  </li>
                  @endforeach
                </ul>

                <div class="header__logo">
                  <a href="{{ route('/') }}">
                    <img src="{{ asset('front/foto/logo.svg') }}" alt="logo" />
                  </a>
                </div>

                <button class="header__burger__menu">
                  <i class="fas fa-bars"></i>
                </button>

                <div class="header__menu">
                  <ul class="header__locales">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                      <a rel="alternate"class="header__locales__link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                  <button class="header__menu__none">
                    <i class="fas fa-times"></i>
                  </button>

                  <ul class="header__menu__list">
                    <li class="header__menu__item wow">
                      <a href="{{ route('about') }}" class="header__menu__link">@lang('main.aboutcompany')</a>
                    </li>

                    <li class="header__menu__item wow">
                      <a href="#!" class="header__menu__link">@lang('main.sandwich_panels')</a>
                      <ul class="header__none__menu">
                        <li>
                          <a href="{{ route('products') }}" class="header__none__link">@lang('main.aboutproducts')</a>
                        </li>

                        <li>
                          <a href="{{ route('portfolios') }}" class="header__none__link">@lang('main.portfolio')</a>
                        </li>
                      </ul>
                    </li>

                    <li class="header__menu__item wow">
                      <a href="#!" class="header__menu__link">@lang('main.metalstructures')</a>
                      <ul class="header__none__menu">
                        <li>
                          <a href="{{ route('products1') }}" class="header__none__link">@lang('main.aboutproducts')</a>
                        </li>

                        <li>
                          <a href="{{ route('portfolios1') }}" class="header__none__link">@lang('main.portfolio')</a>
                        </li>
                      </ul>
                    </li>

                    <li class="header__menu__item wow">
                      <a href="#!" class="header__menu__link">@lang('main.kislovodsk')</a>
                      <ul class="header__none__menu">
                        <li>
                          <a href="{{ route('products2') }}" class="header__none__link">@lang('main.aboutproducts')</a>
                        </li>

                        <li>
                          <a href="{{ route('portfolios2') }}" class="header__none__link">@lang('main.portfolio')</a>
                        </li>
                      </ul>
                    </li>

                    <li class="header__menu__item wow">
                      <a href="#!" class="header__menu__link">@lang('main.cable_trays')</a>
                      <ul class="header__none__menu">
                        <li>
                          <a href="{{ route('products3') }}" class="header__none__link">@lang('main.aboutproducts')</a>
                        </li>

                        <li>
                          <a href="{{ route('portfolios3') }}" class="header__none__link">@lang('main.portfolio')</a>
                        </li>
                      </ul>
                    </li>

                    <li class="header__menu__item wow">
                      <a href="#!" class="header__menu__link">@lang('main.ventilation_system')</a>
                      <ul class="header__none__menu">
                        <li>
                          <a href="{{ route('products4') }}" class="header__none__link">@lang('main.aboutproducts')</a>
                        </li>

                        <li>
                          <a href="{{ route('portfolios4') }}" class="header__none__link">@lang('main.portfolio')</a>
                        </li>
                      </ul>
                    </li>


                    <li class="header__menu__item wow">
                      <a href="{{ route('contact') }}" class="header__menu__link">@lang('main.contacts')</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="sidenav-overlay"></div>
      </header>
      <!-- header end -->

      <!-- slider start -->
      <div class="slider">
        <div class="container">
          <div class="slider__bg">
            <div class="slider__bg__item active" style="background-image: url('{{ asset('front/foto/slide.png') }}')"></div>
            <div class="slider__bg__item" style="background-image: url('{{ asset('front/foto/slide_2.png') }}')"></div>
            <div class="slider__bg__item" style="background-image: url('{{ asset('front/foto/slide_3.png') }}')"></div>
            <div class="slider__bg__item" style="background-image: url('{{ asset('front/foto/slide_4.png') }}')"></div>
            <div class="slider__bg__item" style="background-image: url('{{ asset('front/foto/slide_5.png') }}')"></div>
          </div>

          <div class="slider__menu">
            <div class="slider__menu__item">
              <h3>@lang('main.sandwich_panels')</h3>
              <p>Sandwich panels</p>
            </div>

            <div class="slider__menu__item">
              <h3>@lang('main.metalstructures')</h3>
              <p>Stroy service</p>
            </div>

            <div class="slider__menu__item">
              <h3>@lang('main.kislovodsk')</h3>
              <p>Space frame</p>
            </div>

            <div class="slider__menu__item">
              <h3>@lang('main.cable_trays')</h3>
              <p>Cable trays</p>
            </div>

            <div class="slider__menu__item">
              <h3>@lang('main.ventilation_system')</h3>
              <p>Vents</p>
            </div>
          </div>

          <ul class="slider__link__list">
            <li>
              <a href="{{ route('products') }}">
                <img src="{{ asset('front/foto/icons/icons_1.svg') }}" alt="icons" />
                @lang('main.aboutproducts')
              </a>
            </li>

            <li>
              <a href="{{ route('portfolios') }}">
                <img src="{{ asset('front/foto/icons/icons_2.svg') }}" alt="icons" />
                @lang('main.portfolio')
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- slider end -->
    </div>

    <!-- footer start -->

    <footer>
      <div class="footer">
        <section class="container">
          <div class="footer__cart">
            <div class="footer__list">
              <ul class="footer__menu__icons">
                <li>
                  <a href="{{ $options->where('key', 'instagram')->first()->value }}" class="footer__link__icons"><i class="fab fa-instagram"></i></a>
                </li>

                <li>
                  <a href="{{ $options->where('key', 'facebook')->first()->value }}" class="footer__link__icons"><i class="fab fa-facebook-f"></i></a>
                </li>

                <li>
                  <a href="{{ $options->where('key', 'telegram')->first()->value }}" class="footer__link__icons"><i class="fab fa-telegram-plane"></i></a>
                </li>
              </ul>

              <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="footer__contacts__link">
                <span><i class="fas fa-phone"></i></span>
                <section>
                  <p>{{ $options->where('key', 'phone')->first()->value }}</p>

                </section>
              </a>

              <h4 class="footer__title__h4">
                © Copyright <span></span> - Web developed by
                <a href="https://sos.uz/" target="_blank">SOS Group</a>
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
