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
                  <a href="index.html">
                    <picture>
                      <source srcset="foto/logo.svg" media="(max-width:1050px)" />
                      <img src="foto/logoBlick.svg" alt="logoBlick" />
                    </picture>
                  </a>
                </div>

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
              </div>
            </section>
          </div>

          <div class="header_in__item">
            <section class="container_in">
              <div class="header_in__item__list">
                <ul class="header_in__menu">
                  <li>
                    <a href="#!" class="header_in__menu__link">Сэндвич панели</a>
                  </li>

                  <li>
                    <a href="SandwichProducts.html" class="header_in__menu__link">О продукции</a>
                  </li>
                </ul>

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
            <div class="products__item">
              <h2 class="products__title__h2">Портфолио</h2>

              <div class="products__item__list">
                <section class="products__item__wowjs wow">
                  <div class="products__list__item">
                    <a href="SandwichPortfolio_in.html" class="products__portfolio__link">
                      <div class="products__list__img">
                        <img src="foto/products_1.png" alt="products" />
                        <h3 class="products__list__title__h3">Сэндвич панели</h3>
                        <h4 class="products__list__title__h4">
                          Сonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                          dolore
                        </h4>
                        <h5 class="products__portfolio__eye">
                          <i class="fas fa-eye"></i>
                        </h5>
                      </div>
                    </a>
                  </div>
                </section>

                <section class="products__item__wowjs wow">
                  <div class="products__list__item">
                    <a href="SandwichPortfolio_in.html" class="products__portfolio__link">
                      <div class="products__list__img">
                        <img src="foto/products_2.png" alt="products" />
                        <h3 class="products__list__title__h3">Сэндвич панели</h3>
                        <h4 class="products__list__title__h4">
                          Сonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                          dolore
                        </h4>
                        <h5 class="products__portfolio__eye">
                          <i class="fas fa-eye"></i>
                        </h5>
                      </div>
                    </a>
                  </div>
                </section>

                <section class="products__item__wowjs wow">
                  <div class="products__list__item">
                    <a href="SandwichPortfolio_in.html" class="products__portfolio__link">
                      <div class="products__list__img">
                        <img src="foto/products_3.png" alt="products" />
                        <h3 class="products__list__title__h3">Сэндвич панели</h3>
                        <h4 class="products__list__title__h4">
                          Сonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                          dolore
                        </h4>
                        <h5 class="products__portfolio__eye">
                          <i class="fas fa-eye"></i>
                        </h5>
                      </div>
                    </a>
                  </div>
                </section>

                <section class="products__item__wowjs wow">
                  <div class="products__list__item">
                    <a href="SandwichPortfolio_in.html" class="products__portfolio__link">
                      <div class="products__list__img">
                        <img src="foto/products_4.png" alt="products" />
                        <h3 class="products__list__title__h3">Сэндвич панели</h3>
                        <h4 class="products__list__title__h4">
                          Сonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                          dolore
                        </h4>
                        <h5 class="products__portfolio__eye">
                          <i class="fas fa-eye"></i>
                        </h5>
                      </div>
                    </a>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>

        <div class="products__item__cart">
          <section
            class="products__cart__fons"
            style="background-image: url(foto/fon.png)"
          ></section>
          <div class="products__cart__item">
            <section class="container_in">
              <div>
                <ul class="products__menu">
                  <li class="wow">
                    <a href="SandwichProducts.html" class="products__menu__link"> о Продукции </a>
                  </li>

                  <li class="wow">
                    <a href="SandwichPortfolio.html" class="products__menu__link active">
                      Портфолио
                    </a>
                  </li>
                </ul>
              </div>
            </section>
          </div>

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
