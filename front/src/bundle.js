const importer = require('../webpack.importer');

const imported = importer([
  require.context('./Logic/', true, /\.js$/),
  require.context('./Attach/', true, /\./),
]);

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
