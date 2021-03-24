let guestList = new WeakSet();
let menu = new Map();
let bankVault = new WeakMap();
let coinCollection = new Set();

let Roma = { name: "Roma", age: 18, status: "student" };
let Alex = { name: "Alex", age: 18, status: "student" };
let Eduard = { name: "Eduard", age: 19, status: "student" };
let Maria = { name: "Maria", age: 25, status: "no-student" };
let Pasha = { name: "Pasha", age: 26, status: "no-student" };
let Irina = { name: "Irina", age: 27, status: "no-student" };

console.log('====guestList===');
console.log(guestList);
guestList.add(Roma);
guestList.add(Alex);
guestList.add(Eduard);
guestList.add(Maria);
guestList.add(Pasha);
guestList.add(Irina);
console.log('add element = ' + guestList.has(Roma));
console.log('remove element = ' + guestList.delete(Roma));
console.log('find element = ' + guestList.has(Roma));
console.log('get size = ' + guestList.size);

console.log('====menu===');
console.log(menu);
menu.set('soup', 20);
menu.set('buckwheat', 15);
menu.set('bread', 2);
menu.set('water', 13);
menu.set('eggs', 8);
for (const [iterator, value] of menu) {console.log(iterator, value);}
console.log('add element = ' + menu.has('soup'));
console.log('remove element = ' + menu.delete('soup'));
console.log('find element = ' + menu.has('soup'));
console.log('get size = ' + menu.size);
menu.clear();
console.log('clear');
for (const [iterator, value] of menu) {console.log(iterator, value);}

console.log('====bankVault===');
console.log(bankVault);
bankVault.set(Roma, "11111");
bankVault.set(Alex, "312312");
bankVault.set(Eduard, "42345256354");
bankVault.set(Maria, "36386538");
bankVault.set(Pasha, "53177175");
bankVault.set(Irina, "1754745457");

console.log('add element = ' + bankVault.has(Roma));
console.log('remove element = ' + bankVault.delete(Roma));
console.log('find element = ' + bankVault.has(Roma));
console.log('get size = ' + bankVault.size);

console.log('====coinCollection===');
console.log(coinCollection);
coinCollection.add(Roma);
coinCollection.add(Alex);
coinCollection.add(Eduard);
coinCollection.add(Maria);
coinCollection.add(Pasha);
coinCollection.add(Irina);
for (const value of coinCollection) {console.log(value);}
console.log('add element = ' + coinCollection.has(Roma));
console.log('remove element = ' + coinCollection.delete(Roma));
console.log('find element = ' + coinCollection.has(Roma));
console.log('get size = ' + coinCollection.size);
coinCollection.clear();
console.log('clear');
for (const value of coinCollection) {console.log(value);}