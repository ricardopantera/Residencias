$(function() {

	dataTableGet();

});



function dataTableGet(){
    var tableproyecto;
    

    tableproyecto = $('#TableProyecto').dataTable({

        "aProcessing":true,
		"aServerside":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" /*Idioma de visualizacion*/
		},
		"ajax":{
			"url": "http://localhost/Residencias_v1/Proyecto/getProyecto",/* Ruta a la funcion getRoles que esta en el controlador roles.php*/
		"dataSrc":""
		},
		"columns":[/* Campos de la base de datos*/
			{"data":"id_proyecto"},
			{"data":"nombre_proyecto"},
			{"data":"options"}
		],
		"responsieve":"true",
		"bDestroy": true,
		"iDisplayLength": 10, /*Mostrará los primero 10 registros*/
		"order":[[0,"desc"]] /*Ordenar de forma Desendente*/

    });
}
function EditProyecto(id_proyecto){

	$.ajax({
		url: base_url+"/Residencias_v1/Proyecto/getProyectoId/"+id_proyecto,
		type: 'GET',
		success: function(result){
			var objData = JSON.parse(result);
			console.log(objData)
			if(objData.length > 0){
				
				$("#Proyecto_edit").val(objData[0].nombre_proyecto);
                $("#id_proyecto").val(objData[0].id_proyecto);
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


function GuardarProyecto(){
	let proyecto =  $("#proyecto").val();
	
	if(proyecto == ""){
		Swal.fire(
            'Por favor',
            'El campo proyecto es obligatorio',
            'error'
          )
        return false;
        }else{
		var parametros = {
            "proyecto" : proyecto
            
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Proyecto/insertProyecto",
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
					  $('#ModalProyecto').modal('hide');
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
function ActualizarProyecto(){
	let proyecto =  $("#Proyecto_edit").val();
	let id = $("#id_proyecto").val();


	if(proyecto == ""){
		Swal.fire(
            'Por favor',
            'El usuario es un campo obligatorio',
            'error'
          )
        return false;
        }else{
		var parametros = {
            "proyecto" : proyecto,
            "id":id
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Proyecto/EditProyecto",
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


