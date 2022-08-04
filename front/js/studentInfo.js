const form = document.querySelector("#form");
const infantSection = document.querySelector('#infant-section');
const parentSection = document.querySelector('#parent-section');
const spouseSection = document.querySelector('#spouse-section');

const disableForm = () => {
	const formElements = document.querySelectorAll('input, select');

	formElements.forEach(element => {
		element.setAttribute('disabled', true);
	});
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
	form.n_email.value =  record.Email;
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
	form.d_puesto.value = record.Puesto;
	form.d_sueldo.value = record.Sueldo;
	form.d_numEmpleado.value = record.Numero_Empleado;
	form.d_adscripcion.value = record.Adscripcion;
	form.d_horarioTrabajo.value = record.Horario_Trabajo; 
	form.d_extension.value = record.Extension;

	//"Conyuge" data.  c_ = "conyuge"
	form.c_tieneConyuge.value =  record.tienec;
	form.c_apellido1.value =  record.Primer_Apellido_Conyuge;
	form.c_apellido2.value =  record.Segundo_Apellido_Conyuge;
	form.c_nombre.value =  record.Nombre_Conyuge;
	form.c_calle.value =  record.calle_conyuge;
	form.c_numExterior.value =  record.noExt_conyuge;
	form.c_numInterior.value =  record.noInt_conyuge;
	form.c_colonia.value =  record.colonia_conyuge;
	form.c_alcaldia.value =  record.alcaldia_conyuge;
	form.c_entidad.value =  record.entidad_conyuge;
	form.c_codigoPostal.value =  record.cp_conyuge;
	form.c_telefonoFijo.value =  record.Telefono_Fijo_Conyuge;
	form.c_telefonoCelular.value =  record.Telefono_Celular_Conyuge;
	form.c_lugarTrabajo.value =  record.Lugar_Trabajo_Conyuge;
	form.c_domicilioTrabajo.value =  record.Domicilio_Trabajo_Conyuge;
	form.c_telefonoTrabajo.value =  record.Telefono_Trabajo_Conyuge;
	form.c_extension.value =  record.Extension; //areglar Aqui
	console.dir(record.Extension);
}

const loadForm = async () => {
	await loadComponent("#general-section", "./components/form-sections.html #general-section", "replace");
	await loadComponent("#infant-section", "./components/form-sections.html #infant-section", "replace");
	await loadComponent("#parent-section", "./components/form-sections.html #parent-section", "replace");
	await loadComponent("#spouse-section", "./components/form-sections.html #spouse-section", "replace");

	disableForm();

	const record = await loadData();
	showData(record);

}

const loadData = async () => {
	const data = await fetch("../../back/BD/DatosBD.php?ID=PP44444444");
	const record = await data.json();
	console.log(record);
	return record;

}






loadForm();
