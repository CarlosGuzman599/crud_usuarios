$(document).ready(function(){
    console.log('___ USUARIOS ___');

    $(document).on('click', '.editar', function(e){
        $("#update-usuario").modal("show");
        id = $(this).parent().parent().attr('id');
        $.ajax({
            type: "get",
            url: `./obtener_usuarios.php`,
            data: {id: id},
            success: function (response) {
                if (response[0].nombre) {
                    $("#id").val(id);
                    $("#nombre").val(response[0].nombre);
                    $("#email").val(response[0].email);
                    if(response[0].genero == 'm'){
                        $("#contactChoice2").prop("checked", true);
                    }else{
                        $("#contactChoice3").prop("checked", true);
                    }
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Contactar administrador",
                        text: "Entrada no valida" + response,
                    });
                }
            }
        });
    });

    $(document).on('click', '.borrar', function(e){
        let id = $(this).parent().parent().attr('id');
        Swal.fire({
            title: "Eliminar?",
            text: "El registro se eleminara permanentemente",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminar!"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: `./eliminar_usuario.php`,
                    data: {id: $(this).parent().parent().attr('id')},
                    success: function (response) {
                        response = JSON.parse(response);
                        if(response.respuesta == 'ok'){
                            $("#"+id).remove();
                            Swal.fire({
                                title: "Eliminado!",
                                text: "Registro eliminado.",
                                icon: "success"
                            });
                        }else{
                            Swal.fire({
                                icon: "error",
                                title: "Contactar administrador",
                                text: response.tipo,
                            });
                        }
                    }
                });
            }
        });
    });

    $('.logout').on('click', function(){
        $.ajax({
            type: "post",
            url: `./logout.php`,
            success: function () {
                window.location.replace("./");
            }
        });
    });

    $('#form-update').on('submit', function(e){
        e.preventDefault();
        let error = '';
        let genero = $('input:radio[name=genero]:checked').val();
        if(genero == undefined){
            error = error + 'Falta seleccion de genero \n';
        }
        if($("#password").val() != '' && ($("#password").val() != $("#password-confir").val())){
            error = error + 'La contraseña no coinside \n';
        }
        if($("#nombre").val() == ''){
            error = error + 'Nombre bacio \n';
        }
        if($("#email").val() == ''){
            error = error + 'Email bacio \n';
        }

        if(error == ''){
            $.ajax({
                type: "post",
                url: `./editar_usuario.php`,
                data: {id: $("#id").val(), nombre: $("#nombre").val(), email: $("#email").val(), password: $("#password").val(), genero: genero},
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.respuesta == "correcto") {
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
        }else{
            Swal.fire({
                icon: "error",
                title: "Falta Informacion",
                text: error,
            });
        }
        
    });

    $.ajax({
        type: "get",
        url: `./obtener_usuarios.php`,
        success: function (response) {
            response.forEach(usuario => {
                $("#tbody-usuarios").append(`                    
                    <tr id="${usuario.id}">
                        <th scope="row">${usuario.nombre}</th>
                        <td>${usuario.email}</td>
                        <td>${usuario.genero}</td>
                        <td>${usuario.fecha}</td>
                        <td>
                            <button class="editar"><img src="img/icono pluma-8.png" alt=""></button>
                            <button class="borrar"><img src="img/icono basura-8.png" alt=""></button>
                        </td>
    
                    </tr>`);
            });
        }
    });

});


