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
                    <a href="SandwichProducts.html" class="header_in__menu__link">О продукции</a>
                  </li>

                  <li>
                    <a href="SandwichProducts_in.html" class="header_in__menu__link"
                      >сэндвич панели 75мм</a
                    >
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
            <div class="products__item clearfix">
              <div class="products__item__img">
                <img src="foto/products_in.png" alt="products" />
              </div>

              <section>
                <h2 class="products__title__h2">Сэндвич панели</h2>
                <h4 class="products__iten__title">75 мм</h4>
                <div class="products__item__text">
                  <p>
                    Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit,
                    sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt,
                    neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur,
                    adipisci velit, sed quia non numquam eius modi tempora incidunt quia voluptas
                    sit, aspernatur aut odit aut fugit neque porro quisquam est, qui dolorem ipsum,
                    quia dolor sit, amet, consectetur, adipisci velit
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
                  <h3 class="products__title__foto">Фото материалы</h3>
                </div>

                <div class="products__item__video wow" data-item="videoItem">
                  <div class="products__foto__img">
                    <i class="far fa-play-circle"></i>
                  </div>
                  <h3 class="products__title__foto">Видео материалы</h3>
                </div>

                <a href="SandwichPortfolio.html" class="products__item__video wow">
                  <div class="products__foto__img">
                    <i class="far fa-images"></i>
                  </div>
                  <h3 class="products__title__foto">Портфолио</h3>
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
                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <a href="foto/products_2.png" data-fancybox="gallery">
                        <div class="products__foto__item__img">
                          <img src="foto/products_2.png" alt="gallery" />
                          <h4 class="products__foto__eye">
                            <i class="fas fa-eye"></i>
                          </h4>
                        </div>
                      </a>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <a href="foto/products_3.png" data-fancybox="gallery">
                        <div class="products__foto__item__img">
                          <img src="foto/products_3.png" alt="gallery" />
                          <h4 class="products__foto__eye">
                            <i class="fas fa-eye"></i>
                          </h4>
                        </div>
                      </a>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <a href="foto/products_4.png" data-fancybox="gallery">
                        <div class="products__foto__item__img">
                          <img src="foto/products_4.png" alt="gallery" />
                          <h4 class="products__foto__eye">
                            <i class="fas fa-eye"></i>
                          </h4>
                        </div>
                      </a>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <a href="foto/products_5.png" data-fancybox="gallery">
                        <div class="products__foto__item__img">
                          <img src="foto/products_5.png" alt="gallery" />
                          <h4 class="products__foto__eye">
                            <i class="fas fa-eye"></i>
                          </h4>
                        </div>
                      </a>
                    </div>
                  </section>
                </div>

                <div class="products__item__list products__foto" data-item="videoItem">
                  <section class="products__item__wowjs wow">
                    <div class="products__video__item">
                      <p class="text-center">
                        <a
                          data-fancybox
                          class="about__item__video"
                          href="https://youtu.be/G4qaiWGeO5w?list=RDUWw40cW4_tg&t=2"
                        >
                          <section>
                            <h3 class="products__list__title__h3">Lorem ipsum dolor sit amet</h3>
                            <img class="inline" src="foto/products_1.png" alt="videoItem" />
                            <!-- play start -->

                            <div class="button__min is-play">
                              <div class="button-outer-circle has-scale-animation"></div>
                              <div
                                class="button-outer-circle has-scale-animation has-delay-short"
                              ></div>
                              <div class="button-icon is-play">
                                <img
                                  class="about__item__img__play"
                                  alt="All"
                                  src="foto/icons/pley.svg"
                                />
                              </div>
                            </div>

                            <!-- play end -->
                          </section>
                        </a>
                      </p>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__video__item">
                      <p class="text-center">
                        <a
                          data-fancybox
                          class="about__item__video"
                          href="https://youtu.be/G4qaiWGeO5w?list=RDUWw40cW4_tg&t=2"
                        >
                          <section>
                            <h3 class="products__list__title__h3">Duis aute irure dolor</h3>
                            <img class="inline" src="foto/products_2.png" alt="videoItem" />
                            <!-- play start -->

                            <div class="button__min is-play">
                              <div class="button-outer-circle has-scale-animation"></div>
                              <div
                                class="button-outer-circle has-scale-animation has-delay-short"
                              ></div>
                              <div class="button-icon is-play">
                                <img
                                  class="about__item__img__play"
                                  alt="All"
                                  src="foto/icons/pley.svg"
                                />
                              </div>
                            </div>

                            <!-- play end -->
                          </section>
                        </a>
                      </p>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__video__item">
                      <p class="text-center">
                        <a
                          data-fancybox
                          class="about__item__video"
                          href="https://youtu.be/G4qaiWGeO5w?list=RDUWw40cW4_tg&t=2"
                        >
                          <section>
                            <h3 class="products__list__title__h3">Excepteur sint occaecat</h3>
                            <img class="inline" src="foto/products_3.png" alt="videoItem" />
                            <!-- play start -->

                            <div class="button__min is-play">
                              <div class="button-outer-circle has-scale-animation"></div>
                              <div
                                class="button-outer-circle has-scale-animation has-delay-short"
                              ></div>
                              <div class="button-icon is-play">
                                <img
                                  class="about__item__img__play"
                                  alt="All"
                                  src="foto/icons/pley.svg"
                                />
                              </div>
                            </div>

                            <!-- play end -->
                          </section>
                        </a>
                      </p>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__video__item">
                      <p class="text-center">
                        <a
                          data-fancybox
                          class="about__item__video"
                          href="https://youtu.be/G4qaiWGeO5w?list=RDUWw40cW4_tg&t=2"
                        >
                          <section>
                            <h3 class="products__list__title__h3">Lorem ipsum dolor sit amet</h3>
                            <img class="inline" src="foto/products_4.png" alt="videoItem" />
                            <!-- play start -->

                            <div class="button__min is-play">
                              <div class="button-outer-circle has-scale-animation"></div>
                              <div
                                class="button-outer-circle has-scale-animation has-delay-short"
                              ></div>
                              <div class="button-icon is-play">
                                <img
                                  class="about__item__img__play"
                                  alt="All"
                                  src="foto/icons/pley.svg"
                                />
                              </div>
                            </div>

                            <!-- play end -->
                          </section>
                        </a>
                      </p>
                    </div>
                  </section>
                </div>
              </section>
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