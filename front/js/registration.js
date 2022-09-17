import {loadComponent, displayElements} from '../js/script.js';
import {validate, patterns} from '../js/validation.js';

const loadForm = async () => {
	loadComponent("#general-section", "./components/form-sections.html #general-section", "replace");
	await loadComponent("#infant-section", "./components/form-sections.html #infant-section", "replace");
	loadComponent("#parent-section", "./components/form-sections.html #parent-section", "replace");
	await loadComponent("#spouse-section", "./components/form-sections.html #spouse-section", "replace");
	const tieneConyuge = document.querySelector("#tieneConyuge");

	tieneConyuge.addEventListener("change", (event) => {
		event.preventDefault();
		if (event.target.value === "Sí"){
			displayElements(true, "#spouse-row");
		}else{
			displayElements(false, "#spouse-row");
		}
	});


	const n_fechaNacimiento = document.querySelector("#n_fechaNacimiento");

n_fechaNacimiento.addEventListener("change", (event) => {
	event.preventDefault();
	console.log(event.target.value);
	const date = new Date(event.target.value);
	console.log(date);
	const today = new Date();
	const age = today.getFullYear() - date.getFullYear();
	const m = today.getMonth() - date.getMonth();
	if (m < 0 || (m === 0 && today.getDate() < date.getDate())) {
		age--;
	}
	document.querySelector("#n_edadAnnos").value = age;
	document.querySelector("#n_edadMeses").value = m;
});
}



const registrationForm = document.querySelector("#registrationForm");
const buttons = document.querySelector("#buttons");
const navForm = document.querySelector("#navForm");


buttons.addEventListener("click", (event) => {  // decide which action to perform
	event.preventDefault();
	const action = event.target.dataset.action;
	const currentSection = document.querySelector("#navForm .active");
	try {
		if (action === "next") {
			const nextSection = currentSection.nextElementSibling;
			nextSection.click();
		} else if (action === "back") {
			const previousSection = currentSection.previousElementSibling;
			previousSection.click();
			

		} else if (action === "reset") {
			removeValidations();
			registrationForm.reset();
		} else if (action === "submit") {
			// registrationForm.submit();
		}
	}catch (error){
		console.log(error);
	}	
});

loadForm();

navForm.addEventListener("click", (event) => { // decide which section to display

	if (event.target.classList.contains("first")){
		displayElements(false,"#btnBack", "#btnSubmit");
		displayElements(true,"#btnNext");
		document.querySelector("#btnNext").classList.add("btn-rounded");

	}else if (event.target.classList.contains("last")){
		displayElements(false, "#btnNext");
		displayElements(true, "#btnSubmit", "#btnBack" );
		document.querySelector("#btnBack").classList.add("btn-rounded");
	}else {
		document.querySelector("#btnNext").classList.remove("btn-rounded");
		document.querySelector("#btnBack").classList.remove("btn-rounded");
		displayElements(true, "#btnBack", "#btnNext");
		displayElements(false, "#btnSubmit");
	}
});

registrationForm.addEventListener("change", (event) => {
	
	event.preventDefault();
	console.log(event.target.name);
		validate(event.target, patterns[event.target.id]);
} );

const removeValidations = () => {
	const inputs = document.querySelectorAll("input , select");
	for (const input of inputs) {
		input.classList.remove("is-invalid");
		input.classList.remove("is-valid");
	}
}




const fieldsToValidate = {
	general:{
		cendi: false,
		folio: false,
		grupo: false,
	},

	infante:{
		n_apellido1: false,
		n_apellido2: false,
		n_nombre: false,
		n_fechaNacimiento: false,
		n_edadAnnios: false,
		n_edadMeses: false,
		n_curp: false,
	},

	derechohabiente:{
		d_apellido1: false,
		d_apellido2: false,
		d_nombre: false,
		d_calle: false,
		d_numExterior: false,
		d_numInterior: false,
		d_colonia: false,
		d_alacaldia: false,
		d_entidad: false,
		d_codigoPostal:  false,
		d_telefonoFijo:  false,
		d_telefonoCelular: false,
		d_email:  false,
		d_ocupacion: false,
		d_curp:  false,
		d_numEmpleado:  false,
		d_horarioTrabajo: false,
	},

	conyuge:{
		c_tieneConyuge: false,
		c_apellido1:  false,
		c_apellido2:  false,
		c_nombre:  	false,
		c_telefonoCelular: false,
		c_telefonoTrabajo: false,
	}
};


