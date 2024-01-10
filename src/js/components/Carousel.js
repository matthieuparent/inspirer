import Swiper from 'swiper/bundle';

/** Composante Carousel de Timtools */
export default class Carousel {
  /**
   * Méthode constructeur
   * @param {HTMLElement} element - Élément HTML sur lequel la composante est instanciée
   */
  constructor(element) {
    this.element = element;

    // Options par défaut pour la librairie Swiper
    this.defaultOptions = {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    };

    this.init();
  }

  /**
   * Méthode d'initialisation
   */
  init() {
    let options = this.defaultOptions;

    // Gestion des paramètres différents lorsqu'on veut avoir
    // 2 slides visibles sur grand écran et une seule sur petit écran
    if (this.element.dataset.carouselType == 'three-col') {
      options = {
        ...this.defaultOptions,
        ...{
          slidesPerView: 2,
          loop: false,
          breakpoints: {
            768: {
              slidesPerView: 3,
            },
            1200: {
              slidesPerView: 4,
            },
            1920: {
              slidesPerView: 5,
            },
          },
        },
      };
    }

    if (this.element.dataset.carouselType == 'itunes') {
      options = {
        ...this.defaultOptions,
        ...{
          slidesPerView: 2,
          loop: true,
          pagination: {
            el: '.swiper-pagination',
          },
          centeredSlides: true,
          breakpoints: {
            768: {
              slidesPerView: 3,
            },
          },
        },
      };
    }

    // Instanciation d'un nouveau Swiper avec les options
    new Swiper(this.element, options);
  }
}
