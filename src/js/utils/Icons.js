import { Main } from '../../main';

export default class Icons {
  static load(path) {
    path = path || Main.ASSETS_PATH + '/dist/icons/icons.svg';
    fetch(path)
      .then((res) => {
        return res.text();
      })
      .then((data) => {
        const svg = document.createElement('div');
        svg.style.display = 'none';
        svg.innerHTML = data;
        document.body.appendChild(svg);
      });
  }
}
