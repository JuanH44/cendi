const studentsTable = document.querySelector("#students-table");
const btnSession = document.querySelector("#btnSession");

const getData = async () => { //get the data of the students as a json object
	try {
		const url = "../../back/BD/DatosBD.php";
		const data =  await fetch(url);
		const registers = await data.json();

		buildTable(registers);

	} catch (error) {
		console.log(error);
	};
};

const buildTable = async (records) => {  //build the table with the students data
	const fragment = document.createDocumentFragment();
	let template = await loadTemplate(); //load a html template for the students table as a string

	records.forEach(record => {
		const studentElement = document.createElement("div");
		studentElement.innerHTML = template;
		fragment.append(instantiateElement(record, studentElement));		
	});
	studentsTable.append(fragment);
}

const viewStudent = (id) => {  //view the selected student
	window.location.href = `./studentInfo.php?folio=${id}`;
}

const deletStudent = (id) => { //delete the selected student
	try{
		const url = `../../back/BD/DatosBD.php?folio=${id}`;
		const data =  fetch(url, {
		method: "DELETE"
		});
		console.log(data);
	} catch (error) {
		console.log(error);
	}
}

const loadTemplate = async () => { //load the template for the students table
	const dataTemp = await fetch("./components/registryEntry.html");
	const template = await dataTemp.text();
	return template;
}

const instantiateElement = (register, studentElement) => { //instantiate the template with the data of the student
	const {Nombre, Primer_Apellido, Segundo_Apellido, Grupo, Folio} = register;
	studentElement.classList.add("student", "d-flex", "p-3", "border");
	//select the elements to be instantiated
	const name = studentElement.querySelector("[data-field='name']");
	const group = studentElement.querySelector("[data-field='group']");
	const id = studentElement.querySelector("[data-field='id']");
	const btnDelete = studentElement.querySelector("[data-action='delete']");
	const btnUpdate = studentElement.querySelector("[data-action='update']");

	studentElement.dataset.id =  Folio; //set of the entry data

	name.textContent = `${Primer_Apellido} ${Segundo_Apellido} ${Nombre}`;
	group.textContent = `Grupo: ${Grupo}`;
	id.textContent = `Folio: ${Folio}`;

	btnDelete.dataset.key = Folio; //to identify the target student
	btnUpdate.dataset.key = Folio;

	return studentElement;
}

getData();
//Listener for the delete or update buttons
studentsTable.addEventListener("click", (event) => {
	const id = event.target.dataset.key;
	const action = event.target.dataset.action;

	if (action == "delete") {
		deletStudent(id);
	} else if (action == "update") {
		viewStudent(id);
	}
});

