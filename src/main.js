import './styles/main.scss';

import ComponentFactory from './js/ComponentFactory';
import Icons from './js/utils/Icons';
// import
export class Main {
  constructor() {
    Main.ASSETS_PATH = config.templateUrl;
    this.init();
  }
  init() {
    document.documentElement.classList.add('has-js');

    setTimeout(Icons.load, 1000);

    this.componentFactory = new ComponentFactory();
  }
}
const main = new Main();
