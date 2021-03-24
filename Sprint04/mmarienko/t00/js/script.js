function transformation() {
   let lab = document.getElementById("lab");
   let hero = document.getElementById("hero");

   if (hero.innerText == "Bruce Banner") {
      lab.style.background = "#70964b";
      hero.innerText = "Hulk";
      hero.style.fontSize = "130px";
      hero.style.transition = ".3s";
      hero.style.letterSpacing = "6px";
   } else {
      lab.style.background = "#ffb300";
      hero.innerText = "Bruce Banner";
      hero.style.fontSize = "60px";
      hero.style.letterSpacing = "2px";
   }
}
