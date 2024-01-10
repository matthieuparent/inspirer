import Carousel from './components/Carousel';
import Scrolly from './components/Scrolly';
import Video from './components/Video';
import Header from './components/Header';
import Accordion from './components/Accordion';
import Filters from './components/Filters';

export default class ComponentFactory {
  constructor() {
    this.componentInstances = [];
    this.componentList = {
      Carousel,
      Scrolly,
      Video,
      Header,
      Accordion,
      Filters,
    };
    this.init();
  }

  init() {
    const components = document.querySelectorAll('[data-component]');

    for (let i = 0; i < components.length; i++) {
      const element = components[i];
      const componentName = element.dataset.component;
      if (this.componentList[componentName]) {
        const instance = new this.componentList[componentName](element);
        this.componentInstances.push(instance);
      } else {
        console.log(`La composante ${componentName} n'existe pas`);
      }
    }
  }
}