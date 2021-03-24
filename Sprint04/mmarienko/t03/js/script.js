class Slideshow {
   constructor(id, autoPlay = true) {
      this.slider = document.getElementById(id);
      this.slides = this.slider.querySelectorAll(".slider__img");
      this.active = 0;
      this.update();
      if (autoPlay == true) {
         this.autoPlay();
      }
   }

   prev() {
      this.active--;

      if (this.active < 0) {
         this.active = this.slides.length - 1;
      }

      this.update();
   }

   next() {
      this.active++;

      if (this.active > this.slides.length - 1) {
         this.active = 0;
      }

      this.update();
   }

   update() {
      this.slides.forEach((name, id) => {
         name.classList.remove("active");
         if (id == this.active) {
            name.classList.add("active");
            return;
         }
      });
   }

   autoPlay() {
      setInterval(() => {
        this.next();
      }, 3000);
    }
}

let slider = new Slideshow("slider", true);
