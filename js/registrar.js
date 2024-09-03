$(document).ready(function(){
    console.log('___ REGISTRAR ___')

    $('#form-registro').on('submit', function(e){
        e.preventDefault();
        let error = '';
        let genero = $('input:radio[name=genero]:checked').val();
        if(genero == undefined){
            error = error + 'Falta seleccion de genero \n';
        }
        if($("#password").val() == ''){
            error = error + 'La contrasenia bacia \n';
        }
        if($("#password").val() != $("#password-confir").val()){
            error = error + 'La contrasenia no coinside \n';
        }
        if($("#nombre").val() == ''){
            error = error + 'Nombre bacio \n';
        }
        if($("#email").val() == ''){
            error = error + 'Email bacio \n';
        }

        console.log(error);

        if(error == ''){
            $.ajax({
                type: "POST",
                url: `./agregar_usuario.php`,
                data: {nombre: $("#nombre").val(),email: $("#email").val(), password: $("#password").val(), genero: genero},
                success: function (response) {
                    console.log(response);
                    if(response.status == 200){
    
                    }else{
    
                    }   
                }
            });
        }
        

    });
});