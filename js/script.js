(function(){
	
	var guardarE = document.querySelector('#formulario');

	var eliminarEntrada_btn = document.querySelector('#eliminarEntrada');

	var actualizarU = document.querySelector('#actualizar-datos');

	var notificacionDiv = document.querySelector('#notificacion');

	// events listener
	if(actualizarU){
		actualizarU.addEventListener('submit', actualizarUsuario);
	}
	
	if(eliminarEntrada_btn){
		eliminarEntrada_btn.addEventListener('click', eliminarEntrada);
	}
	


function eliminarEntrada(e){
	e.preventDefault();

	var entradaID = e.target.getAttribute('data-id');
	// console.log(entradaID);

	var xhr = new XMLHttpRequest();

	var datos = new FormData();
	datos.append('id', entradaID);
	datos.append('objetivo', 'comentarios');

	xhr.open('POST', `funciones/eliminarEntrada.php`, true);

	xhr.onload = function(){
		if(this.status === 200){
			var resultado = JSON.parse(xhr.responseText);

			console.log(resultado);
			if(resultado.respuesta === 'correcto'){
				// borrar el post

				var xhr2 = new XMLHttpRequest();

				var datos2 = new FormData();
				datos2.append('id', entradaID);
				datos2.append('objetivo', 'entrada');

				xhr2.open('POST', 'funciones/eliminarEntrada.php', true);

				xhr2.onload = function(){
					if(this.status === 200){
						var resultado2 = JSON.parse(xhr2.responseText);
						
						if(resultado2.respuesta === 'correcto'){
							console.log('eliminando entadra');
							window.location.href = 'index.php?mensaje=correcto';
						}
					}
				}

				xhr2.send(datos2);
			}
		}
	}

	xhr.send(datos);
}
function actualizarUsuario(e){
	e.preventDefault();

	var nombre = document.querySelector('#nombre').value,
		apellidos = document.querySelector('#apellidos').value,
		email = document.querySelector('#email').value,
		id = document.querySelector('#usuario').value;

		const xhr = new XMLHttpRequest();

		var datos = new FormData();
		datos.append('nombre', nombre);
		datos.append('apellidos', apellidos);
		datos.append('email', email);
		datos.append('id', id);
		datos.append('accion', 'actualizar');

		xhr.open('POST', 'funciones/actualizar-datos.php', true);

		xhr.onload = function(){
			var resultado = JSON.parse(xhr.responseText);

				console.log(resultado);
			if(resultado.respuesta === 'correcto'){
				crearNotificacion('actualizado exitosamente', 'alerta-exito');

				setTimeout(() => {
					window.location.href = 'index.php';
				}, 2000 );
			}else{
				crearNotificacion('Hubo un error', 'alerta-error');
			}
		}

		xhr.send(datos);
}


function crearNotificacion(mensaje, clase){

	const notificacion = document.createElement('div');
	notificacion.classList.add('alerta');

	notificacion.classList.add(clase);
	notificacion.innerHTML = mensaje;


	notificacionDiv.appendChild(notificacion );

	 setTimeout(() => {
          notificacion.remove();
          
     }, 5000);

}

})();

