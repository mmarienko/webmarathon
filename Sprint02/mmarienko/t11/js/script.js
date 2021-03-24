function removeWords(obj, wrds) {
  let all = [];

  if (obj.words != "") {
    all = obj.words.replace(/\s+/g, " ").trim().split(" ");
  }

  let remove = wrds.replace(/\s+/g, " ").trim().split(" ");
  let filtered = [];

  for (let str of all) {
    if (!filtered.includes(str)) {
      filtered.push(str);
    }
  }

  for (const key in remove) {
    let index = filtered.indexOf(remove[key]);
    filtered.splice(index, 1);
  }

  obj.words = filtered.join(" ");
}

function addWords(obj, wrds) {
  let all = [];

  if (obj.words != "") {
    all = obj.words.replace(/\s+/g, " ").trim().split(" ");
  }

  let add = wrds.replace(/\s+/g, " ").trim().split(" ");
  let filtered = [];

  for (let str of all) {
    if (!filtered.includes(str)) {
      filtered.push(str);
    }
  }

  for (const key in add) {
    let index = filtered.indexOf(add[key]);

    if (index != 0) {
      filtered.push(add[key]);
    } else {
      filtered.splice(index, 1, add[key]);
    }
  }

  obj.words = filtered.join(" ");
}

function changeWords(obj, oldWrds, newWrds) {
  removeWords(obj, oldWrds);
  addWords(obj, newWrds);
}
