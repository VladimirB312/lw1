document.addEventListener("DOMContentLoaded", () => {
  const menuButton = document.querySelector('.menu-icon');  
  const menuList = document.querySelector('.header-nav__menu-list');
  console.log(menuButton);

  menuButton.addEventListener('click', function() {
    menuList.classList.toggle('active');
  })

  window.addEventListener('resize', function() {
    menuList.classList.remove('active');
  })
});