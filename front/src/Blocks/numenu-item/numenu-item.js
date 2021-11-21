$(document).ready(() => {
   const pref = '.numenu-item'; // prefix for current folder
   
   $(`${pref}__trigger`).on('click', e => {
      const headerHeight = document.getElementsByClassName('header')[0].getBoundingClientRect().height;
      const scrollTargetTop = document.getElementById(e.currentTarget.dataset.target).getBoundingClientRect().top;
      window.scrollTo({top: scrollTargetTop - headerHeight, behavior: 'smooth'});
      e.preventDefault();
   });
});