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
            <h1>Administracion de proyectos</h1>
          </div>

        </div>
      </div>
    </section>

    <section class="content">

      
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Proyectos</h3>
        </div>
        <div class="card-body">
        </div>
      </div>

    </section>
  </div>
   <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>
    
</body>

<script src="../../../Residencias_V1/Assets/js/adminUserFunction/UserFunction.js"></script>
<script>
  const base_url ="<?php BASE_URL; ?>" 
</script>

</html>