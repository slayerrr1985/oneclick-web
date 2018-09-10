<?php

    $datos = $_POST['datosForm'];    

    // Only process POST requests.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = "Oneclick";
        $mail = "info@oneclick.es";
        $datos = $_POST['datosForm'];    

        // Set the recipient email address.
        $recipient = "info@oneclick.es, paula.rubiera@oneclick.es";

        // Set the email subject.
        $subject = "Contacto web Oneclick";

        // Build the email content.
        $email_content = $datos;

        // Build the email headers.
        $email_headers = "From: $name <$mail>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "¡Gracias! Tu mensaje ha sido enviado.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "¡Ups! Algo ha ido mal y no hemos podido enviar tu mensaje.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Ha ocurrido un error en el envío. Por favor, inténtalo de nuevo.";
    }





?>