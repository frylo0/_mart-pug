import './../../bundle';

// Code libs and plugins
import { globalEventone } from '../../Plugins/eventone.js';

globalEventone();

$(window)
   .on('mousemove', action('mousemove: window'))
   .on('scroll', action('scroll: window'))
   .on('resize', action('resize: window'));

let windowHalfWidth = window.innerWidth / 2;

const cylinderManager = { // cylinderManager
   frame: {
      el: cylinder.querySelector('.cylinder-frame'),
      heightFactor: 1,
      fitHeight() {
         let blockHeight = getComputedStyle(this.el.querySelector('.strip > div')).height;
         blockHeight = parseFloat(blockHeight);
         this.el.style.height = blockHeight * this.heightFactor + 'px';
      },
   },
   container: {
      el: cylinder.querySelector('.cylinder-container'),
   },
   rotate: {
      startDegree: 106,
      factor: 0.01 - (window.innerWidth / 1000000),
      basis: 0,
      calcBasis() {
         this.basis = this.startDegree - windowHalfWidth * this.factor;
      }
   },

   render: {
      RATE: 50,
      positionContFrameRatio: 0.59, // containerPos[vw] / framePos[vw] = vw rate
      
      actualX: 0,
      actualY: 0,
      
      frameTimeout: 0,
      containerTimeout: 0,
      
      stuff() {
         const cylinderRotate = cylinderManager.rotate;
         
         const rotateY = this.actualX * cylinderRotate.factor + cylinderRotate.basis;
         const posYFrame = this.actualY,
               posYContainer = -1 * posYFrame * this.positionContFrameRatio;

         clearTimeout(this.frameTimeout);
         this.frameTimeout = setTimeout(() => { // render frame
            cylinderManager.frame.el.style.transform = `rotateY(${rotateY}deg) translateY(${posYFrame}px)`;
         }, 0);
         clearTimeout(this.containerTimeout);
         this.containerTimeout = setTimeout(() => { // render container
            cylinderManager.container.el.style.transform = `translateY(${posYContainer}px)`;
         }, 0);
      },
   },
   
   prepare() {
      windowHalfWidth = window.innerWidth / 2;
      this.rotate.calcBasis();
      this.frame.fitHeight();
   }
}; // cylinderManager

cylinderManager.prepare();
setInterval(() => cylinderManager.render.stuff(), cylinderManager.render.RATE);

when('mousemove: window', e => {
   cylinderManager.render.actualX = e.clientX;
});

when('resize: window', e => {
   cylinderManager.prepare();
});

when('scroll: window', e => {
   const actualY = cylinder.getBoundingClientRect().top;
   cylinderManager.render.actualY = actualY;
});
action('scroll: window')();


import './../../Blocks/section/section';
import './../../Blocks/cylinder/cylinder';
import './../../Blocks/blog-block/blog-block';
import './../../Blocks/blog-title/blog-title';
import './../../Blocks/product/product';
import './../../Blocks/product-shop/product-shop';
