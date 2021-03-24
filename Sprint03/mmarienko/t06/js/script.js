let index = result = 1, step = generator();

function* generator(value) {
  if (value >= 10000) {
    value = 1;
  }
  index += value;
  yield index;
}

for (;;) {
  let number = +prompt(`Previous result: ${result} Enter a new number:`);
  if (!isNaN(number)) {
    step = generator(number);
    result = step.next().value;
  } else {
    console.error("Invalid number!");
    break;
  }
}
