@extends('layouts.front')

@section('content')

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
                    <a href="{{ route('/') }}" class="header_in__menu__link">@lang('main.main')</a>
                  </li>

                  <li>
                    <a class="header_in__menu__link">@lang('main.contacts')</a>
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
                  <h2 class="products__title__h2">{{ $options->where('key', 'title_' . app()->getLocale())->first()->value }}</h2>
                  <ul class="contacts__address__list">
                    <li>
                      <a class="contacts__address__link">
                        <span>@lang('main.address')</span>
                        {{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}
                      </a>
                    </li>

                    <li>
                      <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="contacts__address__link">
                        <span>@lang('main.phone')</span>
                        {{ $options->where('key', 'phone')->first()->value }}
                      </a>
                    </li>

                    <li>
                      <a href="mailto:{{ $options->where('key', 'email')->first()->value }}" class="contacts__address__link">
                        <span>@lang('main.email')</span>
                        {{ $options->where('key', 'email')->first()->value }}
                      </a>
                    </li>
                    
                  </ul>
                  <a href="{{ $options->where('key', 'map')->first()->value }}" class="contacts__link__map" target="{{ $options->where('key', 'map')->first()->value }}">
                    @lang('main.show_on_the_map')
                    <span><i class="fas fa-map-marker-alt"></i></span>
                  </a>
                </div>
                

                <div class="contacts__item wow">
                  @foreach($offices as $office)
                    
                  <h2 class="products__title__h2">{{ $office->{'title_' . app()->getLocale()} }}</h2>
                  <ul class="contacts__address__list">
                    <li>
                      <a class="contacts__address__link">
                        <span>@lang('main.address')</span>
                        {{ $office->{'addres_' . app()->getLocale()} }}
                      </a>
                    </li>

                    <li>
                      <a href="tel:{{ $office->number }}" class="contacts__address__link">
                        <span>@lang('main.phone')</span>
                        {{ $office->number }}
                      </a>
                    </li>

                    <li>
                      <a href="mailto:{{ $office->gmail }}" class="contacts__address__link">
                        <span>Email</span>
                        {{ $office->gmail }}
                      </a>
                    </li>

                    <li>
                      <a href="tel:{{ $office->second_number }}" class="contacts__address__link">
                        <span>@lang('main.phone')</span>
                        {{ $office->second_number }}
                      </a>
                    </li>

                    <li>
                      <a href="mailto:{{ $office->second_gmail }}" class="contacts__address__link">
                        <span>@lang('main.email')</span>
                        {{ $office->second_gmail }}
                      </a>
                    </li>
                  </ul>
                  <a href="{{ $office->map }}!#" class="contacts__link__map" target="{{ $office->map }}">
                   @lang('main.show_on_the_map')
                    <span><i class="fas fa-map-marker-alt"></i></span>
                  </a>
                  @endforeach

                </div>
              </div>
            </div>
          </section>
        </div>

        {{-- <div class="products__item__cart">
          <section class="products__cart__fons"style="background-image: url({{ asset('front/foto/contacts.png') }})" ></section>

          {{-- @include('alert')
          <section class="products__list__scrull">
            <section class="container_in">
              <div class="contacts__cart">
                <h2 class="products__title__h2">@lang('main.feedback')</h2>

                <form action="{{ route('yourSave') }}" class="contacts__form" method="POST">
                  @csrf
                  <input type="text" name="fullname" class="contacts__input wow fadeInLeft" placeholder="ФИО" required/>
                  <input type="tel" name="phone" class="contacts__input wow fadeInRight" placeholder="Телефон" required/>
                  <textarea class="contacts__textarea wow fadeInLeft" placeholder="Комментарий"name="comment" required></textarea>
                  <button class="contacts__button wow fadeInRight">
                    @lang('main.send')
                    <span><i class="fas fa-angle-double-right"></i></span>
                  </button>
                </form>
              </div>
            </section>
          </section> --}}

          {{-- <section class="container_in">
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
        </div> --}} 


        <div class="products__item__cart">
          <section class="products__cart__fons"style="background-image: url({{ asset('front/foto/contacts.png') }})" ></section>


          <section></section>

          <section class="container_in">
            <section class="products__footer">
              <div class="footer__list">
                <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="footer__contacts__link">
                  <span><i class="fas fa-phone"></i></span>
                  <section><p>{{ $options->where('key', 'phone')->first()->value }}</p></section>
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

   @endsection