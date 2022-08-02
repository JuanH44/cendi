const studentsTable = document.querySelector("#students-table");

const getData = async () => {

	try {
		const url = "../../back/BD/DatosBD.php";
		const data =  await fetch(url);
		const registers = await data.json();

		await buildTable(registers);

	} catch (error) {
		console.log(error);
	};
};

const buildTable = async (registers) => {
	const fragment = document.createDocumentFragment();
	let template = await loadTemplate();

	registers.forEach(register => {
		const studentElement = document.createElement("div");
		studentElement.innerHTML = template;
		fragment.append(instantiateElement(register, studentElement));		
	});
	studentsTable.append(fragment);
}

const deleteRegister = (id) => {

	const register = document.querySelector(`[data-id="${id}"]`);

	register.style.backgroundColor = "red";


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

const instantiateElement = (register, studentElement) => {
	const {Nombre, Primer_Apellido, Segundo_Apellido, Grupo, Folio} = register;
	studentElement.classList.add("student", "d-flex", "p-3", "border");

	const name = studentElement.querySelector("[data-field='name']");
	const group = studentElement.querySelector("[data-field='group']");
	const id = studentElement.querySelector("[data-field='id']");
	const btnDelete = studentElement.querySelector("[data-action='delete']");
	const btnUpdate = studentElement.querySelector("[data-action='update']");

	console.log(studentElement);

	studentElement.dataset.id =  Folio + "";
	name.textContent = `${Primer_Apellido} ${Segundo_Apellido} ${Nombre}`;
	group.textContent = `Grupo: ${Grupo}`;
	id.textContent = `Folio: ${Folio}`;

	btnDelete.dataset.key = Folio;
	btnUpdate.dataset.key = Folio;

	return studentElement;
}




getData();

studentsTable.addEventListener("click", (event) => {
	const {target} = event;

	id = target.dataset.key;
	
	if (target.dataset.action == "delete") {
		deleteRegister(id);
	} else if (target.dataset.action == "update") {
		updateRegister(id);
	}
});
