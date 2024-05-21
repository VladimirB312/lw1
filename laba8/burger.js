document.addEventListener("DOMContentLoaded", () => {
  const menuButton = document.querySelector('.menu-icon');    
  const menuList = document.querySelector('.header-nav__menu-list');  

  menuButton.addEventListener('click', function() {
    menuList.classList.toggle('active');
    menuButton.classList.toggle('active');
    document.body.classList.toggle('_lock');
  })

  window.addEventListener('resize', function() {
    menuList.classList.remove('active');
  })


});