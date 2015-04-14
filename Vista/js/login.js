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

function inicioSesion(){
      
       alert("hola")
     };
   

  

    $("#divLogout").click(function() {
        $.post('Controlador/clsFachada.php', {
            clase: 'clsLogin',
            oper: 'cerrar'

        }, function(data) {
            if (data === "exit") {
                window.location = "index.html";
            }

        }, 'json');
    });
