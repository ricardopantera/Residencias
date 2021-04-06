<!DOCTYPE html>
<html lang="en">
<?php require_once("./Vistas/Template/header.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php
require_once("./Vistas/Template/nav-bar.php");
require_once("./Vistas/Template/menu_admin.php");
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bienvenido Equipo</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

      
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Equipos</h3>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar</button>
        </div>
        </div>
        <br>
        
       

    </section>


    <!-- Button trigger modal -->
   

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ModalEquipo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" name="formlogin" id="FormLoginId" method="post">

        <div class="col">
          <div class="form-group">
          <label for="">Equipo</label>
          <input type="text" id="equipo" name="equipo" class="form-control" placeholder="Nombre del del equipo" required>
          </div>
          </div>
       
        <div class="col">
          <div class="form-group">
            <label for="">Jueces disponibles</label>
            <select class="form-control" name="Juez" id="Juez" required>
              <option value="null">Selecciona un juez</option>
            </select>
          </div>
        </div>      


        <div class="col">
          <div class="form-group">
            <label for="">Proyectos disponibles</label>
            <select class="form-control" name="Proyectos" id="Proyectos" required>
              <option value="null">Selecciona un proyecto</option>
            </select>
          </div>
        </div>      


      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="GuardarEquipos()">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!--Modal para editar los equipos-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ModalEditEquipo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" name="formlogin" id="FormLoginId" method="post">

        <div class="col">
          <div class="form-group">
          <label for="">Equipo</label>
          <input type="text" id="equipo_edit" name="equipo" class="form-control" placeholder="Nombre del del equipo" required>
          </div>
          </div>
       
        <div class="col">
          <div class="form-group">
            <label for="">Jueces disponibles</label>
            <select class="form-control" name="Juez" id="Juez_edit" required>
              <option value="null">Selecciona un juez</option>
            </select>
          </div>
        </div>      


        <div class="col">
          <div class="form-group">
            <label for="">Proyectos disponibles</label>
            <select class="form-control" name="Proyectos" id="Proyectos_edit" required>
              <option value="null">Selecciona un proyecto</option>
            </select>
          </div>
        </div>      
        <div class="col">
            <input type="hidden" id="id_equipo" name="id_equipo" class="form-control">
          </div>

      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="ActualizarEquipo()">Guardar</button>
      </div>
    </div>
  </div>
</div>





  </div>

      

        


    






  
  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>
    
</body>

<script src="../../../Residencias_V1/Assets/js/EquiposFunction/EquiposFunction.js"></script>
<script>
  const base_url ="<?php BASE_URL; ?>" 
</script>

</html>