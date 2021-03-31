$(function (){
    var mayus = new RegExp("^(?=.*[A-Z])");
    var lower = new RegExp("^(?=.*[a-z])");
    var len = new RegExp("^(?=.{6,})");

    $("#contrasenia-1").on("keyup",function (){
        var pass=$("#contrasenia-1").val();
        if(mayus.test(pass) && lower.test(pass) && len.test(pass)){
            $("#mensaje").text("Segura").css("color","green");
        }else{
            $("#mensaje").text("Insegura").css("color","red");
        }
    });
    $("#contrasenia-2").on("keyup",function (){
        var pass=$("#contrasenia-1").val();
        var pass2=$("#contrasenia-2").val();
        if(pass == pass2){
            $("#mensaje-2").text("Coinciden").css("color","green");
        }else{
            $("#mensaje-2").text("No coinciden").css("color","red");
        }
    });
});