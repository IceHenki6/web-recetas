
const menuBtn = document.getElementById('navbar-hamburger')
const dropdownContainer = document.querySelector('.dropdown-container')

const closeBtn = document.querySelector('.close-btn')

const showDropdown = () => {
  dropdownContainer.classList.add('visible')
}

const hideDropdown = () => {
  dropdownContainer.classList.remove('visible')
}



menuBtn.addEventListener('click', showDropdown)
closeBtn.addEventListener('click', hideDropdown)
