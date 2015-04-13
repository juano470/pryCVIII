    $(document).ready(function(){

                $("#contactLink").click(function(){
                    if ($("#contactForm").is(":hidden")){
                        $("#contactForm").slideDown("slow");
                    }
                    else{
                        $("#contactForm").slideUp("slow");
                    }
                });
                
            });
            
            function closeForm(){
                $("#messageSent").show("slow");
                setTimeout('$("#messageSent").hide();$("#contactForm").slideUp("slow")', 2000);
           }


    $("#login").click(function() {
        var login = $("#nombre").val();
        var pass = $("#pass").val();
        $.post('Controlador/fachada.php', {
            clase: 'clsLogin',
            oper: 'login',
            user: login,
            pass: pass

        }, function(data) {
            if (data === "admin") {
                window.location = "admin.php";
            }
             else if (data === "estudiante") {
                window.location = "frmestudiante.php";
            }
           

        }, 'json');
    });

    $("#divLogout").click(function() {
        $.post('Controlador/fachada.php', {
            clase: 'clsLogin',
            oper: 'cerrar'

        }, function(data) {
            if (data === "exit") {
                window.location = "index.html";
            }

        }, 'json');
    });
