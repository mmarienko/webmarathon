class DragNDrop {
   constructor(item, status = false) {
      this.item = item;
      this.status = status;
      this.item.addEventListener("click", (e) => {
         this.toggleActive(e);
      });
      this.item.addEventListener("mousemove", (e) => {
         if (this.status) this.onMouseMove(e);
      });
   }

   toggleActive(e){
      this.status = this.status ? false : true;
      this.item.classList.toggle("active");
      if (this.status) this.onMouseMove(e);
   }

   moveAt(pageX, pageY) {
      this.item.style.left = pageX - this.item.offsetWidth / 2 + "px";
      this.item.style.top = pageY - this.item.offsetHeight / 2 + "px";
   }

   onMouseMove(event) {
      this.item.style.zIndex = "500";
      console.log(this.item.style.zIndex);
      this.moveAt(event.pageX, event.pageY);
   }
}

document.querySelectorAll(".stones__item").forEach((item) => {
   new DragNDrop(item);
});
