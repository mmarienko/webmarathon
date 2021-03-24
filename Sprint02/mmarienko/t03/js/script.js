let number;

do {
  number = prompt("Enter 1-10");
} while (number > 10 || number < 1  || !Number.isFinite(number));

switch (number) {
  case "1":
    alert("Back to square 1");
    break;
  case "2":
    alert("Goody 2-shoes");
    break;
  case "3":
  case "6":
    alert("Two's company, three's a crowd");
    break;
  case "4":
  case "9":
    alert("Counting sheep");
    break;
  case "5":
    alert("Take five");
    break;
  case "7":
    alert("Seventh heaven");
    break;
  case "8":
    alert("Behind the eight-ball");
    break;
  case "10":
    alert("Cheaper by the dozen");
    break;
}
