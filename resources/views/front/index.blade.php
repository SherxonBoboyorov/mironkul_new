@extends('layouts.front')

@section('content')
  
  <!-- slider start -->
  
  <div class="slider">
    <div class="slider__cart">
      <div class="slider__list">
        @foreach($categories as $category)
        <div class="slide" style="background-image: url({{ asset($category->image) }})"></div>

        
        <section class="slider__center">
          <div class="slider__menu">
            <section class="container">
              <div class="slider__menu__list">

                <div class="slider__button">
                  <h3 class="slider__title__h3">{{ $category->{'title_' . app()->getLocale()}  }}</h3>
                  <h4 class="slider__title__h4">{{ $category->{'name_' . app()->getLocale()}  }}</h4>
                </div>
                
              </div>
            </section>
          </div>
  
          <section class="container">
            <div class="slider__menu__cart">
              <ul class="slider__list__cart">
                <li class="wow">
                  <a href="SandwichProducts.html" class="slider__list__link">
                    <div class="slider__list__img">
                      <img src="{{ asset('front/foto/icons/icons_1.svg') }}" alt="icons">
                    </div>
                    Продукции
                  </a>
                </li>
      
                <li class="wow">
                  <a href="SandwichPortfolio.html" class="slider__list__link">
                    <div class="slider__list__img">
                      <img src="{{ asset('front/foto/icons/icons_2.svg') }}" alt="icons">
                    </div>
                    Портфолио
                  </a>
                </li>
              </ul>

            </div>
          </section>
        </section>
        @endforeach
      </div>
    </div>
  </div>

  <!-- slider end -->

  @endsection

 
