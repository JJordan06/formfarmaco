<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: form_farmaco.html");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$nombres = $_POST['nombres'];
$apellido1 = $_POST['apellidos1'];
$correo = $_POST['correo'];
$dni = $_POST['dni'];
$numero = $_POST['numero'];
$telefono = $_POST['tel'];
$genero = $_POST['genero'];
$edad = $_POST['Edadpac'];
$peso = $_POST['Peso'];
$descripcion = $_POST['descripcionefecto'];
$reportador = $_POST['nombresreportador'];
$apellidorep = $_POST['apellidorep'];
$tefreportador = $_POST['tefreportador'];
$tipo = $_POST['tiporep'];
$medicamento = $_POST['Nombremedicamento'];
$dosis = $_POST['Dosisdiaria'];
$via = $_POST['vadmin'];
$motivo = $_POST['motivo'];

if (empty(trim($nombres))) $nombres = '';
if (empty(trim($apellido1))) $apellido1 = '';


$body = <<<HTML
Pereda Distribuidores SRL <br><hr> 
Este es un reporte de la confirmación de envío.<hr><br>
Estimad@: $nombres<br><br>En breve uno de nuestros representantes se pondrá en contacto con usted. <br>
Muchas gracias por usar este servicio.<br><br>
DATOS DEL PACIENTE:<br>
Nombres del paciente: $nombres<br>
Apellidos del paciente: $apellido1<br>
Correo del paciente: $correo<br>
Tipo de documento del paciente: $dni<br>
N° de documento del paciente: $numero<br>
Teléfono o celular del paciente: $telefono<br>
Género del paciente: $genero<br>
Edad del paciente: $edad<br>
Peso (en Kilogramos) del paciente: $peso<br>
Descripción del efecto o reacción adversa ocasionada al Paciente: $descripcion<br><br>

DATOS DEL REPORTADOR:<br>
Nombres del reportador: $reportador<br>
Apellidos del reportador: $apellidorep<br>
Teléfono o celular del reportador : $tefreportador<br>
Tipo de reportador: $tipo<br>
Nombre del medicamento: $medicamento<br>
Dosis diaria: $dosis<br>
Via de administración: $via<br>
Motivo de la prescipción del medicamento: $motivo<br><br>
HTML;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'farmacovigilancia@peredadist.com';                     //SMTP username
    $mail->Password   = 'wycrdilxiohmepri';                               //SMTP password
    $mail->SMTPSecure = 'ssl';       //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('farmacovigilancia@peredadist.com', 'Mailer');
    $mail->addAddress('dpachecoyarl@gmail.com', 'Joe User');
    $mail->addAddress('farmacovigilancia@peredadist.com', 'Joe User');
    $mail->addAddress('danielpacheco@upeu.edu.pe', 'Joe User');    //Add a recipient

    //Content
    $mail->Subject = "Mensaje web: Formulario Farmacovigilancia";
    $mail->msgHTML($body);
    $mail->AltBody = strip_tags($body);
    $mail->CharSet = 'UTF-8';


    $mail->send();
    echo 'Se envio el mensaje papu';
} catch (Exception $e) {
    echo "Fue pe, lo importante es seguir respirando: {$mail->ErrorInfo}";
}
?>
<!DOCTYPE html>
<html lang="es-PE">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Ingrese la ruta respectiva -->
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=https://peredadist.com/farmacovigilancia/">

</head>

<body>

</body>

</html>