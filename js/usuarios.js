$(document).ready(function(){
    console.log('___ USUARIOS ___');

    $(".borrar").click(function(e){
        e.preventDefault();
        let id = $(this).parent().parent().attr('id');
        
        Swal.fire({
            title: "Eliminar?",
            text: "El registro se eleminara correctamente",
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
                        if(response.status == 200){
                            Swal.fire({
                                title: "Eliminado!",
                                text: "Registro eliminado.",
                                icon: "success"
                            });
                        }else{
                            Swal.fire({
                                icon: "error",
                                title: "Contactar administrador",
                                text: response,
                            });
                        }
                    }
                });
            }
        });
	});

});