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
