fetch(
   "http://api.openweathermap.org/data/2.5/onecall?lat=47.8376&lon=35.1299&lang=eu&appid=8dff50be2c3d057256c433410b7a89d0"
)
   .then((response) => {
      return response.json();
   })
   .then((data) => {
      let weather = new Weather("weather", "Europe/Zaporozhye");
      for (let i = 0; i < 7; i++) {
         weather.add(data, i);
      }
   });

class Weather {
   constructor(id, title, array = []) {
      this.array = array;
      this.html = document.getElementById(id);
      this.html.innerHTML = `<div class"weather">
											<div class="weather__header">
                                    <h3 class="weather__title">${title}</h3>
											</div>
											<div class="weather__body">
											</div>
										</div>`;
   }

   add(data, i) {
      let date = `${new Date(data.daily[i].dt * 1000).toLocaleDateString("ru-RU")}`;
      let img = `http://openweathermap.org/img/wn/${data.daily[i].weather[0].icon}@2x.png`;
      let temp = `${(data.daily[i].temp.day - 273).toFixed()}°`;
      this.array.push({ date, img, temp });
		this.update();
   }

   update() {
      this.html.querySelector(".weather__body").innerHTML = null;
      this.array.forEach((item) => {
         this.html.querySelector(".weather__body").innerHTML += `<div class="weather__item">
                                                                     <div class="weather__item-header">${item.date}</div>
                                                                     <div class="weather__item-body"><img src="${item.img}"></div>
                                                                     <div class="weather__item-footer">${item.temp}</div>
                                                                  </div>`;
      });
   }
}

