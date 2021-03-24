function onIntersection(images) {
   images.forEach((image) => {
      if (image.isIntersecting) {
         counter++;
         observer.unobserve(image.target);
         image.target.src = image.target.dataset.src;
         label.innerText = `${counter} images loaded from ${lazyImages.length}`;
      }
      if (counter == lazyImages.length) {
         label.classList.add("images__label--success")
         setInterval(() => {
            label.classList.add("images__label--d-none")
         }, 3000);
      }
   });
}

let counter = 0;
let lazyImages = [...document.querySelectorAll(".lazy img")];
let label = document.querySelector(".images__label");
let observer = new IntersectionObserver(onIntersection);

lazyImages.forEach((image) => observer.observe(image));
