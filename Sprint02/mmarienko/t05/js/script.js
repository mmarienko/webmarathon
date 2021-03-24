function total(addCount, addPrice, currentTotal = 0) {
  console.log(
      "addCount " + addCount + ', ' +
      "addPrice " + addPrice + ', ' +
      "currentTotal " + currentTotal
  );
  return Number.parseFloat((currentTotal += addCount * addPrice).toFixed(2));
}
