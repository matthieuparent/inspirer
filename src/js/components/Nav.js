/** Componsante Nav de TimTools */
export default class Nav {

  /**
  * Méthode constructeur
  * @param {HTMLElement} element - Élément HTML sur lequel la composante est instanciée
  */
  constructor(element) {
    this.element = element;
    this.sections = document.querySelectorAll('[data-section]');
    this.menu = this.element.querySelectorAll('[data-menu]');
    this.currentSection ="";
    this.options = {
        rootMargin: '-50% 0px -50% 0px',
        treshold: .2
      };

      this.init();
    }
  
    init() {

    for (let i = 0; i < this.menu.length; i++) {
        const menuitem = this.menu[i];
        menuitem.addEventListener('click', this.scrollTo.bind(this));
    }  
      this.observer = new IntersectionObserver(
        this.watch.bind(this),
        this.options
      );
  
      
      for (let i = 0; i < this.sections.length; i++) {
        const item = this.sections[i];
        this.observer.observe(item);
      }
    }

    scrollTo(e) {
        e.preventDefault();
        const item = e.currentTarget;
        console.log(item.dataset.menu)
        const scrollToElement = document.querySelector(`[data-section="${item.dataset.menu}"]`)
        // scrollToElement.scrollIntoView({ behavior: "smooth",block:"center"});
        scroll({
            top: scrollToElement.offsetTop - 100,
            behavior: "smooth"
          });
    } 

    watch(entries) {
        for (let i = 0; i < entries.length; i++) {
          const entry = entries[i];
          const target = entry.target;
          if (entry.isIntersecting) {
            this.currentSection = target.dataset.section;
            this.removeCurrent();
          } 
        }
    }
    removeCurrent() {
        for (let i = 0; i < this.menu.length; i++) {
            const element = this.menu[i];
            if(element.dataset.menu == this.currentSection) {
                element.classList.add('active');
            } else {
                element.classList.remove('active');
            }
        }
    }
}