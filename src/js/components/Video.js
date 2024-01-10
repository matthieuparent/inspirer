export default class Video {
  constructor(element) {
    this.element = element;

    this.videoContainer = this.element.querySelector('.js-video'); // 1
    this.poster = this.element.querySelector('.js-poster'); // 2
    this.videoId = this.element.dataset.videoId; // 1
    this.controls = this.element.dataset.controls == 'false' ? 0 : 1; // x
    this.autoplay = this.poster ? 1 : 0; // 3
    this.playerReady = false;

    Video.instances.push(this);

    // 1
    if (this.videoId) {
      Video.loadScript(); // 1 this.loadScript();
    } else {
      console.log('Vous devez spécifier un id');
    }
  }

  init() {
    // document.documentElement.classList.add('is-video-ready'); // 1

    this.initPlayer = this.initPlayer.bind(this); // 2

    if (this.poster) {
      // 2
      this.element.addEventListener('click', this.initPlayer); // 2
    } else {
      this.initPlayer(); // 1 mettre code ici
    }
  }

  // 3
  watch(entries) {
    if (this.player && !entries[0].isIntersecting) {
      console.log('test');
      this.player.pauseVideo();
    }
  }

  initPlayer(event) {
    if (event) {
      // 2
      this.element.removeEventListener('click', this.initPlayer);
    }

    // Classe d'état lorsque la video joue
    this.element.classList.add('is-ready'); // 2 (avec poster image, cursor)

    // 1
    this.player = new YT.Player(this.videoContainer, {
      height: '100%',
      width: '100%',
      videoId: this.videoId,
      playerVars: { rel: 0, autoplay: this.autoplay, controls: this.controls },
      events: {
        // 3
        onReady: (event) => {
          this.playerReady = true;
          const observer = new IntersectionObserver(this.watch.bind(this), {
            rootMargin: '0px 0px 0px 0px',
          });
          observer.observe(this.element);
        },
        onStateChange: (event) => {
          if (event.data == YT.PlayerState.PLAYING) {
            Video.pauseAll(this);
          } else if (event.data == YT.PlayerState.ENDED) {
            this.player.seekTo(0);
            this.player.pauseVideo();
          }
        },
      },
    });
  }

  static pauseAll(currentInstance) {
    // 3
    for (let i = 0; i < Video.instances.length; i++) {
      const instance = Video.instances[i];
      if (instance.playerReady && currentInstance !== instance) {
        instance.player.pauseVideo();
      }
    }
  }

  static loadScript(url) {
    // window.onYouTubeIframeAPIReady = this.init();
    // 1 (pas en static, avec this)
    // 3 le passer en static
    if (!Video.scriptIsLoading) {
      Video.scriptIsLoading = true;

      const script = document.createElement('script');
      script.src = 'https://www.youtube.com/iframe_api';
      script.id = 'youtube';
      document.body.appendChild(script);
    }
  }

  static initAll() {
    // 3
    for (let i = 0; i < Video.instances.length; i++) {
      const instance = Video.instances[i];
      instance.init();
    }

    document.documentElement.classList.add('is-video-ready'); // 3 retirer celui de initPlayer
  }
}

Video.instances = [];
window.onYouTubeIframeAPIReady = Video.initAll;
