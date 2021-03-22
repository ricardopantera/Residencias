function OnLogin(){
   let usuario =  $("#usuario").val();
   let password = $("#password").val();

    if(usuario == "" || password == ""){
        Swal.fire(
            'Por favor',
            'Escribe usuario y contraseña',
            'error'
          )
        return false;
    }else{

        var parametros = {
            "usuario" : usuario,
            "password" : password
         }; 

        
        $.ajax({
            url: base_url+"/Residencias_v1/Login/loginUser",
            type: 'POST',
            data: parametros,
            success: function(result){
                var objData = JSON.parse(result);
                if(objData.status){
                    window.location = base_url+"/Residencias_v1/Usuarios/Home";
                }else{
                    Swal.fire(
                        'Atencion',
                        objData.msg,
                        'error'
                      )  
                }
          }});

          
    }
}