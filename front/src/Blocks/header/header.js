import './__menu/header__menu';

$(document).ready(() => {
   const pref = '.header';

   function changeDirectionStuff(headerType, sloganAnimation, logoTransform, headerPadding) {
      let $header = $(pref);
      $(pref+'__slogan')[sloganAnimation](250).promise();

      animateElement($(pref+'__logo'), { transform: logoTransform });
      animateElement($header, headerPadding).then(() => {
         $header.removeClass('header_' + (headerType == 'small' ? 'large' : 'small'));
         $header.addClass('header_' + headerType);
      });
   }

   window.scrollBehaviour.subscribe('start scroll up', e => {
      // make header large
      changeDirectionStuff('large', 'slideDown', 'scale(1)', {
         paddingTop: '3.28571em',
         paddingBottom: '3.28571em',
      });
   });

   window.scrollBehaviour.subscribe('start scroll down', e => {
      // make header small
      changeDirectionStuff('small', 'slideUp', 'scale(0.6)', {
         paddingTop: '0',
         paddingBottom: '0.5em',
      });
   });
});