function copyObj(obj) {
  let copy = {}; 
  let key;

  for (key in obj) {
    copy[key] = obj[key];
  }
  return copy;
}
 