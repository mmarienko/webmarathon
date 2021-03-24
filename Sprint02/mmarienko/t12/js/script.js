function concat(string1, string2) {
  concat2.count = 0;

  function concat2() {
    concat2.count++;
    let message = prompt("Print second string");
    return message == null ? string1 : string1 + " " + message;
  }

  return string2 == undefined ? concat2 : string1 + " " + string2;
}
