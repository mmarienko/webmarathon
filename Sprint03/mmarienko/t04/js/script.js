let houseMixin = {
  wordReplace(first, second) {
    this.description = this.description.replace(first, second);
  },
  wordInsertAfter(first, second) {
    this.description = this.description.replace(first, first + " " + second);
  },
  wordDelete(word) {
    this.description = this.description.replace(word, "");
  },
  wordEncrypt() {
    var input = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    var output = "NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm";
    var index = (x) => input.indexOf(x);
    var translate = (x) => (index(x) > -1 ? output[index(x)] : x);
    this.description = this.description.split("").map(translate).join("");
  },
  wordDecrypt() {
    this.wordEncrypt();
  },
};

///////////////////////////////

const house = new HouseBuilder(
  "88 Crescent Avenue",
  "Spacious town house with wood flooring, 2-car garage, and a back patio.",
  "J. Smith",
  110,
  5
);

Object.assign(house, houseMixin);

console.log(house.getDaysToBuild());
// 220
console.log(house.description);
// Spacious town house with wood flooring, 2-car garage, and a back patio.
house.wordReplace("wood", "tile");
console.log(house.description);
// Spacious town house with tile flooring, 2-car garage, and a back patio.
house.wordDelete("town ");
console.log(house.description);
// Spacious house with tile flooring, 2-car garage, and a back patio.
house.wordInsertAfter("with", "marble");
console.log(house.description);
// Spacious house with marble tile flooring, 2-car garage, and a back patio.
house.wordEncrypt();
console.log(house.description);
// Fcnpvbhf ubhfr jvgu zneoyr gvyr sybbevat, 2-pne tnentr, naq n onpx cngvb.
house.wordDecrypt();
console.log(house.description);
// Spacious house with marble tile flooring, 2-car garage, and a back patio.
