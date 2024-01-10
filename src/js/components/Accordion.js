import { gsap } from 'gsap';

/** Componsante Accordion de TimTools */
export default class Accordion {
  /**
   * Méthode constructeur
   * @param {HTMLElement} element - Élément HTML sur lequel la composante est instanciée
   */
  constructor(element) {
    this.element = element;
    this.questions = this.element.querySelectorAll('.question');
    this.init();
  }

  /**
   * Méthode d'initialisation
   */
  init() {
    for (let i = 0; i < this.questions.length; i++) {
      const question = this.questions[i];
      question.addEventListener('click', this.openQuestion.bind(this));
      if (!question.classList.contains('open')) {
        gsap.set(question.querySelector('.question__reponse'), { height: 0 });
      }
    }

    this.links = Array.from(this.element.querySelectorAll('.question a'));
    this.links.forEach((element) => {
      element.addEventListener('click', (evt) => {
        evt.stopPropagation();
      });
    });
  }

  openQuestion(evt) {
    const currentTarget = evt.currentTarget;

    if (currentTarget.classList.contains('open')) {
      currentTarget.classList.remove('open');
      gsap.to(currentTarget.querySelector('.question__reponse'), {
        duration: 0.5,
        ease: 'quad.out',
        height: 0,
      });
    } else {
      currentTarget.classList.add('open');
      gsap.set(currentTarget.querySelector('.question__reponse'), {
        height: 'auto',
      });
      gsap.from(currentTarget.querySelector('.question__reponse'), {
        duration: 0.5,
        ease: 'quad.out',
        height: 0,
      });
    }
  }
}
