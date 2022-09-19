export const patterns = {

	cendi: /\w{1,}/,
	folio: /^(PE|PP)\d{8}$/,
	grupo: /\w{1,}/,

	n_apellido1: /^[a-zA-Z\s]{2,}$/,
	n_apellido2: /^[a-zA-Z\s]{2,}$/,
	n_nombre:/^[a-zA-Z\s]{2,}$/i,
	n_fechaNacimiento: /^((0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d)|((19|20)\d\d)[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/,
	n_edadAnnos: /^[0-9]{1,2}$/,
	n_edadMeses: /^[0-9]{1,2}$/,
	n_curp: /^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}$/,

	d_apellido1: /^[\w\s]{2,}$/,
	d_apellido2:/^[\w\s]{2,}$/,
	d_nombre:/^[\w\s]{2,}$/,
	d_calle: /\w{1,}/,
	d_numExterior: /^\d{1,}$/,
	d_numInterior: /^\d{0,}$/,
	d_colonia: /\w{1,}/,
	d_alacaldia: /\w{1,}/,
	d_entidad: /\w{1,}/,
	d_codigoPostal:  /^\d{5}$/,
	d_telefonoFijo:  /^\d{10}$/,
	d_telefonoCelular: /^\d{10}$/,
	d_email:  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
	d_ocupacion: /\w{1,}/,
	d_curp:  /^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}$/,
	d_numEmpleado:  /^\d{5,7}$/,
	d_horarioTrabajo: /\w{1,}/,

	c_tieneConyuge: /^(Sí|No)$/,
	c_apellido1:  /^[\w\s]{2,}$/,
	c_apellido2:  /^[\w\s]{2,}$/,
	c_nombre:  /^[\w\s]{2,}$/,
	c_telefonoCelular: /^\d{10}$/,
	c_telefonoTrabajo: /^\d{10}$/,
	
};


export const validate = (target, pattern) => {
	try{
		if (pattern.test(target.value)) {
			target.classList.remove('is-invalid');
			target.classList.add('is-valid');
			return true;
		} else {
			target.classList.remove('is-valid');
			target.classList.add('is-invalid');
			return false;
		}
	}catch(e){
		console.log("This field has no an associated pattern");
		return true;
	}
	
}
