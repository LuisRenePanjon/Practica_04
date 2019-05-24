function buscarPorDestinatario() {
	var destinatario = document.getElementById("destinatario").value;
	
	if (destinatario == "") {

		if (window.XMLHttpRequest) {
			//navegadores actuales
			xmlhttp = new XMLHttpRequest();
		} else {
			//navegadores que no soportan xmlhttp
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		//se encarga de recuperar la respuesta del send
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/mostrar.php?destinatario="+destinatario, true);
		xmlhttp.send();

	} else {

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/buscar.php?destinatario="+destinatario, true);
		xmlhttp.send();
	}
}

function buscarPorRemitente() {
	var remitente = document.getElementById("remitente").value;
	
	if (remitente == "") {

		if (window.XMLHttpRequest) {
			//navegadores actuales
			xmlhttp = new XMLHttpRequest();
		} else {
			//navegadores que no soportan xmlhttp
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		//se encarga de recuperar la respuesta del send
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/mostrarR.php?remitente="+remitente, true);
		xmlhttp.send();

	} else {

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/buscarR.php?remitente="+remitente, true);
		xmlhttp.send();
	}
}

function buscarPorCedula() {
	var cedula = document.getElementById("cedula").value;
	
	if (cedula == "") {

		if (window.XMLHttpRequest) {
			//navegadores actuales
			xmlhttp = new XMLHttpRequest();
		} else {
			//navegadores que no soportan xmlhttp
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		//se encarga de recuperar la respuesta del send
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/todo.php?todo="+cedula, true);
		xmlhttp.send();

	} else {

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/cedula.php?cedula="+cedula, true);
		xmlhttp.send();
	}
}

function openMessage(mensaje, from, correoF, para, correoP, date) {
	document.getElementById("from").innerHTML = "<strong>from: </strong>" + from + "<br>&emsp;&emsp;" + correoF + "<br><br> <strong>to: </strong>" + para + "<br>&emsp;&emsp;" + correoP + "<br><br> <strong>date:  </strong>" + date;
	document.getElementById("mensaje").innerHTML = mensaje;
}

function chooseFile() {
	document.getElementById('file').click();
}

function editar() {
	document.getElementById('nom').disabled = false;
	document.getElementById('ape').disabled = false;
	document.getElementById('ced').disabled = false;
	document.getElementById('tel').disabled = false;
	document.getElementById('dir').disabled = false;
	document.getElementById('fec').disabled = false;
	document.getElementById('modificar').type = 'submit';
	document.getElementById('cancelar').type = 'button';
}

function cancelar() {
	alert('cancelar');
}