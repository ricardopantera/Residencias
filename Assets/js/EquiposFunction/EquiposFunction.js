$(function() {

	dataTableGet();

});

function dataTableGet(){
    var tableequipos;
    
    tableequipos =$('#TableEquipos').dataTable({
        "aProcessing":true,
		"aServerside":true,
		"language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" /*Idioma de visualizacion*/
		},
        "ajax":{
			"url": "http://localhost/Residencias_v1/Equipos/getEquipos",/* Ruta a la funcion getRoles que esta en el controlador roles.php*/
		"dataSrc":""
       },
       "columns":[/* Campos de la base de datos*/
        {"data":"id_equipos"},
        {"data":"nombre_equipo"},
        {"data":"nombre_usuario"},
        {"data":"nombre_proyecto"},
        {"data":"options"}
       ],
       "responsieve":"true",
       "bDestroy": true,
       "iDisplayLength": 10, /*Mostrará los primero 10 registros*/
       "order":[[0,"desc"]] /*Ordenar de forma Desendente*/
    });
}

/*
function EditUser(id_usuario){

	$.ajax({
		url: base_url+"/Residencias_v1/Equipos/getEquipos/"+id_equipos,
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
*/

function GuardarEquipos(){
	let equipo =  $("#nombre_equipo").val();
	let usuario = $("#nombre_usuario").val();
	let proyecto = $("#nombre_proyecto").val()


	if(equipo == ""){
		Swal.fire(
            'Por favor',
            'El campo equipo es obligatorio',
            'error'
          )
        return false;
	}else if(usuario == ""){
		Swal.fire(
            'Por favor',
            'El campo juez obligatorio',
            'error'
          )
        return false;
	}else if(proyecto == ""){
		Swal.fire(
            'Por favor',
            'El campo  proyecto es obligatorio',
            'error'
          )
        return false;
	}else{
		var parametros = {
            "equipo" : equipo,
            "usuario" : usuario,
			"proyecto":proyecto
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Equipos/insertEquipo",
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
					  $('#ModalEquipo').modal('hide');
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


