$(document).ready(function(){
    console.log('___ LOGIN ___')

    $('#form-login').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: `./login.php`,
            data: {email: $("#email").val(), password: $("#password").val()},
            success: function (response) {
                console.log(response);
                if(response.status == 200){

                }else{

                }   
            }
        });

    });

});