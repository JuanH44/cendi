const form = document.querySelector("#form");
const bottomButtons = document.querySelector("#bottomButtons");
const infantSection = document.querySelector('#infant-section');
const parentSection = document.querySelector('#parent-section');
const spouseSection = document.querySelector('#spouse-section');
let record = {};

const getURLParms = (paramName) => {
	const params = new URLSearchParams(window.location.search);
	const paramValue = params.get(paramName);
	console.log(paramValue);
	return paramValue;
}


const disableForm = (state) => {
	const formElements = document.querySelectorAll('input:not(.disabled), select ');

	for (const element of formElements) {
			element.disabled = state;
	};
}

const showData = (record) => {

	form.cendi.value = 	record.Cendi;
	form.folio.value =  record.Folio;
	form.grupo.value =  record.Grupo;

	// "niño / niña" data. n_ = niño / niña
	form.n_apellido1.value =  record.Primer_Apellido;
	form.n_apellido2.value =  record.Segundo_Apellido;
	form.n_nombre.value =  record.Nombre;
	form.n_fechaNacimiento.value =  record.FechaNac;
	form.n_edadAnnos.value =  record.Edad_Anios;
	form.n_edadMeses.value =  record.Edad_Meses;
	form.n_curp.value =  record.Curp;
	
	//"Derechohabiente" data. d_ = "derechohabiente"
	form.d_apellido1.value =  record.Primer_Apellido_Derecho;
	form.d_apellido2.value =  record.Segundo_Apellido_Derecho;
	form.d_nombre.value =  record.Nombre_Derecho;
	form.d_calle.value = record.calle;
	form.d_numExterior.value = record.noExt;
	form.d_numInterior.value = record.noInt;
	form.d_colonia.value = record.colonia;
	form.d_alacaldia.value = record.alcaldia;
	form.d_entidad.value = record.entidad;
	form.d_codigoPostal.value = record.cp;
	form.d_telefonoFijo.value = record.Telefono_Fijo_Derecho
	form.d_telefonoCelular.value = record.Telefono_Celular_Derecho;
	form.d_email.value = record.Email_Derecho;
	form.d_ocupacion.value = record.Ocupacion_Derecho;
	form.d_curp.value = record.Curp_Derecho;
	form.d_numEmpleado.value = record.Numero_Empleado;
	form.d_horarioTrabajo.value = record.Horario_Trabajo; 

	//"Conyuge" data.  c_ = "conyuge"
	form.c_tieneConyuge.value =  record.tienec;
	form.c_apellido1.value =  record.Primer_Apellido_Conyuge;
	form.c_apellido2.value =  record.Segundo_Apellido_Conyuge;
	form.c_nombre.value =  record.Nombre_Conyuge;
	form.c_telefonoCelular.value =  record.Telefono_Celular_Conyuge;
	form.c_telefonoTrabajo.value =  record.Telefono_Trabajo_Conyuge;
}

const loadForm = async () => {
	form.hidden = true;
	await loadComponent("#general-section", "./components/form-sections.html #general-section", "replace");
	await loadComponent("#infant-section", "./components/form-sections.html #infant-section", "replace");
	await loadComponent("#parent-section", "./components/form-sections.html #parent-section", "replace");
	await loadComponent("#spouse-section", "./components/form-sections.html #spouse-section", "replace");

	disableForm(true);

	record = await loadData();
	showData(record);

	form.hidden = false; // replace for a loading animation
}

const loadData = async (ID) => {
	try{
		const data = await fetch(`../../back/BD/DatosBD.php?folio=${getURLParms('folio')}`);
		const record = await data.json();
		console.log(record);
		return record;
	}	catch(error){
		console.log(error);
	}
}

const displayElements = (state,...selectors) => {
	for (const selector of selectors) {
		const element = document.querySelector(selector);
		
		element.hidden = !state;  //for diplay true = !false
	}
}

loadForm();

bottomButtons.addEventListener("click", (e) => {
	const action = e.target.dataset.action;

	if (action === "edit"){
		displayElements(false,"#btnEdit", "#btnDelete");
		displayElements(true, "#btnCancel", "#btnSave");

		disableForm(false);

	}else if (action === "cancel"){
		displayElements(true,"#btnEdit", "#btnDelete");
		displayElements(false,"#btnCancel", "#btnSave");
		showData(record);
		disableForm(true);
	}else if (action === "save"){


	}else if (action === "delete"){

	}else if (action === "back"){
		window.location.href = "./index.html";
	}
});