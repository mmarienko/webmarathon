function sortEvenOdd(arr) {
  arr.sort((a, b) => {
    return a % 2 == 0 && b % 2 != 0 ? -1 : a % 2 != 0 && b % 2 == 0 ? 1 : a - b;
  });
}
