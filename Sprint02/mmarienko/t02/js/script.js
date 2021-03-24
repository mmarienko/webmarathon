function myhero() {
  var animal, gender, age, description;

  animal = prompt("What animal is the superhero most similar to?");

  if (!/^[a-zA-Z]{1,20}$/.test(animal)) {
    alert("error");
    return;
  }

  gender = prompt(
    "Is the superhero male or female? Leave blank if unknown or other"
  );

  if (!/^(male|female|)$/.test(gender)) {
    alert("error");
    return;
  }

  age = prompt("How old is the superhero?");

  if (!/^(?!0)[0-9]{1,5}$/.test(age)) {
    alert("error");
    return;
  }

  if (age < 18 && gender.toLowerCase() == "male") {
    description = "boy";
  } else if (age < 18 && gender.toLowerCase() == "female") {
    description = "girl";
  } else if (age < 18 && gender.toLowerCase() == "") {
    description = "kid";
  } else if (age > 18 && gender.toLowerCase() == "male") {
    description = "man";
  } else if (age > 18 && gender.toLowerCase() == "female") {
    description = "woman";
  } else if (age > 18 && gender.toLowerCase() == "") {
    description = "hero";
  }

  alert("The superhero name is: " + animal + "-" + description + "!");
}

myhero();
