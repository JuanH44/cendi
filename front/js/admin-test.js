const studentsTable = document.querySelector("#students-table");

const getData = async () => {

	try {
		const url = "../../back/BD/DatosBD.php";

		
		const data =  await fetch(url);
		const registers = await data.json();
		console.log(registers);

		await buildTable(registers);

	
	} catch (error) {
	

		console.log(error);
	};
		
};

const buildTable = async (registers) => {
	const fragment = document.createDocumentFragment();
	template = await loadTemplate();

	registers.forEach(register => {
		const student = document.createElement("div");
		student.dataset.id = register.Folio;
		student.innerHTML = template;

		console.log(student);
		const studentElement = loadElement(register, student);
		fragment.append(studentElement);

		// const student = document.createElement("div"); //main container
		
		// const imgStudent = document.createElement("div"); //parent container
		// const photo = document.createElement("img");

		// const infoStudent = document.createElement("div"); //parent container
		// const name = document.createElement("div");
		// const id = document.createElement("div");
		// const group = document.createElement("div");

		// const controls = document.createElement("div"); //parent container
		// const btnUpdate = document.createElement("button");
		// const btnDelete = document.createElement("button");

		// student.classList.add("student", "d-flex", "p-3", "border" );
		// student.dataset.id = register.Folio;

		// imgStudent.append(photo);
		// imgStudent.classList.add("img-student");
		// student.append(imgStudent, infoStudent, controls);

		// infoStudent.append(name, id, group);
		// infoStudent.classList.add("info-student");

		// photo.src = "../assets/child.jpg";
		// photo.classList.add("profile-photo");

		// name.textContent = `${register.Primer_Apellido} ${register.Segundo_Apellido} ${register.Nombre}`;
		// id.textContent = `Folio: ${register.Folio}`;
		// id.classList.add("text-muted");
		// group.textContent = `Grupo: ${register.Grupo}`;
		// group.classList.add("text-muted");
		
		// controls.classList.add("controls","ms-auto", "d-flex", "justify-content-center", "align-items-center");
		// controls.append(btnUpdate, btnDelete);

		// btnUpdate.classList.add("btn", "btn-primary", "btn-sm");
		// btnUpdate.textContent = "Editar";
		// btnUpdate.addEventListener("click", () => updateRegister(register.Folio));

		// btnDelete.classList.add("btn", "btn-danger", "btn-sm");
		// btnDelete.textContent = "Eliminar";
		// btnDelete.addEventListener("click", () => deleteRegister(register.Folio));

		
	});

	studentsTable.append(fragment);
}

const deleteRegister = (id) => {

	const register = document.querySelector(`[data-id="${id}"]`);

	register.style.backgroundColor = "red";
	// try {
	// 	const url = "../../back/BD/DatosBD.php";
	// 	const data = {
	// 		action: "delete",
	// 		id: id
	// 	};
	// }	catch (error) {
	// 	error.message = "Error al eliminar el registro";
	// 	console.log(error);
	// }


	alert("registro eliminado:" + id);
}

const updateRegister =  (id) => {
	alert("registro actualizado: " + id);
}

const loadTemplate = async () => {
	const dataTemp = await fetch("./components/registryEntry.html");
	const template = await dataTemp.text();
	return template;
}



const loadElement = async (data, template) => {
	const {Nombre, Primer_Apellido, Segundo_Apellido, Grupo, Folio} = data;
	const student = document.createElement("div");
	student.dataset.id = Folio;


	template.replace("{{Nombre}}", Nombre)
					.replace("{{Primer_Apellido}}", Primer_Apellido)
					.replace("{{Segundo_Apellido}}", Segundo_Apellido)
					.replace("{{Grupo}}", Grupo)
					.replace("{{Folio}}", Folio);

	student.innerHTML = template;
	return student;
}

//loadElement();


getData();

