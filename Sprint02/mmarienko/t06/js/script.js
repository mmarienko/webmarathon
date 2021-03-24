function greeting() {
  String.prototype.capitalize = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
  };

  var fio = prompt("Enter first name and last name");
  var [first, last] = fio.split(" ");

  if (containsDigit(first) || containsDigit(last)) {
    alert("Wrong input!");
    console.log("Wrong input!");
    return;
  }

  alert(first.capitalize() + ' ' + last.capitalize());
  console.log(first.capitalize(), last.capitalize());
}

function containsDigit(string) {
  for (const key in string.split("")) {
    if(!isNaN(string[key])){
      return true;
    }
    if (string[key].match(/^[a-zA-Z]+$/) == null) {
      return true;
    };
  }
}

greeting();
