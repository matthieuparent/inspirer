/** Componsante Filters de TimTools */
export default class Filters {
  /**
   * Méthode constructeur
   * @param {HTMLElement} element - Élément HTML sur lequel la composante est instanciée
   */
  constructor(element) {
    this.element = element;
    this.filtersSelect = this.element.querySelectorAll('[data-filter]');
    this.filterElements = document.querySelectorAll('[data-filter-element]');
    this.countTxt = document.querySelector('[data-count]');

    this.init();
  }

  /**
   * Méthode d'initialisation
   */
  init() {
    for (let i = 0; i < this.filtersSelect.length; i++) {
      const element = this.filtersSelect[i];
      element.addEventListener('change', this.onChange.bind(this));
    }
    this.updateFilters();
  }
  onChange(e) {
    let filters = {
      sector: '',
      location: '',
    };
    let count = 0;

    for (let i = 0; i < this.filtersSelect.length; i++) {
      filters[this.filtersSelect[i].dataset.filter] =
        this.filtersSelect[i].value;
    }

    for (var x = 0; x < this.filterElements.length; x++) {
      const element = this.filterElements[x];
      let display = false;

      if (filters.sector != '') {
        if (filters.location != '') {
          if (
            (element.dataset.filterSector == filters.sector ||
              filters.sector == 'all') &&
            (element.dataset.filterLocation == filters.location ||
              filters.location == 'all')
          ) {
            display = true;
          }
        } else {
          if (
            element.dataset.filterSector == filters.sector ||
            filters.sector == 'all'
          )
            display = true;
        }
      } else if (
        (filters.location != '' &&
          element.dataset.filterLocation == filters.location) ||
        filters.location == 'all'
      ) {
        display = true;
      }

      if (display) {
        element.style.display = 'block';
        count++;
      } else {
        element.style.display = 'none';
      }
    }
    this.updateCount(count);
  }
  updateCount(count) {
    var txt = this.countTxt.dataset.count;
    var s = count <= 1 ? '' : 's';
    txt = txt.replace(/{s}/g, s);
    this.countTxt.innerHTML = txt.split('{xx}').join(count);
    this.updateFilters();
  }
  updateFilters() {
    for (let i = 0; i < this.filtersSelect.length; i++) {
      const element = this.filtersSelect[i];
      console.log(element);
      const options = element.querySelectorAll('option');

      for (let j = 0; j < options.length; j++) {
        if (options[j] && options[j].value != '') {
          const n = this.getFilterCount(
            element.dataset.filter,
            options[j].value
          );
          let t = options[j].text.replace(/ *\([^)]*\) */g, '');
          options[j].innerText = `${t} (${n})`;
        }
      }
    }
  }
  getFilterCount(type, value) {
    console.log(type);

    let filters = {
      sector: '',
      location: '',
    };
    let count = 0;

    if (type == 'location') {
      filters.location = value;
      filters.sector = this.element.querySelector(`[data-filter=sector]`).value;
    } else {
      filters.location = this.element.querySelector(
        `[data-filter=location]`
      ).value;
      filters.sector = value;
    }

    for (let i = 0; i < this.filterElements.length; i++) {
      const element = this.filterElements[i];
      if (filters.sector != '') {
        if (filters.location != '') {
          if (
            (element.dataset.filterSector == filters.sector ||
              filters.sector == 'all') &&
            (element.dataset.filterLocation == filters.location ||
              filters.location == 'all')
          ) {
            count++;
          }
        } else {
          if (
            element.dataset.filterSector == filters.sector ||
            filters.sector == 'all'
          )
            count++;
        }
      } else if (
        (filters.location != '' &&
          element.dataset.filterLocation == filters.location) ||
        filters.location == 'all'
      ) {
        count++;
      }
    }
    return count;
  }
}
