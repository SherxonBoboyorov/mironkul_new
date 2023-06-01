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
    <title>О компании</title>
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
                                <a href="{{ route('aboutCompanyPhotos') }}" class="header_in__menu__link">Фото материалы</a>
                            </li>

                            <li>
                                <a class="header_in__menu__link">{{ $photo->{'title_' . app()->getLocale()} }}</a>
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
                              <a href="contacts.html" class="header__menu__link">Контакты</a>
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
          <div class="products__aboutCompany__item">
            <h2 class="products__title__h2">О компании</h2>
          </div>
        </section>

        <div class="products__foto__video products__aboutCompany__menu">
            <section class="container_in">
                <div class="products__aboutCompany__list">
                    <div class="products__item__video wow active">
                        <a href="{{ route('aboutCompanyPhotos') }}">
                            <div class="products__foto__img">
                              <i class="far fa-images"></i>
                            </div>
                            <h3 class="products__title__foto">Фото материалы</h3>
                        </a>
                    </div>

                    <div class="products__item__video wow">
                        <a href="aboutCompanyVideo.html">
                            <div class="products__foto__img">
                              <i class="far fa-play-circle"></i>
                            </div>
                            <h3 class="products__title__foto">Видео материалы</h3>
                        </a>
                    </div>

                    <div class="products__item__video wow">
                        <a href="aboutCompanyPresentation.html">
                            <div class="products__foto__img">
                              <i class="far fa-file-powerpoint"></i>
                            </div>
                            <h3 class="products__title__foto">Презентация</h3>
                        </a>
                    </div>
                </div>
            </section>
        </div>
          
        <section class="container_in">
          <div class="products__item clearfix">
            <div class="products__item__text">
                <p>
                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.
                    At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est
                </p>
            </div>
          </div>
        </section>

        <section class="container_in">
          <div class="fotoVideoMideo"></div>
        </section>
      </div>
      
        <div class="products__item__cart">

          <div class="products__list__scrull">
            <section class="container_in">
                <section class="products__foto__video__all">
                  <div class="products__foto">
                    <div class="fotogalereya_in__list1">
                      @foreach($photos as $photo)
                        <div class="fotogalereya_in__item1">
                            <img src="{{ asset($photo->image) }}" alt="fotogalereya_in">
                        </div>
                      @endforeach
    
                    </div>
    
                    <div class="fotogalereya_in__list2">
                      @foreach($photos as $photo)
                        <div class="fotogalereya_in__item2">
                            <img src="{{ asset($photo->image) }}" alt="fotogalereya_in">
                        </div>
                     @endforeach
                    </div>
                  </div>
              </section>
            </section>
          </div>

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