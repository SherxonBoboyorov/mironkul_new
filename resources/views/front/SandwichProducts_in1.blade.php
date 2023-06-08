@extends('layouts.front')

@section('content')

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
                      <source srcset="{{ asset('front/foto/logo.svg') }}" media="(max-width:1050px)" />
                      <img src="{{ asset('front/foto/logoBlick.svg') }}" alt="logoBlick" />
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
                    <a href="{{ route('products') }}" class="header_in__menu__link">@lang('main.aboutproducts')</a>
                  </li>

                  <li>
                    <a class="header_in__menu__link">{{ $metal->{'title_' . app()->getLocale()} }}  {{ $metal->{'info_' . app()->getLocale()} }}</a>
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
                      <a href="{{ route('about') }}" class="header__menu__link">@lang('main.aboutcompany')</a>
                    </li>

                        
                  <li class="header__menu__item wow">
                    <a href="#!" class="header__menu__link">Сэндвич панели</a>
                    <ul class="header__none__menu">
                      <li>
                        <a href="{{ route('products') }}" class="header__none__link">О О продукции</a>
                      </li>

                      <li>
                        <a href="{{ route('portfolios') }}" class="header__none__link">Портфолио</a>
                      </li>
                    </ul>
                  </li>

                  <li class="header__menu__item wow">
                    <a href="#!" class="header__menu__link">Металлоконструкции</a>
                    <ul class="header__none__menu">
                      <li>
                        <a href="{{ route('products1') }}" class="header__none__link">О О продукции</a>
                      </li>

                      <li>
                        <a href="{{ route('portfolios1') }}" class="header__none__link">Портфолио</a>
                      </li>
                    </ul>
                  </li>

                  <li class="header__menu__item wow">
                    <a href="#!" class="header__menu__link">Кисловодск</a>
                    <ul class="header__none__menu">
                      <li>
                        <a href="{{ route('products') }}" class="header__none__link">О О продукции</a>
                      </li>

                      <li>
                        <a href="{{ route('portfolios') }}" class="header__none__link">Портфолио</a>
                      </li>
                    </ul>
                  </li>

                  <li class="header__menu__item wow">
                    <a href="#!" class="header__menu__link">Кабельные лотки</a>
                    <ul class="header__none__menu">
                      <li>
                        <a href="{{ route('products') }}" class="header__none__link">О О продукции</a>
                      </li>

                      <li>
                        <a href="{{ route('portfolios') }}" class="header__none__link">Портфолио</a>
                      </li>
                    </ul>
                  </li>

                  <li class="header__menu__item wow">
                    <a href="#!" class="header__menu__link">Система вентиляции</a>
                    <ul class="header__none__menu">
                      <li>
                        <a href="{{ route('products') }}" class="header__none__link">О О продукции</a>
                      </li>

                      <li>
                        <a href="{{ route('portfolios') }}" class="header__none__link">Портфолио</a>
                      </li>
                    </ul>
                  </li>


                    <li class="header__menu__item wow">
                      <a href="{{ route('contact') }}" class="header__menu__link">@lang('main.contacts')</a>
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
            <div class="products__item clearfix">
              <div class="products__item__img">
                <img src="{{ asset($metal->image) }}" alt="products" />
              </div>

              <section>
                <h2 class="products__title__h2">{{ $metal->{'title_' . app()->getLocale()} }}</h2>
                <h4 class="products__iten__title">{{ $metal->{'info_' . app()->getLocale()} }}</h4>
                <div class="products__item__text">
                  <p>
                    {!! $metal->{'description_' . app()->getLocale()} !!}
                  </p>
                </div>
              </section>
            </div>
          </section>

          <div class="products__foto__video">
            <section class="container_in">
              <div class="products__foto__video__list">
                <div class="products__item__video wow active" data-item="fotoItem">
                  <div class="products__foto__img">
                    <i class="far fa-images"></i>
                  </div>
                  <h3 class="products__title__foto">@lang('main.photo_materials')</h3>
                </div>

                <div class="products__item__video wow" data-item="videoItem">
                  <div class="products__foto__img">
                    <i class="far fa-play-circle"></i>
                  </div>
                  <h3 class="products__title__foto">@lang('main.video_materials')</h3>
                </div>

                <a href="{{ route('portfolios1') }}" class="products__item__video wow">
                  <div class="products__foto__img">
                    <i class="far fa-images"></i>
                  </div>
                  <h3 class="products__title__foto">@lang('main.portfolio')</h3>
                </a>
              </div>
            </section>
          </div>
          <section class="container_in">
            <div class="fotoVideoMideo"></div>
          </section>
        </div>
        <div class="products__item__cart">
          <div class="products__list__scrull">
            <section class="container_in">
              <section class="products__foto__video__all">
                <div class="products__item__list products__foto active" data-item="fotoItem">
                  @foreach($metalimages as $metalimage)
                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <a href="{{ asset($metalimage->image) }}" data-fancybox="gallery">
                        <div class="products__foto__item__img">
                          <img src="{{ asset($metalimage->image) }}" alt="gallery" />
                          <h4 class="products__foto__eye">
                            <i class="fas fa-eye"></i>
                          </h4>
                        </div>
                      </a>
                    </div>
                  </section>
                  @endforeach
                </div>

                <div class="products__item__list products__foto" data-item="videoItem">
                  @foreach($metalvideos as $metalvideo)
                  
                  <section class="products__item__wowjs wow">
                    <div class="products__video__item">
                      <p class="text-center">
                        <a data-fancybox class="about__item__video" href="{{ $metalvideo->video }}">
                          <section>
                            <h3 class="products__list__title__h3">{{ $metalvideo->{'title_' . app()->getLocale()} }}</h3>
                            <img class="inline" src="{{ asset($metalvideo->image) }}" alt="videoItem" />
                            <!-- play start -->

                            <div class="button__min is-play">
                              <div class="button-outer-circle has-scale-animation"></div>
                              <div
                                class="button-outer-circle has-scale-animation has-delay-short"></div>
                              <div class="button-icon is-play">
                                <img class="about__item__img__play"  alt="All" src="{{ asset('front/foto/icons/pley.svg') }}"/>
                              </div>
                            </div>

                            <!-- play end -->
                          </section>
                        </a>
                      </p>
                    </div>
                  </section>
                  @endforeach
                </div>
              </section>
            </section>
          </div>

          <section class="container_in">
            <section class="products__footer">
              <div class="footer__list">
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
            </section>
          </section>
        </div>
      </div>
    </div>

    <!-- Products end -->

  @endsection