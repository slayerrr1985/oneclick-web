/* 
    Controlador web Oneclick
    Paula Rubiera
    2 julio 2018
 */


// Inicialización de calendario

var dateAsString;

$( "#datepicker" ).datepicker({
	inline: true,
    dateFormat: "yy-mm-dd",
    dayNamesMin: [ "D", "L", "M", "X", "J", "V", "S" ],
    dayNamesShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
    firstDay: 1,
});

$(document).ready(function() {
    
/* SMOOTH SCROLLING */

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });


    $("#botoncontacto").click( function(){

        console.log("Formulario de contacto");

        var nombre = document.getElementById("nombre").value; 
        var telefono = document.getElementById("telefono").value; 
        var email = document.getElementById("email").value; 

        dateAsString = $( "#datepicker" ).datepicker( "getDate" );
        var dateAsObject = $('#datepicker').datepicker( 'getDate' ); //the getDate method*/
        /*dateAsString = $.datepicker.parseDate( format, value, options );*/
        var fecha = dateAsObject.getDate() + "/" + dateAsObject.getMonth() + "/" + dateAsObject.getFullYear();
        var tiempo = document.getElementById("tiempo").value;
        var horario = document.getElementById("horario").value;         

        var datosForm = "CONTACTO DESDE EL FORMULARIO ONECLICK";
        datosForm +=    "\n---------------------------------------\n";

        datosForm += "\nNombre: " + nombre;
        datosForm += "\nTeléfono de contacto: " + telefono;
        datosForm += "\nCorreo electrónico: " + email;
        datosForm += "\nFecha elegida para la llamada: " + fecha;
        datosForm += "\nTiempo necesario para la llamada: " + tiempo + " minutos";
        datosForm += "\nHorario preferible de llamada: " + horario;

        console.log(datosForm);

        $.ajax({

            type: 'POST',
            url: 'php/procesa_form.php',
            data: {
                datosForm: datosForm
            },
            success: function(){
                console.log("Datos procesados");
            }        
        })

    });




   $("#botonunete").click( function(){

        console.log("Formulario de únete");

        var nombre = document.getElementById("nombre").value; 
        var apellidos = document.getElementById("apellidos").value; 
        var email = document.getElementById("email").value; 
        var telefono = document.getElementById("telefono").value; 
        var comentario = document.getElementById("comentario").value; 

        var datosForm = "CONTACTO DESDE EL FORMULARIO ÚNETE";
        datosForm +=    "\n------------------------------------\n";

        datosForm += "\nNombre: " + nombre;
        datosForm += "\nApellidos: " + apellidos;
        datosForm += "\nCorreo electrónico: " + email;
        datosForm += "\nTeléfono de contacto: " + telefono;
        datosForm += "\nCarta de presentacion: " + comentario;

        console.log(datosForm);

        $.ajax({

            type: 'POST',
            url: 'php/procesa_form_unete.php',
            data: {
                datosForm: datosForm
            },
            success: function(){
                console.log("Datos procesados");
            }        
        })

    });


    

});


