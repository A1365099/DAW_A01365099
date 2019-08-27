var prM=0;
var prP=0;
var prN=0;
var prT = 0;

function validar(){
	let pass = document.getElementById("passw").value;
	let valid = document.getElementById("val").value;
	if (pass == valid) {
		alert("Contraseña correcta");
	}else{
		alert("Contraseña incorrecta");
	}
	
}

function fruta(sele){
	//document.write("Seleccioando");
//	var selected = document.getElementById(sele);
	if (sele == "sm" && document.getElementById("km").disabled == true) {
		document.getElementById("km").disabled = false;
	}else if (sele == "sm" && document.getElementById("km").disabled == false) {
		document.getElementById("km").disabled = true;
		document.getElementById("km").value = 0;
		document.getElementById("manz").innerHTML = "";
		prM = 0;
		total();
	}
	if (sele == "sp" && document.getElementById("kp").disabled == true) {
		document.getElementById("kp").disabled = false;
	}else if (sele == "sp" && document.getElementById("kp").disabled == false) {
		document.getElementById("kp").disabled = true;
		document.getElementById("kp").value = 0;
		document.getElementById("plat").innerHTML = "";
		prP = 0;
		total();
	}
	if (sele == "sn" && document.getElementById("kn").disabled == true) {
		document.getElementById("kn").disabled = false;
	}else if (sele == "sn" && document.getElementById("kn").disabled == false) {
		document.getElementById("kn").disabled = true;
		document.getElementById("kn").value = 0;
		document.getElementById("nar").innerHTML = "";
		prN = 0;
		total();
	}
}

function precio(pri){

	let prize = document.getElementById(pri).value;
	if (pri == "km" && document.getElementById("km").disabled == false) {
		prM = 16*prize;
		document.getElementById("manz").innerHTML = "Precio de manzana = $"+prM;
	}
	if (pri == "kp" && document.getElementById("kp").disabled == false) {
		prP = 12*prize;
		document.getElementById("plat").innerHTML = "Precio de platano = $"+prP;
	}
	if (pri == "kn" && document.getElementById("kn").disabled == false) {
		prN = 23*prize;
		document.getElementById("nar").innerHTML = "Precio de Naranja = $"+prN;
	}
	document.getElementById("compra").disabled = false;
	total();
	//document.getElementById("manz").innerHTML = "Precio de manzana = $"+prize;
}

function total(){
	prT = prN+prP+prM;
	document.getElementById("total").innerHTML = "Precio Total = $"+prT;
}

function compra(){
	window.location.href = "Lab5.html";
	alert("Gracias por su compra!");
}

function solucion(form){
	var inputs = form.getElementsByTagName('input');
	let name = document.getElementById("name").value;
	let age = document.getElementById("age").value;
	let est = document.getElementById("est").value;
	let peso = document.getElementById("peso").value;
	for (var i = 0; i < inputs.length; i++) {
        // only validate the inputs that have the required attribute
        if(inputs[i].hasAttribute("required")){
            if(inputs[i].value == ""){
                // found an empty field that is required
                alert("Llena todos los campos");
                return false;
            }
        }
    }
   
    if (est >= 156 && est <= 157) {
    		if (peso < 59 ) {
    			alert(name+", Alimentate bien, estás bajo de peso!");
    		}else if (peso > 64) {
    			alert(name+", Haz dieta, estás arriba de tu peso!");
    		}else{
    			alert(name+", Estás en tu peso ideal :D")
    		}
    }else if (est >= 158 && est <= 163) {
    		if (peso < 60 ) {
    			alert(name+", Alimentate bien, estás bajo de peso!");
    		}else if (peso > 65) {
    			alert(name+", Haz dieta, estás arriba de tu peso!");
    		}else{
    			alert(name+", Estás en tu peso ideal :D")
    		}
    }else if (est >= 164 && est <= 168) {
    		if (peso < 63 ) {
    			alert(name+", Alimentate bien, estás bajo de peso!");
    		}else if (peso > 68) {
    			alert(name+", Haz dieta, estás arriba de tu peso!");
    		}else{
    			alert(name+", Estás en tu peso ideal :D")
    		}
    }else if (est >= 169 && est <= 175) {
    		if (peso < 65 ) {
    			alert(name+", Alimentate bien, estás bajo de peso!");
    		}else if (peso > 72) {
    			alert(name+", Haz dieta, estás arriba de tu peso!");
    		}else{
    			alert(name+", Estás en tu peso ideal :D")
    		}
    }else if (est >= 176 && est <= 183) {
    		if (peso < 68 ) {
    			alert(name+", Alimentate bien, estás bajo de peso!");
    		}else if (peso > 77) {
    			alert(name+", Haz dieta, estás arriba de tu peso!");
    		}else{
    			alert(name+", Estás en tu peso ideal :D")
    		}
    }else if (est >= 184 && est <= 187) {
    		if (peso < 72 ) {
    			alert(name+", Alimentate bien, estás bajo de peso!");
    		}else if (peso > 80) {
    			alert(name+", Haz dieta, estás arriba de tu peso!");
    		}else{
    			alert(name+", Estás en tu peso ideal :D")
    		}
    }else if (est >= 188 && est <= 191) {
    		if (peso < 75 ) {
    			alert(name+", Alimentate bien, estás bajo de peso!");
    		}else if (peso > 85) {
    			alert(name+", Haz dieta, estás arriba de tu peso!");
    		}else{
    			alert(name+", Estás en tu peso ideal :D")
    		}
    }
    return true;
}