class Timer {
  constructor(title, delay, stopCount) {
    this.title = title;
    this.delay = delay;
    this.stopCount = stopCount;
  }

  start() {
    console.log(`Timer ${this.title} started (delay=${this.delay}, stopCount="${this.stopCount})`);
    let count = this.stopCount - 1;
    let timer = setInterval(() => {
      this.tick(count);
      count--;
      if (count < 0) {
        this.stop(timer);
      }
    }, this.delay);
  }

  tick(cycle) {
    console.log(`Timer ${this.title} Tick! | cycles left ${cycle}`);
  }

  stop(timer) {
    clearInterval(timer);
    console.log(`Timer ${this.title} stopped`);
  }
}

function runTimer(id, delay, counter) {
  let timer = new Timer(id, delay, counter);
  timer.start();
}

runTimer("Bleep", 1000, 5);

/*
Console output:

Timer Bleep started (delay=1000,  stopCount=5)
Timer Bleep Tick! | cycles left 4
Timer Bleep Tick! | cycles left 3
Timer Bleep Tick! | cycles left 2
Timer Bleep Tick! | cycles left 1
Timer Bleep Tick! | cycles left 0
Timer Bleep stopped
*/
