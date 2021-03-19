$(document).ready(() => {
   class UnderlineManipulator {
      constructor($underlineStatic, $underline, $defaultElement, $menu) {
         this.$menu = $menu;
         this.$underline = $underline;
         this.underline = $underline[0];
         this.$underlineStatic = $underlineStatic; // TODO: move static underline on screen resize

         this.$defaultElement = $defaultElement;
         this.position = {};

         this.revertPosition();
         $underlineStatic.css(this._getTargetPos($defaultElement));
      }

      _getMenuPos() {
         return this.$menu[0].getBoundingClientRect();
      }
      _getTargetPos($target) {
         const targetRect = $target[0].getBoundingClientRect();
         const menuPos = this._getMenuPos();
         return {
            left: targetRect.left - menuPos.left +'px',
            top: targetRect.bottom - menuPos.top +'px',
            width: targetRect.width+'px',
         };
      }

      async animate(animationKeyframes, duration = 250) {
         const animation = this.underline.animate([animationKeyframes], { duration, easing: 'ease' });

         animation.oncancel = saveState.bind(this);
         animation.onfinish = saveState.bind(this);

         function saveState() {
            this.$underline.css(animationKeyframes);
            this.position = animationKeyframes;
         }

         return animation.finished;
      }
      moveToTarget($target) {
         this.animate(this._getTargetPos($target));
      }
      revertStatic() {
         this.$underlineStatic.css(this._getTargetPos(this.$defaultElement));
      }
      revertPosition(isRevertStatic = false) {
         this.moveToTarget(this.$defaultElement);
         if (isRevertStatic == true)
            this.revertStatic();
      }
   }
   const pref = '.header__menu'; // prefix for current folder

   const $underlineStatic = $(pref+'-underline'),
      $underline = $(pref+'-underline_main');
   const $menu = $(pref);
   const $lis = $(pref+'-li');
   
   const $currentLi = $lis.first();
   $currentLi.on('click', e => e.preventDefault());

   const manipulator = new UnderlineManipulator($underlineStatic, $underline, $currentLi, $menu);
   window.menuManipulator = manipulator;

   let hoveredLi;
   let revertTimediffer = new Timediffer(500), resizeTimediffer = new Timediffer(500);

   $lis.on('mouseenter', liHoverIn);
   $lis.on('mouseleave', liHoverOut);

   $(window).on('resize', () => resizeTimediffer.ifReached(() => {
      if (window.innerWidth > window.MOBILE_BREAK) $(pref + '-content').css('display', '');
      manipulator.revertPosition(true);
   }));

   async function liHoverIn(e) {
      hoveredLi = e.target;
      manipulator.moveToTarget($(hoveredLi));
   }

   function liHoverOut(e) {
      hoveredLi = undefined;

      revertTimediffer.ifReached(() => {
         if (!hoveredLi) manipulator.revertPosition();
      });
   }

   // Wry menu on load fix
   setTimeout(() => manipulator.revertPosition(true), 50);
});