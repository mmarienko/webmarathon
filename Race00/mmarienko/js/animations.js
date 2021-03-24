function addActive(_this) {
	let popup = _this.parentNode;
	popup.classList.toggle("active");
	popup.querySelector(".btn").classList.toggle("active");
	// document.querySelector(".contentBlocker").classList.toggle("active");
}

function changeSys(el) {
	let buf = currentSys.querySelector("a").innerHTML
	currentSys.querySelector("a").innerHTML = el.innerHTML;
	el.innerHTML = buf;
	systemActiveSwitcher();

	document.querySelectorAll(".operation").forEach(element => {
		element.classList.remove("disable")
	});
	document.querySelectorAll(".number").forEach(element => {
		element.classList.remove("disable")
	});
	document.querySelectorAll(".symbol").forEach(element => {
		element.classList.remove("disable")
	});
	document.querySelector("#popup.reverse").style.display = "none";

	if (currentSys.querySelector("a").innerHTML == "BIN") {
		document.querySelectorAll(".operation").forEach(element => {
			if (element.innerText != "C" && element.innerText !=  "/" && element.innerText !=  "=" && element.innerText != "xˆn"    && element.innerText != "x!" && element.innerText != "M-"   && element.innerText != "M+" && element.innerText != ")" && element.innerText !=  "(") {
				element.classList.add("disable");
			}
		});
		document.querySelectorAll(".number").forEach(element => {
			if (element.innerText != "1" && element.innerText !=  "0" && element.innerText != "*" && element.innerText !=  "-" && element.innerText !=  "+" && element.id != "backspace") {
				element.classList.add("disable");
			}
		});
		document.querySelectorAll(".symbol").forEach(element => {
			if (true) {
				element.classList.add("disable");
			}
		});
	}

	if (currentSys.querySelector("a").innerHTML == "HEX") {
		document.querySelectorAll(".operation").forEach(element => {
			if (element.innerText != "C" && element.innerText !=  "±" && element.innerText !=  "/" && element.innerText !=  "=" && element.innerText != "xˆn" && element.innerText != "x!" && element.innerText != "A" && element.innerText != "B" && element.innerText != "C" && element.innerText != "D" && element.innerText != "E"  && element.innerText != "F"   && element.innerText != "M-"   && element.innerText != "M+" && element.innerText != ")" && element.innerText !=  "(") {
				element.classList.add("disable");
			}
		});
		document.querySelectorAll(".number").forEach(element => {
			if (element.innerText != "1" && element.innerText !=  "0" && element.innerText != "2" && element.innerText !=  "3" && element.innerText != "4" && element.innerText !=  "5" && element.innerText != "6" && element.innerText !=  "7" && element.innerText != "8" && element.innerText !=  "9" && element.innerText != "*" && element.innerText !=  "-" && element.innerText !=  "+" && element.id != "backspace") {
				element.classList.add("disable");
			}
		});
		document.querySelectorAll(".symbol").forEach(element => {
			if (true) {
				element.classList.add("disable");
			}
		});
		document.querySelector("#popup.reverse").style.display = "block";
	}
	document.querySelector("#result_str").value = "0"
}

function systemActiveSwitcher() {
	document.getElementById('cooseOf').classList.toggle('active'); 
   	document.getElementById('currentSys').classList.toggle('active');
}