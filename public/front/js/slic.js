$(document).ready(function () {
  $('.slider__menu').slick({
    arrows: false,
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1399.9,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 1120,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 776,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  })

  $('.fotogalereya_in__list1').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    arrows: true,
    fade: true,
    asNavFor: '.fotogalereya_in__list2',
  })

  $('.fotogalereya_in__list2').slick({
    arrows: false,
    asNavFor: '.fotogalereya_in__list1',
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1630,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 1250,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },

      {
        breakpoint: 1050,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
        },
      },

      {
        breakpoint: 850,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },

      {
        breakpoint: 500,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  })

  const slider = document.querySelector('.slider')
  let linkTemp
  if (slider) {
    const menuItems = document.querySelectorAll('.slider__menu__item')
    const sliderBgs = document.querySelectorAll('.slider__bg__item')

    const sliderLinks = document.querySelectorAll('.slider__link__list>li')

    menuItems.forEach((item, menuItemIndex) => {
      item.addEventListener('mouseover', () => {
        if (sliderLinks.length === 2 && linkTemp !== menuItemIndex) {
          const productsLink = sliderLinks[0].querySelector('a')
          const portfolioLink = sliderLinks[1].querySelector('a')
          productsLink.href = productsLink.href.replace(/\/([^/]+)$/, `/products${menuItemIndex === 0 ? '' : menuItemIndex}`)
          portfolioLink.href = portfolioLink.href.replace(/\/([^/]+)$/, `/portfolios${menuItemIndex === 0 ? '' : menuItemIndex}`)

          linkTemp = menuItemIndex
        }

        sliderBgs.forEach((sliderBg, sliderBgIndex) => {
          if (menuItemIndex !== sliderBgIndex) sliderBg.classList.remove('active')
          else sliderBg.classList.add('active')
        })
      })
    })
  }
})
