document.addEventListener("DOMContentLoaded", function () {
   let list = document.querySelectorAll("#characters li");
   list.forEach((li) => {
      if (
         !li.classList.contains("good") &&
         !li.classList.contains("evil") &&
         !li.classList.contains("unknown")
      ) {
         li.className = "unknown";
      }
      if (li.dataset.element == undefined) {
         li.dataset.element = "none";
      }
      let attr = li.dataset.element.split(" ");
      li.innerHTML += "<br>";
      for (let i = 0; i < attr.length; i++) {
         li.innerHTML += `<div class="elem ${attr[i]}"></div>`;
         if (li.dataset.element == "none") {
            li.querySelector("div").innerHTML += `<div class="line"></div>`;
         }
      }
   });
});
