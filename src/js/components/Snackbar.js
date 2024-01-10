import Cache from '../utils/Cache';

/** Componsante Snackbar de TimTools */
export default class Snackbar {
  /**
   * Méthode constructeur
   * @param {HTMLElement} element - Élément HTML sur lequel la composante est instanciée
   */
  constructor(element) {
    this.element = element;
    this.clearComponent = this.clearComponent.bind(this);
    this.id = this.element.dataset.id || 1;
    this.show = this.show.bind(this);
    this.autoHide = this.element.dataset.autoHide === 'false' ? false : true;
    this.delay = this.element.dataset.delay || 2000;
    this.scrollLimit = this.element.dataset.scrollLimit || 0.1;
    this.isHidden = true;
    this.onScroll = this.onScroll.bind(this);
    this.init();

    // Cache.remove(`snackbar-${this.id}-active`);
  }

  /**
   * Méthode d'initialisation
   */
  init() {
    if (Cache.get(`snackbar-${this.id}-active`) !== 'false') {
      setTimeout(this.show, this.delay);
      this.initAction();
    }
  }

  initAction() {
    if (this.autoHide) {
      window.addEventListener('scroll', this.onScroll);
    }
    const close = this.element.querySelector('.js-close');
    close.addEventListener('click', this.clearComponent);
  }

  show() {
    if (!this.isHidden) return;
    this.isHidden = false;
    document.documentElement.classList.add('snackbar-is-active');
  }
  close() {
    if (this.isHidden) return;
    this.isHidden = true;
    document.documentElement.classList.remove('snackbar-is-active');
  }

  onScroll(e) {
    if (
      document.scrollingElement.scrollTop >
      document.scrollingElement.scrollHeight * this.scrollLimit
    ) {
      this.close();
    } else {
      this.show();
    }
  }
  clearComponent(e) {
    this.close();
    Cache.set(`snackbar-${this.id}-active`, false);
    window.removeEventListener('scroll', this.onScroll);
  }
}
