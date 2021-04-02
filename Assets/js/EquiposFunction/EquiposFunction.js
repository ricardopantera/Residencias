$(function() {

    dataTableGet();
    obtenerJuez();
    obtenerProyectos();
    
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

// consulta del boton por id 
function EditUser(id_equipos){

	$.ajax({
		url: base_url+"/Residencias_v1/Equipos/getEquipo/"+id_equipos,
		type: 'GET',
		success: function(result){
			var objData = JSON.parse(result);
			console.log(objData)
			if(objData.length > 0){

        console.log(objData[0].id_usuario)
				
				$("#equipo_edit").val(objData[0].nombre_equipo);
				$("#Juez_edit").val(objData[0].idusuario);
				$("#Proyectos_edit").val(objData[0].id_proyecto);
				$("#id_equipo").val(objData[0].id_equipo);
				


				$('#ModalEditEquipo').modal('show');

				
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


function GuardarEquipos(){
	let equipo =  $("#equipo").val();
	let usuario = $("#Juez").val();
	let proyecto = $("#Proyectos").val();


	if(equipo == ""){
		Swal.fire(
            'Por favor',
            'El campo equipo es obligatorio',
            'error'
          )
        return false;
	}else if(usuario == "null"){
		Swal.fire(
            'Por favor',
            'El campo juez obligatorio',
            'error'
          )
        return false;
	}else if(proyecto == "null"){
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
            console.log(result)
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
function ActualizarEquipo(){
	let equipo =  $("#equipo_edit").val();
	let usuario = $("#Juez_edit").val();
	let proyecto = $("#Proyectos_edit").val();
	let id = $("#id_equipo").val();



	if(equipo == ""){
		Swal.fire(
            'Por favor',
            'El equipo es un campo obligatorio',
            'error'
          )
        return false;
	}else if(usuario == ""){
		Swal.fire(
            'Por favor',
            'El usuario es un campo obligatorio',
            'error'
          )
        return false;
	}else if(proyecto == ""){
		Swal.fire(
            'Por favor',
            'El campo proyecto es obligatorio',
            'error'
          )
        return false;
	}else{
		var parametros = {
            "usuario" : equipo,
            "password" : usuario,
            "rol":proyecto,
            "id":id
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Equipos/UpdateEquipo",
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
					  $('#ModalEditEquipo').modal('hide');
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



function obtenerJuez(){
  $.ajax({
		url: base_url+"/Residencias_v1/Equipos/ObtenerJuez/",
		type: 'GET',
		success: function(result){
			var objData = JSON.parse(result);
			console.log(objData)
			if(objData.length > 0){
        $.each(objData,function(key,value){
          var string = '<option value="'+value.id_usuario+'">'+value.nombre_usuario+'</option>'
          $("#Juez").append(string);
		  $("#Juez_edit").append(string);

        })
				
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



function obtenerProyectos(){
  $.ajax({
		url: base_url+"/Residencias_v1/Equipos/ObtenerProyecto/",
		type: 'GET',
		success: function(result){
			var objData = JSON.parse(result);
			console.log(objData)
			if(objData.length > 0){
        $.each(objData,function(key,value){
          var string = '<option value="'+value.id_proyecto+'">'+value.nombre_proyecto+'</option>'
          $("#Proyectos").append(string);
		  $("#Proyectos_edit").append(string);
        })
				
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


