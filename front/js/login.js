const loginForm = document.querySelector('#loginForm');

loginForm.addEventListener('submit', (e) => {
	e.preventDefault();
	const formData = new FormData(loginForm);
	const url = '../../back/admin/login.php';
	const data = {
		method: 'POST',
		body: formData
	};
	fetch(url, data)
		.then(response => response.json())
		.then(data => {
			if (data.status === 'success') {
				Swal.fire({
					title: 'Bienvenido',
					text: 'Inicio de sesión exitoso',
					icon: 'success',
					timer: 3000
				})
				window.location.href = './administration.php';
			} else {
				Swal.fire({
					title: "Credeciales incorrectas", 
					text: "Verifica tus datos",
					icon: "error"
				});
			}
		}).catch(error => {
			console.log(error);
		}).finally(() => {
			
		} );
});