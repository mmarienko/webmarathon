class SuperheroList {
   constructor(tableId = "placeholder", messageId = "notification", array = []) {
      this.array = array;
      this.sortedBy = undefined;
      this.table = document.getElementById(tableId);
		this.message = document.getElementById(messageId);
      this.table.innerHTML = `<table>
											<thead>
												<tr>
													<th onclick="superheroList.sortByName()">Name</th>
													<th onclick="superheroList.sortByStrength()">Strength</th>
													<th onclick="superheroList.sortByAge()">Age</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>`;
   }

   add(name, strength, age) {
      this.array.push({ name, strength, age });
		this.updateTable();
   }

   sortByName() {
      if (this.sortedBy == "nameDESC") {
         this.array.sort((a, b) => (a.name > b.name ? 1 : -1));
         this.sortedBy = "nameASC";
			this.updateMessage("name", "ASC");
      } else {
         this.array.sort((a, b) => (a.name < b.name ? 1 : -1));
         this.sortedBy = "nameDESC";
			this.updateMessage("name", "DESC");
      }
      this.updateTable();
   }

   sortByStrength() {
      if (this.sortedBy == "strengthDESC") {
         this.array.sort((a, b) => (a.strength > b.strength ? 1 : -1));
         this.sortedBy = "strengthASC";
			this.updateMessage("strength", "ASC");
      } else {
         this.array.sort((a, b) => (a.strength < b.strength ? 1 : -1));
         this.sortedBy = "strengthDESC";
			this.updateMessage("strength", "DESC");
      }
      this.updateTable();
   }

   sortByAge() {
      if (this.sortedBy == "ageDESC") {
         this.array.sort((a, b) => (a.age > b.age ? 1 : -1));
         this.sortedBy = "ageASC";
			this.updateMessage("age", "ASC");
      } else {
         this.array.sort((a, b) => (a.age < b.age ? 1 : -1));
         this.sortedBy = "ageDESC";
			this.updateMessage("age", "DESC");
      }
      this.updateTable();
   }

   updateTable() {
      this.table.querySelector("table tbody").innerHTML = null;
      this.array.forEach((superhero) => {
         this.table.querySelector("table tbody").innerHTML += `<tr>
																						<td>${superhero.name}</td>
																						<td>${superhero.strength}</td>
																						<td>${superhero.age}</td>
																					</tr>`;
      });
   }

	updateMessage(parameter, order) {
		this.message.innerText = `Sorting by ${parameter}, order: ${order}.`;
	}
}

let superheroList = new SuperheroList("placeholder", "notification");

superheroList.add("Black Panther", 66, 53);
superheroList.add("Captain America", 79, 137);
superheroList.add("Captain Marvel", 97, 26);
superheroList.add("Hulk", 80, 49);
superheroList.add("Iron Man", 88, 48);
superheroList.add("Spider-Man", 78, 16);
superheroList.add("Thanos", 99, 1000);
superheroList.add("Thor", 95, 1000);
superheroList.add("Yon-Rogg", 73, 52);
