var body=document.body;
const burger = document.querySelector('.kapsayici nav.ustalan .burger');
const nav = document.querySelector('.kapsayici nav.ustalan .nav-links');
const links = document.querySelectorAll('.kapsayici nav.ustalan .nav-links li');

  burger.addEventListener('click',()=>{
    nav.classList.toggle('nav-active');

    links.forEach((link,index)=>{
      if (link.style.animation) {
        link.style.animation = '';
      }else{
        link.style.animation = `linksFade 0.5s ease forwards ${index / 5 + 0.2}s`;
      }
    });

    burger.classList.toggle('close');
  });