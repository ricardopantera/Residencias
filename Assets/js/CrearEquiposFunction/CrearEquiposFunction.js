$(function() {

	dataTableGet();

});



function dataTableGet(){
    var tableequipo;
    

    tableequipo = $('#TableEquipo').dataTable({

        "aProcessing":true,
		"aServerside":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" /*Idioma de visualizacion*/
		},
		"ajax":{
			"url": "http://localhost/Residencias_v1/CrearEquipos/getEquipo",/* Ruta a la funcion getRoles que esta en el controlador roles.php*/
		"dataSrc":""
		},
		"columns":[/* Campos de la base de datos*/
			{"data":"id_equipo"},
			{"data":"nombre_equipo"},
			{"data":"options"}
		],
		"responsieve":"true",
		"bDestroy": true,
		"iDisplayLength": 10, /*Mostrará los primero 10 registros*/
		"order":[[0,"desc"]] /*Ordenar de forma Desendente*/

    });
}
function GuardarEquipo(){
	let equipo =  $("#equipo").val();
	
	if(equipo == ""){
		Swal.fire(
            'Por favor',
            'El campo equipo es obligatorio',
            'error'
          )
        return false;
        }else{
		var parametros = {
            "equipo" : equipo
            
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/CrearEquipos/insertEquipo",
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
function ActualizarEquipo(){
	let equipo =  $("#Equipo_edit").val();
	let id = $("#id_equipo").val();


	if(equipo == ""){
		Swal.fire(
            'Por favor',
            'El equipo es un campo obligatorio',
            'error'
          )
        return false;
        }else{
		var parametros = {
            "equipo" : equipo,
            "id":id
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/CrearEquipos/EditEquipo",
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
function EditEquipo(id_equipo){

	$.ajax({
		url: base_url+"/Residencias_v1/CrearEquipos/getEquipoId/"+id_equipo,
		type: 'GET',
		success: function(result){
			var objData = JSON.parse(result);
			console.log(objData)
			if(objData.length > 0){
				
				$("#Equipo_edit").val(objData[0].nombre_equipo);
                $("#id_equipo").val(objData[0].id_equipo);
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
function DeleteEquipo(id_equipo){


	Swal.fire({
		title: 'Quieres eliminar este equipo?',
		text: "No podras revertir los cambios!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Eliminar!'
	  }).then((result) => {
		if (result.isConfirmed) {



			$.ajax({
				url: base_url+"/Residencias_v1/CrearEquipos/EliminarEquipo/"+id_equipo,
				type: 'GET',
				success: function(result){
					var objData = JSON.parse(result);
					console.log(objData)
					if(objData){

						Swal.fire(
							'Eliminar!',
							'Equipo eliminado correctamente',
							'success'
						  )
						  dataTableGet();
						
					}else{
						Swal.fire(
							'Atencion',
							'Ocurrio un error al eliminar el equipo',
							'error'
						  )  
						  dataTableGet();
					}
			  }
			});


		}
	  })
}