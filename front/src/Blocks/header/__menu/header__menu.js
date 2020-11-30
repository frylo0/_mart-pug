$(document).ready(() => {
   class UnderlineManipulator {
      constructor($underline, $defaultElement) {
         this.$underline = $underline;
         this.underline = $underline[0];

         this.$defaultElement = $defaultElement;
         this.position = {};

         this.revertPosition();
      }

      _getTargetPos($target) {
         const targetRect = $target[0].getBoundingClientRect();
         return {
            left: targetRect.left+'px',
            top: targetRect.bottom+'px',
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
      updatePosition(toUp) {
         let stepSize = 63, topFloat = parseFloat(this.position.top);
         this.position.top = topFloat + (toUp ? +stepSize : -stepSize) + 'px';
         this.animate(this.position);
      }
      revertPosition() {
         this.moveToTarget(this.$defaultElement);
      }
   }
   const pref = '.header__menu'; // prefix for current folder

   const $underline = $(pref+'-underline');
   const $lis = $(pref+'-li');

   const manipulator = new UnderlineManipulator($underline, $lis.first());
   window.menuManipulator = manipulator;

   let hoveredLi;
   let revertTimediffer = new Timediffer(500), resizeTimediffer = new Timediffer(500);

   $lis.on('mouseenter', liHoverIn);
   $lis.on('mouseleave', liHoverOut);

   $(window).on('resize', () => resizeTimediffer.ifReached(() => manipulator.revertPosition()));

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
});