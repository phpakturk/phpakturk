window.onclick = function(event) {
  if (!event.target.matches('.dropdown-btn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('goster')) {
        openDropdown.classList.remove('goster');
      }
    }
  }
}
document.querySelectorAll('.phpakturk-kenarcubugu-submenu').forEach(e => {
    e.querySelector('.phpakturk-kenarcubugu-menu-dropdown').onclick = (event) => {
        event.preventDefault();
        e.querySelector('.phpakturk-kenarcubugu-menu-dropdown .dropdown-icon').classList.toggle('active');
        let dropdown_content = e.querySelector('.phpakturk-kenarcubugu-menu-dropdown-content');
        let dropdown_content_lis = dropdown_content.querySelectorAll('li');
        let active_height = dropdown_content_lis[0].clientHeight * dropdown_content_lis.length;
        dropdown_content.classList.toggle('active');
        dropdown_content.style.height = dropdown_content.classList.contains('active') ? active_height + 'px' : '0';
    }
});
let overlay = document.querySelector('.overlay');
let tema_kenarcubugu = document.querySelector('.phpakturk-kenarcubugu');
document.querySelector('#mobile-toggle').onclick = () => {
    tema_kenarcubugu.classList.toggle('active');
    overlay.classList.toggle('active');
}
document.querySelector('#phpakturk-kenarcubugu-kapat').onclick = () => {
    tema_kenarcubugu.classList.toggle('active');
    overlay.classList.toggle('active');
}