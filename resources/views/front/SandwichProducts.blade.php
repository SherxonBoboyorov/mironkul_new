@extends('layouts.front')

@section('content')

  <!-- Products start -->

  <div class="products">
    <div class="products__list">
      <div class="products__list__scrull">
        <section class="container_in">
          <div class="products__item">
              <h2 class="products__title__h2">Продукция</h2>

              <div class="products__item__list">

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <div class="products__list__img">
                          <img src="foto/products_1.png" alt="products">
                          <h3 class="products__list__title__h3">Сэндвич панели</h3>
                          <h4 class="products__list__title__h4">50 мм</h4>
                      </div>

                      <a href="SandwichProducts_in.html" class="products__list__link">
                          Подробнее <span><i class="fas fa-angle-double-right"></i></span>
                      </a>
                  </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <div class="products__list__img">
                          <img src="foto/products_2.png" alt="products">
                          <h3 class="products__list__title__h3">Сэндвич панели</h3>
                          <h4 class="products__list__title__h4">100 мм</h4>
                      </div>

                      <a href="SandwichProducts_in.html" class="products__list__link">
                          Подробнее <span><i class="fas fa-angle-double-right"></i></span>
                      </a>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <div class="products__list__img">
                          <img src="foto/products_3.png" alt="products">
                          <h3 class="products__list__title__h3">Сэндвич панели</h3>
                          <h4 class="products__list__title__h4">150 мм</h4>
                      </div>

                      <a href="SandwichProducts_in.html" class="products__list__link">
                        Подробнее <span><i class="fas fa-angle-double-right"></i></span>
                      </a>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <div class="products__list__img">
                          <img src="foto/products_4.png" alt="products">
                          <h3 class="products__list__title__h3">Сэндвич панели</h3>
                          <h4 class="products__list__title__h4">125 мм</h4>
                      </div>

                      <a href="SandwichProducts_in.html" class="products__list__link">
                        Подробнее <span><i class="fas fa-angle-double-right"></i></span>
                      </a>
                    </div>
                  </section>

                  <section class="products__item__wowjs wow">
                    <div class="products__list__item">
                      <div class="products__list__img">
                          <img src="foto/products_5.png" alt="products">
                          <h3 class="products__list__title__h3">Сэндвич панели</h3>
                          <h4 class="products__list__title__h4">125 мм</h4>
                      </div>

                      <a href="SandwichProducts_in.html" class="products__list__link">
                          Подробнее <span><i class="fas fa-angle-double-right"></i></span>
                      </a>
                    </div>
                  </section>

              </div>
          </div>
        </section>
      </div>

        <div class="products__item__cart">
          <section class="products__cart__fons" style="background-image: url(foto/fon.png);"></section>
          <div class="products__cart__item">
            <section class="container_in">
              <div>
                <ul class="products__menu">
                  <li class="wow">
                    <a href="SandwichProducts.html" class="products__menu__link active">
                      о Продукции
                    </a>
                  </li>
  
                  <li class="wow">
                    <a href="SandwichPortfolio.html" class="products__menu__link">
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

  @endsection