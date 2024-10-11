<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $servicio = filter_var($_POST['servicio'], FILTER_SANITIZE_STRING);

    // Configuración del correo
    $to = "huellitas4vip@gmail.com"; // Cambia esto al correo de la empresa
    $subject = "Solicitud de Servicio - Huellitas VIP";
    $message = "Un cliente ha solicitado nuestros servicios.\n\n" .
               "Detalles:\n" .
               "Correo Electrónico: $email\n" .
               "Número de Teléfono: $telefono\n" .
               "Servicio solicitado: $servicio\n";
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado con éxito. Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Error al enviar el correo. Por favor, intenta nuevamente.";
    }
}
?>
