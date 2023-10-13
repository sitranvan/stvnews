// handle remove padding header
const headerBottom = document.querySelector('.header-bottom')
const containerHeader = document.querySelector('.container-header')
const navMenuMobile = document.querySelector('.slicknav_nav')
document.addEventListener('scroll', () => {
    if (headerBottom.classList.contains('sticky-bar')) {
        containerHeader.classList.remove('pb-4')
        navMenuMobile.classList.add('nav-menu-scroll')
    } else {
        containerHeader.classList.add('pb-4')
        navMenuMobile.classList.remove('nav-menu-scroll')
    }
})

