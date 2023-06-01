const slider = document.querySelector('.slider')
if (slider) {
  const slides = document.querySelectorAll('.slide')
  const controls = document.querySelectorAll('.slider__button')
  const menuList = document.querySelectorAll('.slider__list__cart')
  const activeMenu = document.querySelector('.slider__menu__cart')
  let activeSlide = 0
  let prevActive = 0

  let int = setInterval(changeSlides, 60000)
  let max = setInterval(listActive, 6000)

  function changeSlides() {
    slides[prevActive].classList.remove('active')
    controls[prevActive].classList.remove('active')
    menuList[prevActive].classList.remove('active')

    slides[activeSlide].classList.add('active')
    controls[activeSlide].classList.add('active')
    menuList[activeSlide].classList.add('active')

    prevActive = activeSlide++

    if (activeSlide >= slides.length) {
      activeSlide = 0
    }
  }

  function listActive() {
    const item = activeMenu.querySelectorAll('.slider__list__cart')
    for (let i = 0; i < item.length; i++) {
      if (item[i].className == 'slider__list__cart active') {
        const itemIn = item[i].querySelectorAll('li')

        // item style start

        var counter = 0
        const media1 = window.matchMedia('(min-width: 1280px)')
        const media2 = window.matchMedia('(min-width: 1000px)')
        const media3 = window.matchMedia('(min-width: 600px)')
        const media4 = window.matchMedia('(min-width: 350px)')
        const media5 = window.matchMedia('(min-width: 200px)')
        if (media1.matches) {
          if (itemIn.length <= 5) {
            counter = itemIn.length
          } else {
            counter = 5
          }
          item[i].style.gridTemplateColumns = `repeat(${counter},1fr)`
        } else if (media2.matches) {
          if (itemIn.length <= 4) {
            counter = itemIn.length
          } else {
            counter = 4
          }
          item[i].style.gridTemplateColumns = `repeat(${counter},1fr)`
        } else if (media3.matches) {
          if (itemIn.length <= 3) {
            counter = itemIn.length
          } else {
            counter = 3
          }
          item[i].style.gridTemplateColumns = `repeat(${counter},1fr)`
        } else if (media4.matches) {
          if (itemIn.length <= 2) {
            counter = itemIn.length
          } else {
            counter = 2
          }
          item[i].style.gridTemplateColumns = `repeat(${counter},1fr)`
        } else if (media5.matches) {
          if (itemIn.length <= 1) {
            counter = itemIn.length
          } else {
            counter = 1
          }
          item[i].style.gridTemplateColumns = `repeat(${counter},1fr)`
        }
        // item style end

        for (const i of itemIn) {
          i.classList.add('fadeInDown')
        }
        itemIn[0].classList.add('fadeInLeft')
        itemIn[itemIn.length - 1].classList.add('fadeInRight')
      } else {
        const itemIn = item[i].querySelectorAll('li')
        for (const i of itemIn) {
          i.classList.add('animated')
          i.classList.remove('fadeInDown')
        }
        itemIn[0].classList.remove('fadeInLeft')
        itemIn[itemIn.length - 1].classList.remove('fadeInRight')

        itemIn[0].classList.add('animated')
        itemIn[itemIn.length - 1].classList.add('animated')
      }
    }
  }

  controls.forEach((control) => {
    control.addEventListener('click', () => {
      let idx = [...controls].findIndex((c) => c === control)
      activeSlide = idx

      changeSlides()
      listActive()

      clearInterval(int, max)
      int = setInterval(changeSlides, 60000)
      max = setInterval(listActive, 60000)
    })
  })
}

$(document).ready(function () {
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
})
