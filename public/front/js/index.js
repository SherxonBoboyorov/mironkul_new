const header = document.querySelector('header');
if (header) {
    const headerBurger = document.querySelector('.header__burger__menu');
    const headerMenu = document.querySelector('.header__menu');
    const sidenavOverla = document.querySelector('.sidenav-overlay');
    const headerNone = document.querySelector('.header__menu__none');
    const body = document.querySelector('body');
    const headerMenuList = document.querySelector('.header__menu__list');
    const headerMenuLItem = document.querySelectorAll('.header__menu__list .header__menu__item');
    headerMenuList.style.display = 'none';

    headerBurger.onclick = () => {
        headerMenu.classList = 'header__menu header__menu__active';
        if (headerMenu.className == 'header__menu header__menu__active') {
            sidenavOverla.style.display = 'block';
            sidenavOverla.style.opacity = '1';
            body.style.overflow = 'hidden';
        }

        setTimeout(() => {
            headerMenuList.style.display = 'flex';
            if (headerMenuList) {
                headerMenuLItem.forEach(i => {
                    i.classList.add('fadeInLeft')
                })
            }
        }, "300");
    }

    sidenavOverla.onclick = () => {
        headerMenu.classList = 'header__menu';
        sidenavOverla.style.display = 'none';
        sidenavOverla.style.opacity = '0'
        body.style.overflow = '';
        headerMenuList.style.display = 'none';
        if (headerMenuList) {
            headerMenuLItem.forEach(i => {
                i.classList.remove('fadeInLeft')
                i.classList.add('animated')
            })
        }
    }

    headerNone.onclick = () => {
        headerMenu.classList = 'header__menu';
        sidenavOverla.style.display = 'none';
        sidenavOverla.style.opacity = '0';
        body.style.overflow = '';
        headerMenuList.style.display = 'none';
        if (headerMenuList) {
            headerMenuLItem.forEach(i => {
                i.classList.remove('fadeInLeft')
                i.classList.add('animated')
            })
        }
    }
}

const footer = document.querySelector('footer');
if (footer) {
    const footerDate = document.querySelector('.footer__title__h4 span');
    let year = new Date().getFullYear();
    footerDate.textContent = year
}

const products = document.querySelector('.products');
if (products) {
    const list = document.querySelector('.products__item__list');
    const listVideoFoto = document.querySelector('.products__foto__video__all');
    const menu = document.querySelector('.products__menu');
    if (list) {
        const items = list.querySelectorAll('.products__item__wowjs');
        const item1 = Array.from(items).filter((_item, index) => (index + 0) % 2 === 0)
        const item2 = Array.from(items).filter((_item, index) => (index + 1) % 2 === 0)

        for (i of item2) {
            i.classList.add('fadeInRight')
        }
        for (m of item1) {
            m.classList.add('fadeInLeft')
        }

    }

    if (listVideoFoto) {
        const itemsVideoFoto = listVideoFoto.querySelectorAll('.products__item__wowjs');
        const videoItem1 = Array.from(itemsVideoFoto).filter((_item, index) => (index + 0) % 2 === 0)
        const videoItem2 = Array.from(itemsVideoFoto).filter((_item, index) => (index + 1) % 2 === 0)

        for (y of videoItem2) {
            y.classList.add('fadeInRight')
        }
        for (x of videoItem1) {
            x.classList.add('fadeInLeft')
        }
    }

    if (menu) {
        const links = menu.querySelectorAll('li');
        for (const i of links) {
            i.classList.add("fadeInDown")
        }
        links[0].classList.add("fadeInLeft")
        links[links.length - 1].classList.add("fadeInRight")
    }

    const videoFotoList = document.querySelector('.products__foto__video__list');
    if (videoFotoList) {
        const items = videoFotoList.querySelectorAll('.products__item__video');
        items.forEach((i) => {
            i.onclick = () => {
                const allFotoVideo = document.querySelector('.products__foto__video__all');
                const item = allFotoVideo.querySelectorAll('.products__item__list');
                var active = 'fotoItem'
                active = i.dataset.item

                for (m of item) {
                    if (active == m.dataset.item) {
                        m.classList.add('active')
                    } else {
                        m.classList.remove('active')
                    }
                }
            }
        })

    }

    const menuVideo = document.querySelector('.products__foto__video__list');
    if (menuVideo) {
        const items = menuVideo.querySelectorAll('.products__item__video');
        const items1 = Array.from(items).filter((_item, index) => (index + 0) % 2 === 0)
        const items2 = Array.from(items).filter((_item, index) => (index + 1) % 2 === 0)
        for (y of items2) {
            y.classList.add('fadeInRight')
        }
        for (x of items1) {
            x.classList.add('fadeInLeft')
        }
    }

    const aboutCompany = document.querySelector('.products__aboutCompany__list');
    if (aboutCompany) {
        const items = aboutCompany.querySelectorAll('.products__item__video');
        const items1 = Array.from(items).filter((_item, index) => (index + 0) % 2 === 0)
        const items2 = Array.from(items).filter((_item, index) => (index + 1) % 2 === 0)
        for (y of items2) {
            y.classList.add('fadeInRight')
        }
        for (x of items1) {
            x.classList.add('fadeInLeft')
        }
    }

    const presentation = document.querySelector('.products__presentation');
    if (presentation) {
        const items = presentation.querySelectorAll('.products__presentation__item');
        const items1 = Array.from(items).filter((_item, index) => (index + 0) % 2 === 0)
        const items2 = Array.from(items).filter((_item, index) => (index + 1) % 2 === 0)
        for (y of items2) {
            y.classList.add('fadeInRight')
        }
        for (x of items1) {
            x.classList.add('fadeInLeft')
        }
    }
}

if (products) {
    const fonActive = products.querySelector('.products__cart__fons')
    const links = document.querySelectorAll('a');
    if (fonActive) {
        setTimeout(() => {
            activeFon()
        }, 1)

        links.forEach((i) => {
            i.onclick = () => {
                console.log(i)
                fonActive.classList.remove('active__fons')
                setTimeout(() => {
                    activeFon()
                }, 1)
            }
        })

        function activeFon() {
            fonActive.classList.add('active__fons')
        }
    }
}

const footerIn = document.querySelector('.footer_in');
if (footerIn) {
    const media = window.matchMedia('(min-width: 1050px)');
    footerIn.style.display = "none"

    if (!media.matches) {
        footerIn.style.display = "block"
        const footerProducts = document.querySelector('.products__footer');
        const footerCartIn = document.querySelector('.footer_in__cart');
        footerCartIn.innerHTML = footerProducts.innerHTML
        footerProducts.innerHTML = ''
        footerProducts.style.display = 'none'
    }
}

const productsMideo = document.querySelector('.products__foto__video__all');
if (productsMideo) {
    const media = window.matchMedia('(min-width: 1050px)');

    if (!media.matches) {
        const listVideo = document.querySelector('.products__foto__video__all');
        const addfotoVideo = document.querySelector('.fotoVideoMideo');
        addfotoVideo.innerHTML = listVideo.innerHTML
        addfotoVideo.classList.add('products__foto__video__all')
        listVideo.innerHTML = ''
        listVideo.style.display = 'none'

        const scrullCart = document.querySelector('.products__item__cart .products__list__scrull');
        scrullCart.style.display = 'none'
    }
}

const contacts = document.querySelector('.contacts__list');
if (contacts) {
    const items = contacts.querySelectorAll('.contacts__item');

    const contactsItem1 = Array.from(items).filter((_item, index) => (index + 0) % 2 === 0)
    const contactsItem2 = Array.from(items).filter((_item, index) => (index + 1) % 2 === 0)

    for (y of contactsItem2) {
        y.classList.add('fadeInRight')
    }
    for (x of contactsItem1) {
        x.classList.add('fadeInLeft')
    }
}
// -------------------------------===========-------------------------------

$(function () {
    let Catalog_max__pro__ul_link = document.querySelectorAll('.header__locales__link');

    for (let i = 0; i < Catalog_max__pro__ul_link.length; i++) {
        Catalog_max__pro__ul_link[i].addEventListener('click', function () {
            for (let j = 0; j < Catalog_max__pro__ul_link.length; j++) {
                Catalog_max__pro__ul_link[j].classList.remove('active');
            }
            this.classList.add('active');

        })
    }
});

// -------------------------------===========-------------------------------

$(function () {
    let Catalog_max__pro__ul_link = document.querySelectorAll('.products__item__video');

    for (let i = 0; i < Catalog_max__pro__ul_link.length; i++) {
        Catalog_max__pro__ul_link[i].addEventListener('click', function () {
            for (let j = 0; j < Catalog_max__pro__ul_link.length; j++) {
                Catalog_max__pro__ul_link[j].classList.remove('active');
            }
            this.classList.add('active');

        })
    }
});

// -------------------------------===========-------------------------------