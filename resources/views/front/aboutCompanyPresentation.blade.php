@extends('layouts.front')

@section('content')

  <!-- Products start -->

  <div class="products"> 
    <div class="products__list">
      <div class="products__list__scrull">
        <section class="container_in">
          <div class="products__aboutCompany__item">
            <h2 class="products__title__h2">Презентация</h2>
          </div>
        </section>

        <section class="container_in">
          <div class="products__presentation">
            <a href="foto/fon.png" download class="products__presentation__item wow">
              <span><img src="foto/icons/failes.svg" alt="icons"></span>
              Lorem ipsum dolor sit amet
            </a>

            <a href="foto/fon.png" download class="products__presentation__item wow">
              <span><img src="foto/icons/failes.svg" alt="icons"></span>
              Ut enim ad minim veniam quis
            </a>

            <a href="foto/fon.png" download class="products__presentation__item wow">
              <span><img src="foto/icons/failes.svg" alt="icons"></span>
              Duis aute irure dolor in
            </a>

            <a href="foto/fon.png" download class="products__presentation__item wow">
              <span><img src="foto/icons/failes.svg" alt="icons"></span>
              Excepteur sint occaecat
            </a>

            <a href="foto/fon.png" download class="products__presentation__item wow">
              <span><img src="foto/icons/failes.svg" alt="icons"></span>
              Sed ut perspiciatis unde
            </a>

            <a href="foto/fon.png" download class="products__presentation__item wow">
              <span><img src="foto/icons/failes.svg" alt="icons"></span>
              Nemo enim ipsam voluptatem
            </a>
          </div>
        </section>
      </div>
      
        <div class="products__item__cart">
          <section class="products__cart__fons" style="background-image: url(foto/fon_2.png);"></section>

          <section></section>

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