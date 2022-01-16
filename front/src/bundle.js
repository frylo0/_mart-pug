const importer = require('../env/webpack.importer');

const imported = importer([
  require.context('./Logic/', true, /\.js$/),
  require.context('./Attach/', true, /\./),
]);


import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/dist/backdrop.css';
import 'tippy.js/dist/border.css';
import 'tippy.js/themes/light.css';
import 'tippy.js/animations/shift-away-subtle.css';

$('figure').on('click', e => {
  $(e.currentTarget).toggleClass('figure_opened');
});
const figureTippy = tippy('figure', {
  content: 'Нажмите чтобы развернуть/свернуть',
  theme: 'light',
  popperOptions: {
    strategy: 'fixed',
  }
});


import './Basic/link/link';
import './Basic/devicer/devicer';
import './Basic/title/title';
import './Basic/button/button';
import './Blocks/header/header';
import './Blocks/footer/footer';
import './Blocks/scroll-top-button/scroll-top-button';
import './Basic/arrow/arrow';
import './Basic/select/select';
import './Basic/arrow-small/arrow-small';
import './Basic/diashad/diashad';
import './Basic/input-controls/input-controls';
import './Basic/favicon/favicon';
