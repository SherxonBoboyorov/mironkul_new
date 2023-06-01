const headerI = document.querySelector('.header')
if (headerI) {
  const icons1 = document.querySelector('.icons1')
  const icons2 = document.querySelector('.icons2')
  icons1.style.display = 'none'
  icons2.style.display = 'none'
  setTimeout(() => {
    icons1.style.display = 'block'
  }, 400)

  setTimeout(() => {
    icons2.style.display = 'block'
  }, 700)

  window.addEventListener('DOMContentLoaded', () => {
    $('.lds-roller').fadeOut()
    $('#loading').delay(4000).fadeOut('slow')
  })
}
