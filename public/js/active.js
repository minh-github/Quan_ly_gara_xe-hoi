function setActiveMenu() {
    let active = document.querySelector('.has-child ul li .active')
    let parent = active.parentElement.parentElement.parentElement
    parent.classList += " open"
}
setActiveMenu()