function cambia_color(){
	let x = document.getElementById("preguntas");
	x.style.color = "darkgreen";
	x.style.backgroundColor = "rgba(70,50,100,.3)";
	x.style.fontSize = "20px";
}

function cambia_rojo(){
	let x = document.getElementById("preguntas");
	x.style.color = "red";
	x.style.backgroundColor = "rgba(50,150,100,.3)";
	x.style.fontSize = "22px";
}

function infoPop(){
	document.getElementById("info").style.visibility = "visible";
}
function ocultaInfo(){
	document.getElementById("info").style.visibility = "hidden";
}

function chCol(){
	let x = document.getElementsByClassName("titu");
	document.getElementById("act").disabled = true;
	setInterval(function(){
		let y = Math.floor((Math.random()*3)+1);
		
		if (y == 1) {
			for (let i = 0; i < x.length; i++){
				x[i].style.color = "red";
			}
		}else if (y == 2) {
			for (let i = 0; i < x.length; i++){
				x[i].style.color = "green";
			}
		}
		else if (y == 3) {
			for (let i = 0; i < x.length; i++){
				x[i].style.color = "yellow";
			}
		}
	}, 300);
}

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}
function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}