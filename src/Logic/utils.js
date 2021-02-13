class Timediffer {
   constructor (delay) {
      this.id = undefined;
      this.delay = delay;
   }
   ifReached(callback) {
      clearInterval(this.id);
      this.id = setTimeout(callback, this.delay);
   }
}

window.Timediffer = Timediffer;

function animateElement($element, animationKeyframes, options = { duration: 250 }) {
   const animation = $element[0].animate([animationKeyframes], options);
   animation.onfinish = (
      () => $element.css(animationKeyframes)
   ).bind();
   return animation.finished;
}

window.animateElement = animateElement

class ScrollBehaviour {
   constructor() {
      this.prevScroll = 0;
      this.scrollDirection = null;
      this.handlers = {};

      $(window).on('scroll', e => this.catchScroll(e));
   }

   catchScroll(e) {
      const currScroll = window.scrollY;
      const prevScrollDirection = this.scrollDirection;

      this.scrollDirection = this.prevScroll < currScroll ? 'down' : 'up';
      this.prevScroll = currScroll;

      this.trigger('scroll', e);
      if (prevScrollDirection != this.scrollDirection)
         this.changeDirectionHandler(e);
      else {
         if (this.scrollDirection == 'up')
            this.trigger('scroll up', e);
         else
            this.trigger('scroll down', e);
      }
   }

   changeDirectionHandler(e) {
      if (this.scrollDirection == 'down')
         this.trigger('start scroll down', e);
      else if (this.scrollDirection == 'up')
         this.trigger('start scroll up', e);
   }

   subscribe(eventType, callback) {
      if (!this.handlers[eventType]) this.handlers[eventType] = [];
      this.handlers[eventType].push(callback);
   }

   trigger(eventType, e = undefined) {
      if (!this.handlers[eventType]) return;
      for (const callback of this.handlers[eventType])
         setTimeout(() => callback(e), 0);
   }
}

window.scrollBehaviour = new ScrollBehaviour();