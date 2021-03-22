<!DOCTYPE html>
<html lang="en">
<?php

require_once("./Vistas/Template/header.php");
?>
<body>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    
    <p>Sistema de evaluación de proyectos</p>
    
  </div>

  <div class="card">
    <div class="card-body login-card-body">

      <form enctype="multipart/form-data" name="formlogin" id="FormLoginId" method="post">
        <div class="input-group mb-3">
          <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Nombre del usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary btn-md float-right" onclick="OnLogin()">Iniciar Sesion</button>
          </div>

        </div>
      </form>

    </div>

  </div>
</div>

<script src="../../../Residencias_V1/Assets/js/LoginFunctions/loginFunctions.js"></script>
<script>
  const base_url ="<?php BASE_URL; ?>" 
</script>

</body>   
</body>
</html>