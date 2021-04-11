function validation(_this, event) {
   if (_this.password.value != _this.confirm.value) {
      console.log(_this.password.value, _this.confirm.value);
      alert("Confirm password is wrong");
      event.preventDefault();
   }
}