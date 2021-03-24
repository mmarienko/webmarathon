function checkBrackets(string) {
  if (typeof(string) !== "string" || !string.match(/[()]/)) {
    return -1;
  }

  let openCount = 0;
  let closeCount = 0;
  for (const key in string.split("")) {
    if(string[key] == '('){
      openCount++;
    } else if(string[key] == ')'){
      if (openCount) {
        openCount--;
      } else {
        closeCount++;
      }
    }
  }

  return openCount + closeCount;
}
