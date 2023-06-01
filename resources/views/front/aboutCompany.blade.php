@extends('layouts.front')

@section('content')

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
                    <div class="products__item__video wow">
                        <a href="{{ route('aboutCompanyPhotos') }}">
                            <div class="products__foto__img">
                              <i class="far fa-images"></i>
                            </div>
                            <h3 class="products__title__foto">Фото материалы</h3>
                        </a>
                    </div>

                    <div class="products__item__video wow">
                        <a href="{{ route('aboutCompanyVideos') }}">
                            <div class="products__foto__img">
                              <i class="far fa-play-circle"></i>
                            </div>
                            <h3 class="products__title__foto">Видео материалы</h3>
                        </a>
                    </div>

                    <div class="products__item__video wow">
                        <a href="{{ route('presentations') }}">
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
              @foreach ($pages as $page)
                <p> 
                  {!! $page->{'content_' . app()->getLocale()} !!}
                </p>
              @endforeach
            </div>
          </div>
        </section>
      </div>
      
        <div class="products__item__cart">
          <section class="products__cart__fons" style="background-image: url({{ asset('front/foto/fon_2.png') }});"></section>

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

 