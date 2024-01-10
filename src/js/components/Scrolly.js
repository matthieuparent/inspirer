export default class Scrolly {
  constructor(element) {
    this.element = element;
    this.options = {
      rootMargin: '-5% 0px 0% 0px',
      treshold: 0.3,
    };
    console.log(this.options);
    this.init();
  }

  init() {
    this.observer = new IntersectionObserver(
      this.watch.bind(this),
      this.options
    );

    const items = this.element.querySelectorAll('[data-scrolly]');
    for (let i = 0; i < items.length; i++) {
      const item = items[i];
      this.observer.observe(item);
    }
  }

  watch(entries) {
    for (let i = 0; i < entries.length; i++) {
      const entry = entries[i];
      const target = entry.target;

      if (entry.isIntersecting) {
        target.classList.add('is-active');
        // this.observer.unobserve(target);
      } else {
        target.classList.remove('is-active');
      }
    }
  }
}
