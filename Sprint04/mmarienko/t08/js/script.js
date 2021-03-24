let word = document.getElementById("word"),
   text = document.getElementById("text"),
   output = document.getElementById("output"),
   phoneSpan = document.getElementById("phone"),
   countSpan = document.getElementById("count"),
   replaceSpan = document.getElementById("replace"),
   phone = 0,
   count = 0,
   replace = 0;
   
function parsePhone() {
   let e = word.value.trim();
   validation(e) ||
      (e.match(/^\d{10}$/g)
         ? (output.value = `${e.slice(0, 3)}-${e.slice(3, 6)}-${e.slice( 6, 10 )}`)
         : (output.value = "Invalid phone number."),
      (phoneSpan.innerText = `To phone number ${phone++}`),
      (document.cookie = `phone=${phone}`));
}
function wordCount() {
   let e = word.value.trim();
   validation(e, text.value.trim()) ||
      (e.match(/^\w+$/gi)
         ? (output.value = "Word count: " + (text.value.match(new RegExp(`${e}`, "g")) || []).length)
         : (output.value = "Invalid input."),
      (countSpan.innerText = `Word count [${count++}]`),
      (document.cookie = `count=${count}`));
}
function wordReplace() {
   let e = word.value.trim(),
      t = text.value.trim();
   validation(e, t) ||
      (e.match(/^\w+$/gi)
         ? (output.value = t.replace(/\S+/g, e))
         : (output.value = "Invalid input."),
      (replaceSpan.innerText = `Word replace [${replace++}]`),
      (document.cookie = `replace=${replace}`));
}
function validation(e, t) {
   return "" === word.value || 0 === e.length
      ? (alert('Word input is empty. Try to input something in "Word input".'), !0)
      : void 0 !== t &&
           ("" === text.value || 0 === t.length) && (alert( 'Text iInput is empty. Try to input something in "Text input".'), !0);
}
function setCookies() {
   (phone = 0),
      (count = 0),
      (replace = 0),
      (document.cookie = "phone=0"),
      (document.cookie = "count=0"),
      (document.cookie = "replace=0"),
      (word.value = ""),
      (text.value = ""),
      (output.value = ""),
      updateCounters();
}
function getCookies() {
   return document.cookie.split(";").reduce((e, t) => {
      const [o, n] = t.trim().split("=").map(decodeURIComponent);
      try {
         return Object.assign(e, { [o]: JSON.parse(n) });
      } catch (t) {
         return Object.assign(e, { [o]: n });
      }
   }, {});
}
function updateCounters() {
   (phoneSpan.innerText = `To phone number [${phone++}]`),
      (countSpan.innerText = `Word count [${count++}]`),
      (replaceSpan.innerText = `Word replace [${replace++}]`);
}
let cookies = getCookies();
void 0 === cookies.phone
   ? setCookies()
   : ((phone = cookies.phone),
     (count = cookies.count),
     (replace = cookies.replace),
     updateCounters()),
   setInterval(setCookies, 6e4);
