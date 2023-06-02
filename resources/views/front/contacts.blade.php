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
                      <a href="aboutCompany.html" class="header__menu__link">О компании</a>
                    </li>

                    <li class="header__menu__item wow">
                      <a href="#!" class="header__menu__link">Сэндвич панели</a>
                      <ul class="header__none__menu">
                        <li>
                          <a href="SandwichProducts.html" class="header__none__link">О продукции</a>
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
                          <a href="SandwichProducts.html" class="header__none__link">О продукции</a>
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
                          <a href="SandwichProducts.html" class="header__none__link">О продукции</a>
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
                          <a href="SandwichProducts.html" class="header__none__link">О продукции</a>
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
                          <a href="SandwichProducts.html" class="header__none__link">О продукции</a>
                        </li>

                        <li>
                          <a href="SandwichPortfolio.html" class="header__none__link">Портфолио</a>
                        </li>
                      </ul>
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
                  <h2 class="products__title__h2">{{ $options->where('key', 'title_' . app()->getLocale())->first()->value }}</h2>
                  <ul class="contacts__address__list">
                    <li>
                      <a class="contacts__address__link">
                        <span>Адрес</span>
                        {{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}
                      </a>
                    </li>

                    <li>
                      <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="contacts__address__link">
                        <span>телефон</span>
                        {{ $options->where('key', 'phone')->first()->value }}
                      </a>
                    </li>

                    <li>
                      <a href="mailto:{{ $options->where('key', 'email')->first()->value }}" class="contacts__address__link">
                        <span>Email</span>
                        {{ $options->where('key', 'email')->first()->value }}
                      </a>
                    </li>
                    
                  </ul>
                  <a href="{{ $options->where('key', 'map')->first()->value }}" class="contacts__link__map" target="{{ $options->where('key', 'map')->first()->value }}">
                    Показать на карте
                    <span><i class="fas fa-map-marker-alt"></i></span>
                  </a>
                </div>
                

                <div class="contacts__item wow">
                  @foreach($offices as $office)
                    
                  <h2 class="products__title__h2">{{ $office->{'title_' . app()->getLocale()} }}</h2>
                  <ul class="contacts__address__list">
                    <li>
                      <a class="contacts__address__link">
                        <span>Адрес</span>
                        {{ $office->{'addres_' . app()->getLocale()} }}
                      </a>
                    </li>

                    <li>
                      <a href="tel:{{ $office->number }}" class="contacts__address__link">
                        <span>телефон</span>
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
                        <span>телефон</span>
                        {{ $office->second_number }}
                      </a>
                    </li>

                    <li>
                      <a href="mailto:{{ $office->second_gmail }}" class="contacts__address__link">
                        <span>Email</span>
                        {{ $office->second_gmail }}
                      </a>
                    </li>
                  </ul>
                  <a href="{{ $office->map }}!#" class="contacts__link__map" target="{{ $office->map }}">
                    Показать на карте
                    <span><i class="fas fa-map-marker-alt"></i></span>
                  </a>
                  @endforeach

                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="products__item__cart">
          <section
            class="products__cart__fons"
            style="background-image: url({{ asset('front/foto/contacts.png') }})"
          ></section>

          @include('alert')
          <section class="products__list__scrull">
            <section class="container_in">
              <div class="contacts__cart">
                <h2 class="products__title__h2">Обратная связь</h2>

                <form action="{{ route('yourSave') }}" class="contacts__form" method="POST">
                  <input type="text" name="fullname" class="contacts__input wow fadeInLeft" placeholder="ФИО" required/>
                  <input type="tel" name="phone" class="contacts__input wow fadeInRight" placeholder="Телефон" required/>
                  <textarea
                    class="contacts__textarea wow fadeInLeft"
                    placeholder="Комментарий"
                    name="comment" required
                  ></textarea>
                  <button class="contacts__button wow fadeInRight">
                    Отправить
                    <span><i class="fas fa-angle-double-right"></i></span>
                  </button>
                </form>
              </div>
            </section>
          </section>

          <section class="container_in">
            <section class="products__footer">
              <div class="footer__list">
                <a href="tel:97 442 27 26" class="footer__contacts__link">
                  <span><i class="fas fa-phone"></i></span>
                  <section>
                    <p>97</p>
                    442 27 26
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