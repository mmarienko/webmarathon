var _number = 1;
var _bigInt = 1n;
var _string = 'I want to lern React.js, Node.js, Vue.js, Laravel and other progresive frameworks';
var _boolean = true;
var _null = null;
var _undefined = undefined;
var _object = {};
var _symbol = Symbol();
var _function = function(){};

alert(
  _number + ' is ' +  typeof(_number) + '\n' +
  _bigInt + ' is ' +  typeof(_bigInt) + '\n' +
  _string + ' is ' +  typeof(_string) + '\n' +
  _boolean + ' is ' +  typeof(_boolean) + '\n' +
  _null + ' is ' +  typeof(_null) + '\n' +
  _undefined + ' is ' +  typeof(_undefined) + '\n' +
  _object + ' is ' +  typeof(_object) + '\n' +
  _symbol.toString() + ' is ' +  typeof(_symbol) + '\n' +
  _function + ' is ' +  typeof(_function) + '\n'
);