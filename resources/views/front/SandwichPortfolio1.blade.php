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
                      <a href="#!" class="header_in__menu__link">МЕТАЛЛОКОНСТРУКЦИИ</a>
                    </li>
  
                    <li>
                      <a href="{{ route('products1') }}" class="header_in__menu__link">@lang('main.aboutproducts')</a>
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
                    <a href="#!" class="header__menu__link">Кисловодск</a>
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
                    <a href="#!" class="header__menu__link">Кабельные лотки</a>
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
                    <a href="#!" class="header__menu__link">Система вентиляции</a>
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
              <div class="products__item">
                <h2 class="products__title__h2">@lang('main.portfolio')</h2>
  
                <div class="products__item__list">
                  @foreach($portfoliometals as $portfoliometal)
                    
                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <a href="{{ route('portfolio1', $portfoliometal->{'slug_' . app()->getLocale()}) }}" class="products__portfolio__link">
                        <div class="products__list__img">
                          <img src="{{ asset($portfoliometal->image) }}" alt="products" />
                          <h3 class="products__list__title__h3">{{ $portfoliometal->{'title_' . app()->getLocale()} }}</h3>
                          <h4 class="products__list__title__h4">
                            {!! $portfoliometal->{'description_' . app()->getLocale()} !!}
                          </h4> 
                          <h5 class="products__portfolio__eye">
                            <i class="fas fa-eye"></i>
                          </h5>
                        </div>
                      </a>
                    </div>
                  </section>
                  @endforeach

                </div>
              </div>
            </section>
          </div>
  
          <div class="products__item__cart">
            <section
              class="products__cart__fons"
              style="background-image: url({{ asset('front/foto/fon.png') }})"
            ></section>
            <div class="products__cart__item">
              <section class="container_in">
                <div>
                  <ul class="products__menu">
                    <li class="wow">
                      <a href="{{ route('products1') }}" class="products__menu__link">@lang('main.aboutproducts')</a>
                    </li>
  
                    <li class="wow">
                      <a href="{{ route('portfolios1') }}" class="products__menu__link active">
                        @lang('main.portfolio')
                      </a>
                    </li>
                  </ul>
                </div>
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
