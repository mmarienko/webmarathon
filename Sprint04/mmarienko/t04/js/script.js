function tabChange(_this, target) {
   const trigger = _this.parentNode.dataset.trigger;
   const content = _this.parentNode.dataset.content;

   document.querySelectorAll(trigger).forEach(item => {
         item.classList.remove('active');
   });

   document.querySelectorAll(content).forEach(item => {
         item.classList.remove('active');
   });

   _this.classList.add('active');
   document.getElementById(target).classList.add('active');
};