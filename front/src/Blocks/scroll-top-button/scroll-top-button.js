$(document).ready(() => {
   const pref = '.scroll-top-button'; // prefix for current folder
   
   $(pref).on('click', e => {
      window.scrollTo({ top: 0, behavior: "smooth" });
   })

   $(window).on('load', toggleButton);
   window.scrollBehaviour.subscribe('scroll', toggleButton);

   function toggleButton(e) {
      if (window.scrollY < 100)
         $(pref).fadeOut(250);
      else
         $(pref).fadeIn(250);
   }
});