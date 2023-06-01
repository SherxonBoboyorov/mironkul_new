<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/foto/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/foto/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/foto/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="foto/favicon/site.webmanifest" />
    <link rel="mask-icon" href="foto/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#000000" />
    <meta name="theme-color" content="#000000" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/fancybox-main.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}" />
    <title>ОФИС В ТАШКЕНТЕ</title>
  </head>
  <body>

  <!-- header start -->

  <header>
    <div class="header_in">
        <div class="header_in__list">
            <div class="header_in__item">
                <section class="container_in">
                    <div class="header_in__item__list">

                        <div class="header__logo">
                            <a href="{{ route('/') }}">
                              <picture>
                                <source srcset="{{ asset('front/foto/logo.svg') }}"media="(max-width:1050px)">
                                <img src="{{ asset('front/foto/logoBlick.svg') }}" alt="logoBlick">
                              </picture>
                            </a>
                        </div>

                        <ul class="header__locales">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                               <a rel="alternate"class="header__locales__link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                 {{ $properties['native'] }}
                              </a>
                          </li>
                         @endforeach
                        </ul>

                    </div>
                </section>
            </div>

            <div class="header_in__item">
                <section class="container_in">
                    <div class="header_in__item__list">

                        <ul class="header_in__menu">
                            <li>
                                <a href="{{ route('/') }}" class="header_in__menu__link">Главная</a>
                            </li>

                            <li>
                              <a href="{{ route('contact') }}" class="header_in__menu__link">контакты</a>
                            </li>
                        </ul>

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
                                <a href="{{ route('about') }}" class="header__menu__link">О компании</a>
                              </li>
              
                              <li class="header__menu__item wow">
                                <a href="{{ route('contact') }}" class="header__menu__link">Контакты</a>
                              </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            
        </div>
    </div>
    <section class="sidenav-overlay"></section>
  </header>

  <!-- header end -->


  <!-- Products start -->

  <div class="products"> 
    <div class="products__list">
      <div class="products__list__scrull">
        <section class="container_in">
            <div class="products__item">
                <div class="contacts__list">
                    <div class="contacts__item wow">
                        <h2 class="products__title__h2">ОФИС В ТАШКЕНТЕ</h2>
                        <ul class="contacts__address__list">
                            <li>
                                <a href="#!" class="contacts__address__link">
                                    <span>Адрес</span>
                                    10080, Узбекистан, г. Ташкент, Яккасарайский район, ул. Минглар, 49
                                </a>
                            </li>
    
                            <li>
                                <a href="tel:+998 97 442 27 26" class="contacts__address__link">
                                    <span>телефон</span>
                                    +998 97 442 27 26
                                </a>
                            </li>
    
                            <li>
                                <a href="mailto:temur@mironkul.uz" class="contacts__address__link">
                                    <span>Email</span>
                                    temur@mironkul.uz
                                </a>
                            </li>
                        </ul>
                        <a href="#!" class="contacts__link__map">
                            Показать на карте
                            <span><i class="fas fa-map-marker-alt"></i></span>
                        </a>
                    </div>
    
                    <div class="contacts__item wow">
                        <h2 class="products__title__h2">ОФИС В ТАШКЕНТЕ</h2>
                        <ul class="contacts__address__list">
                            <li>
                                <a href="#!" class="contacts__address__link">
                                    <span>Адрес</span>
                                    10080, Узбекистан, г. Ташкент, Яккасарайский район, ул. Минглар, 49
                                </a>
                            </li>
    
                            <li>
                                <a href="tel:+998 97 442 27 26" class="contacts__address__link">
                                    <span>телефон</span>
                                    +998 97 442 27 26
                                </a>
                            </li>
    
                            <li>
                                <a href="mailto:temur@mironkul.uz" class="contacts__address__link">
                                    <span>Email</span>
                                    temur@mironkul.uz
                                </a>
                            </li>
    
                            <li>
                                <a href="tel:+998 99 311 60 78" class="contacts__address__link">
                                    <span>телефон</span>
                                    +998 99 311 60 78
                                </a>
                            </li>
    
                            <li>
                                <a href="mailto:info@mironkul.uz" class="contacts__address__link">
                                    <span>Email</span>
                                    info@mironkul.uz
                                </a>
                            </li>
                        </ul>
                        <a href="#!" class="contacts__link__map">
                            Показать на карте
                            <span><i class="fas fa-map-marker-alt"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
      </div>  
      
        <div class="products__item__cart">
          <section class="products__cart__fons" style="background-image: url({{ asset('front/foto/contacts.png') }});"></section>

          <section class="products__list__scrull">
            <section class="container_in">
                <div class="contacts__cart">
                    <h2 class="products__title__h2">Обратная связь</h2>
    
                    <form action="#!" class="contacts__form">
                        <input type="text" class="contacts__input wow fadeInLeft" placeholder="ФИО">
                        <input type="tel" class="contacts__input wow fadeInRight" placeholder="Телефон">
                        <textarea class="contacts__textarea wow fadeInLeft" placeholder="Комментарий"></textarea>
                        <button class="contacts__button wow fadeInRight">Отправить <span><i class="fas fa-angle-double-right"></i></span></button>
                    </form>
                </div>
            </section>
          </section>

          <section class="container_in">
            <section class="products__footer">
              <div class="footer__list">
                <a href="tel:97 442 27 26" class="footer__contacts__link">
                  <span><i class="fas fa-phone"></i></span>
                  <section><p>97</p>442 27 26</section>
                </a>
    
                <h4 class="footer__title__h4">
                  © Copyright <span></span> - Web developed by <a href="https://sos.uz/" target="_blank">SOS Group</a>
                </h4>
              </div>
            </section>
          </section>
        </div>
    </div>
  </div>
  
  <!-- Products end -->

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