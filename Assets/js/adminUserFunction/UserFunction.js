$(function() {

	dataTableGet();

});



function dataTableGet(){
    var tableuser;
    

    tableuser = $('#TableUser').dataTable({

        "aProcessing":true,
		"aServerside":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" /*Idioma de visualizacion*/
		},
		"ajax":{
			"url": "http://localhost/Residencias_v1/Usuarios/getUsuarios",/* Ruta a la funcion getRoles que esta en el controlador roles.php*/
		"dataSrc":""
		},
		"columns":[/* Campos de la base de datos*/
			{"data":"id_usuario"},
			{"data":"nombre_usuario"},
			{"data":"nombre_rol"},
			{"data":"options"}
		],
		"responsieve":"true",
		"bDestroy": true,
		"iDisplayLength": 10, /*Mostrará los primero 10 registros*/
		"order":[[0,"desc"]] /*Ordenar de forma Desendente*/

    });
}



function EditUser(id_usuario){

	$.ajax({
		url: base_url+"/Residencias_v1/Usuarios/getUsuario/"+id_usuario,
		type: 'GET',
		success: function(result){
			var objData = JSON.parse(result);
			console.log(objData)
			if(objData.length > 0){
				
				$("#usuario_edit").val(objData[0].nombre_usuario);
				$("#password_edit").val(objData[0].contraseña);
				$("#Rol_edit").val(objData[0].idrol);
				$("#id_user").val(objData[0].id_usuario);


				$('#ModalEdit').modal('show');

				
			}else{
				Swal.fire(
					'Atencion',
					objData.msg,
					'error'
				  )  
			}
	  }
	});
}



function DeleteUser(id_usuario){


	Swal.fire({
		title: 'Quieres eliminar a este usuario?',
		text: "No podras revertir los cambios!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Eliminar!'
	  }).then((result) => {
		if (result.isConfirmed) {



			$.ajax({
				url: base_url+"/Residencias_v1/Usuarios/EliminarUsuario/"+id_usuario,
				type: 'GET',
				success: function(result){
					var objData = JSON.parse(result);
					console.log(objData)
					if(objData){

						Swal.fire(
							'Eliminar!',
							'Usuario eliminado correctamente',
							'success'
						  )
						  dataTableGet();
						
					}else{
						Swal.fire(
							'Atencion',
							'Ocurrio un error al eliminar el usuario',
							'error'
						  )  
						  dataTableGet();
					}
			  }
			});


		}
	  })
}



function ActualizarUser(){
	let usuario =  $("#usuario_edit").val();
	let password = $("#password_edit").val();
	let rol = $("#Rol_edit").val();
	let id = $("#id_user").val();


	if(usuario == ""){
		Swal.fire(
            'Por favor',
            'El usuario es un campo obligatorio',
            'error'
          )
        return false;
	}else if(password == ""){
		Swal.fire(
            'Por favor',
            'La contraseña es un campo obligatorio',
            'error'
          )
        return false;
	}else if(rol == ""){
		Swal.fire(
            'Por favor',
            'El campo rol es obligatorio',
            'error'
          )
        return false;
	}else{
		var parametros = {
            "usuario" : usuario,
            "password" : password,
			"rol":rol,
			"id":id
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Usuarios/UpdateUsuario",
            type: 'POST',
            data: parametros,
            success: function(result){
				var objData = JSON.parse(result);
                if(objData.status){
					Swal.fire(
                        'Exito',
                        objData.msg,
                        'success'
                      )
					  $('#ModalEdit').modal('hide');
					  dataTableGet();
                }else{
                    Swal.fire(
                        'Atencion',
                        objData.msg,
                        'error'
                      )  
                }
          }
		});
	}
}



function GuardarUsuario(){
	let usuario =  $("#usuario").val();
	let password = $("#password").val();
	let rol = $("#Rol").val()


	if(usuario == ""){
		Swal.fire(
            'Por favor',
            'El usuario es un campo obligatorio',
            'error'
          )
        return false;
	}else if(password == ""){
		Swal.fire(
            'Por favor',
            'La contraseña es un campo obligatorio',
            'error'
          )
        return false;
	}else if(rol == ""){
		Swal.fire(
            'Por favor',
            'El campo rol es obligatorio',
            'error'
          )
        return false;
	}else{
		var parametros = {
            "usuario" : usuario,
            "password" : password,
			"rol":rol
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Usuarios/insertUsuario",
            type: 'POST',
            data: parametros,
            success: function(result){
				var objData = JSON.parse(result);
                if(objData.status){
					Swal.fire(
                        'Exito',
                        objData.msg,
                        'success'
                      )
					  $('#ModalUser').modal('hide');
					  dataTableGet();
                }else{
                    Swal.fire(
                        'Atencion',
                        objData.msg,
                        'error'
                      )  
                }
          }
		});
	}
}



