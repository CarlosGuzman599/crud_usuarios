$(document).ready(function(){
    console.log('___ LOGIN ___')

    $('#form-login').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: `./login.php`,
            data: {email: $("#email").val(), password: $("#password").val()},
            success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                if(response.respuesta == "correcto"){
                    window.location.replace("./");
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Contactar administrador",
                        text: response.tipo,
                    });
                }   
            }
        });

    });

});