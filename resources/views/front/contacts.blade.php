@extends('layouts.front')

@section('content')

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
          <section class="products__cart__fons" style="background-image: url(foto/contacts.png);"></section>

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

  @endsection