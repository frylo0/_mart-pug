import './__menu/header__menu';

$(document).ready(() => {
   const MOBILE_BREAK = 900;
   window.MOBILE_BREAK = MOBILE_BREAK;
   const pref = '.header';

   function changeDirectionStuff(headerType, sloganAnimation, logoTransform, headerPadding) {
      let $header = $(pref);

      if (window.innerWidth < MOBILE_BREAK) {// 900 is a css adaptivity break point
         $(pref + '__slogan_mobile')[sloganAnimation](250).promise();
      } else {
         $(pref + '__slogan_pc')[sloganAnimation](250).promise();
      }

      animateElement($(pref+'__logo'), { transform: logoTransform });
      animateElement($header, headerPadding).then(() => {
         $header.removeClass('header_' + (headerType == 'small' ? 'large' : 'small'));
         $header.addClass('header_' + headerType);
      });
   }

   window.scrollBehaviour.subscribe('start scroll up', e => {
      // make header large
      if (window.innerWidth < MOBILE_BREAK) // MOBILE
         changeDirectionStuff('large', 'slideDown', 'scale(1)', {
            paddingTop: '2em',
            paddingBottom: '1em',
         });
      else // PC
         changeDirectionStuff('large', 'slideDown', 'scale(1)', {
            paddingTop: '3.28571em',
            paddingBottom: '3.28571em',
         });
   });

   window.scrollBehaviour.subscribe('start scroll down', e => {
      // make header small
      if (window.innerWidth < MOBILE_BREAK) // MOBILE
         changeDirectionStuff('small', 'slideUp', 'scale(0.6)', {
            paddingTop: '1em',
            paddingBottom: '1em',
         });
      else // PC
         changeDirectionStuff('small', 'slideUp', 'scale(0.6)', {
            paddingTop: '0',
            paddingBottom: '0.5em',
         });
   });


   // STOP: mobile menu
   const $menuButton = $('.header__menu');
   const $menuMobile = $('.header__menu-content');
   $menuButton.on('click', e => {
      if (window.innerWidth < MOBILE_BREAK) {
         console.log('menu toggle');
         $menuMobile.slideToggle().promise().then(() => window.menuManipulator.revertPosition());
      }
   });
});