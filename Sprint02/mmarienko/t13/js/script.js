function Calculator() {
  this.result = 0;
}
Calculator.prototype.init = function(num){
  this.result = num;
  return this;
}
Calculator.prototype.add = function(num){
  this.result += num;
  return this;
}
Calculator.prototype.mul = function(num){
  this.result *= num;
  return this;
}
Calculator.prototype.div = function(num){
  this.result /= num;
  return this;
}
Calculator.prototype.sub = function(num){
  this.result -= num;
  return this;
}
Calculator.prototype.alert = function(num){
  setTimeout(() => alert(this.result), 5000);
}
