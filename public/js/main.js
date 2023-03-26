window.addEventListener('scroll', onScroll)

onScroll()
function onScroll() {
    showNavOnScroll()
    showBackToTopButtomOnScroll()

    activeteMenuCurrentSection(home)
    activeteMenuCurrentSection(services)
    activeteMenuCurrentSection(about)
    activeteMenuCurrentSection(contact)
}
function activeteMenuCurrentSection(section) {
    // linha alvo
    const targetLine = scrollY + innerHeight / 2

    //verificar se a seção passou da linha 
    // verificar quais dados vou precisar

    //o top da seção
    const sectionTop = section.offsetTop

    // a altura da seção
    const sectionHeight = section.offsetHeight


    // o topo da seção chegou ou ultrapassou a linha alvo
    const sectionTopReachOrPassedTargetLine = targetLine >= sectionTop

    // informações dos dados e da lógica
    /*console.log (
        'o topo chegou ou passou da linha?',                 sectionTopReachOrPassedTargetLine 
    )*/

    // verificar se a  base está abaixo da linha alvo
    // quais dados vou precisar?

    // a seção termina onde?
    const sectionEndsAt = sectionTop + sectionHeight

    const sectionEndPassedTargetLine = sectionEndsAt <= targetLine

    /*console.log ('o fundo da seção passou a linha?',
            sectionEndPassedTargetLine
    )*/


    //limites da seção
    const sectionBoudaries = sectionTopReachOrPassedTargetLine && !sectionEndPassedTargetLine

    const sectionId = section.getAttribute('id')
    const menuElement = document.querySelector(`.menu a[href*=${sectionId}]`)

    menuElement.classList.remove('active')  
    if (sectionBoudaries) {
        menuElement.classList.add('active')
    }
}

function showNavOnScroll() { 
    if (scrollY > 0){
        navegation.classList.add('scroll')
    } else {
        navegation.classList.remove('scroll')
    }
}

function showBackToTopButtomOnScroll() {
    if (scrollY > 500){
        backToTopButton.classList.add('show')
    } else {
        backToTopButton.classList.remove('show')
    }
}
function openMenu() {
    document.body.classList.add('menu-expanded')

}

function closeMenu() {
    document.body.classList.remove('menu-expanded')
}
/*
scrollReveal({
    origin: 'top',
    distance: '30px',
    duration: 700,
}).reveal(`
#home,
#home img,
#home .stats,
#services,
#services header,
#services .card,
#about,
#about header,
#about .content`)
*/