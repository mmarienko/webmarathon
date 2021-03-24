class Human {
  constructor(firstName, lastName, gender, age, calories = 500) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.gender = gender;
    this.age = age;
    this.calories = calories;
    this.live();
  }

  sleepFor() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.updateHero("assets/img/sleep.gif");
      this.say("I'm sleeping", "green", "#fff");
      setTimeout(() => {
        this.calories -= 200;
        this.updateCalories();
        this.updateHero();
        if (this.calories > 0) {
          this.say("I'm awake now", "green", "#fff");
        } else {
          this.dead();
        }
      }, 2000);
    }
  }

  feed() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.say("Nom nom", "green", "#fff");
      this.updateHero("assets/img/hero-feed.gif");
      setTimeout(() => {
        this.calories += 200;
        this.updateCalories();
        this.updateHero();
        if (this.calories < 500) {
          this.say("I'm still hungry", "orange");
        } else {
          this.say("I am not hungry", "white");
        }
        if (this.calories < 500) {
          this.say("I'm still hungry", "orange");
        }
        this.updateHero();
      }, 10000);
    }
  }

  live() {
    let live = setInterval(() => {
      this.calories -= 200;
      this.updateCalories();
      this.updateHero();
      if (this.calories <= 300 && this.calories > 0) {
        this.say("I'm hungry", "orange");
      }

      if (this.calories <= 0) {
        this.dead(live);
      }
    }, 60000);
  }

  chill() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.updateHero("assets/img/hero-chill.gif");
      setTimeout(() => {
        this.calories -= 100;
        this.updateCalories();
        this.updateHero();
      }, 3000);
    }
  }

  fight() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.updateHero("assets/img/hero-fight.gif");
      setTimeout(() => {
        this.calories -= 300;
        this.updateCalories();
        this.updateHero();
      }, 3000);
    }
  }

  updateHero(src = "assets/img/hero.gif") {
    if (this.calories <= 0) {
      this.say("I'm dead", "red", "#fff");
      document.getElementById("hero").src = "assets/img/dead.gif";
    } else {
      document.getElementById("hero").src = src;
    }
  }

  dead(live = 0) {
    clearInterval(live);
    this.updateHero("assets/img/dead.gif");
    this.say("I'm dead", "red", "#fff");
  }

  say(message, color = "#fff", text = "#000") {
    document.getElementById("message").innerText = message;
    document.getElementById("message").style.background = color;
    document.getElementById("message").style.color = text;
  }

  updateCalories() {
    document.getElementById("calories").innerText = this.calories;
  }
}

class Superhero extends Human {
  constructor(firstName, lastName, gender, age, calories) {
    super(firstName, lastName, gender, age, calories);
    this.updateHero("assets/img/superhero.gif");
    this.transformation();
  }

  fly() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.updateHero("assets/img/fly.gif");
      setTimeout(() => {
        this.calories -= 100;
        this.updateCalories();
        this.updateHero();
      }, 5000);
    }
  }

  fightWithEvil() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.updateHero("assets/img/fight-with-evil.gif");
      setTimeout(() => {
        this.say("Khhhh-chh... Bang-g-g-g... Evil is defeated!", "red", "#fff");
        this.calories -= 100;
        this.updateCalories();
        this.updateHero();
      }, 4000);
    }
  }

  chill() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.updateHero("assets/img/superhero-chill.gif");
      setTimeout(() => {
        this.calories -= 100;
        this.updateCalories();
        this.updateHero();
      }, 4000);
    }
  }

  feed() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.say("Nom nom", "green", "#fff");
      this.updateHero("assets/img/superhero-feed.gif");
      setTimeout(() => {
        this.calories += 200;
        this.updateCalories();
        this.updateHero();
        if (this.calories < 500) {
          this.say("I'm still hungry", "orange");
        } else {
          this.say("I am not hungry", "white");
        }
        if (this.calories < 500) {
          this.say("I'm still hungry", "orange");
        }
        this.updateHero();
      }, 10000);
    }
  }

  fight() {
    if (this.calories <= 0) {
      this.dead();
    } else {
      this.updateHero("assets/img/superhero-fight.gif");
      setTimeout(() => {
        this.calories -= 300;
        this.updateCalories();
        this.updateHero();
      }, 4000);
    }
  }
  updateHero(src = "assets/img/superhero.gif") {
    if (this.calories <= 0) {
      this.say("I'm dead", "red", "#fff");
      document.getElementById("hero").src = "assets/img/dead.gif";
    } else {
      document.getElementById("hero").src = src;
    }
  }
}

document.getElementById("super").onclick = function () {
  if (human.calories >= 500) {
    document.getElementById("evil").style.display = "block";
    document.getElementById("fly").style.display = "block";
    document.getElementById("super").style.display = "none";
    Human.prototype.transformation = function () {
      if (this.calories <= 0) {
        this.dead();
      } else {
        this.say("I'm transforming", "green", "#fff");
        this.updateHero("assets/img/transformation.gif");
        setTimeout(() => {
          this.updateHero();
        }, 7000);
      }
    };
    human = new Superhero();
  } else if (human.calories > 0 ){
    human.say("I'm hungry", "orange");
  } else {
    human.say("I'm dead", "red", "#fff");
  }
  
};

let human = new Human("Моряк", "Попай", "male", 43);

document.getElementById("firstName").innerText = human.firstName;
document.getElementById("lastName").innerText = human.lastName;
document.getElementById("gender").innerText = human.gender;
document.getElementById("age").innerText = human.age;
document.getElementById("calories").innerText = human.calories;
