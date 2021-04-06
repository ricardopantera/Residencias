$(function() {

	dataTableGet();

});



function dataTableGet(){
    var tableaspecto;
    

    tableaspecto = $('#TableAspecto').dataTable({

        "aProcessing":true,
		"aServerside":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" /*Idioma de visualizacion*/
		},
		"ajax":{
			"url": "http://localhost/Residencias_v1/Aspecto/getAspecto",/* Ruta a la funcion getRoles que esta en el controlador roles.php*/
		"dataSrc":""
		},
		"columns":[/* Campos de la base de datos*/
			{"data":"id_aspecto"},
			{"data":"nombre_aspecto"},
			{"data":"options"}
		],
		"responsieve":"true",
		"bDestroy": true,
		"iDisplayLength": 10, /*Mostrará los primero 10 registros*/
		"order":[[0,"desc"]] /*Ordenar de forma Desendente*/

    });
}
function GuardarAspecto(){
	let aspecto =  $("#aspecto").val();
	
	if(aspecto == ""){
		Swal.fire(
            'Por favor',
            'El campo aspecto es obligatorio',
            'error'
          )
        return false;
        }else{
		var parametros = {
            "aspecto" : aspecto
            
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Aspecto/insertAspecto",
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
					  $('#ModalAspecto').modal('hide');
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
function EditAspecto(id_aspecto){
         
    $.ajax({
        url: base_url+"/Residencias_v1/Aspecto/getAspectoId/"+id_aspecto,
        type: 'GET',
        success: function(result){
            var objData = JSON.parse(result);
            console.log(objData)
            if(objData.length > 0){
                
                $("#Aspecto_edit").val(objData[0].nombre_aspecto);
                $("#id_aspecto").val(objData[0].id_aspecto);
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

function ActualizarAspecto(){
	let aspecto =  $("#Aspecto_edit").val();
	let id = $("#id_aspecto").val();


	if(aspecto == ""){
		Swal.fire(
            'Por favor',
            'El aspecto es un campo obligatorio',
            'error'
          )
        return false;
        }else{
		var parametros = {
            "aspecto" : aspecto,
            "id":id
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Aspecto/EditAspecto",
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
function DeleteAspecto(id_aspecto){


	Swal.fire({
		title: 'Quieres eliminar este aspecto?',
		text: "No podras revertir los cambios!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Eliminar!'
	  }).then((result) => {
		if (result.isConfirmed) {



			$.ajax({
				url: base_url+"/Residencias_v1/Aspecto/EliminarAspecto/"+id_aspecto,
				type: 'GET',
				success: function(result){
					var objData = JSON.parse(result);
					console.log(objData)
					if(objData){

						Swal.fire(
							'Eliminar!',
							'Aspecto eliminado correctamente',
							'success'
						  )
						  dataTableGet();
						
					}else{
						Swal.fire(
							'Atencion',
							'Ocurrio un error al eliminar el aspecto',
							'error'
						  )  
						  dataTableGet();
					}
			  }
			});


		}
	  })
}