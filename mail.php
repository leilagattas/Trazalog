<!-- 
//  $nombreUsuario = $_POST['nombre'];   
//  $telefonoUsuario = $_POST['telefono'];   
//  $mensajeUsuario = $_POST['mensaje'];   
//  $correoUsuario = $_POST['email'];   

// $nombreUsuario = "leila";   
//  $telefonoUsuario = "53215";   
//  $mensajeUsuario = "mensaje";   
//  $correoUsuario = "mail@mail";   

//  $email = "leilagattas@gmail.com";

//  ini_set( 'display_errors', 1);
//  error_reporting( E_ALL );


//  $from = $correoUsuario;
//  $to = $email;
//  $subject = "Mensaje de Contacto";
//  $mensaje = "Hola!";
//  //para el envío en formato HTML 
//  $headers = "MIME-Version: 1.0" . "\r\n";
//  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//  // More headers
//  $headers .= "From: <$correoUsuario>" . "\r\n";
//  $headers .= "Cc: $to" . "\r\n";

//  // esta funcion ejecuta el correo PHP
//  $sendMail = mail($to, $subject, $mensaje, $headers);

//  if( $sendMail ) {
//    echo json_encode(array(
//      'error' => false,
//      'mensaje' => "Mensaje Enviado 😉"
//    ));
//  } else {
//    echo json_encode(array(
//      'error' => true,
//      'mensaje' => "Hubo un problema al enviar su mensaje. Intentélo mas terde."
//    ));
//  } ;

// mail("leilagattas@gmail.com", "Test subject line", "fictional email body", "From: user@email.address");
 
 -->

 <?php
   // data sent in header are in JSON format
   header('Content-Type: application/json');
   // takes the value from variables and Post the data
   $name = $_POST['name'];
   $empresa = $_POST['empresa'];
   $telefono = $_POST['telefono'];
   $mail = $_POST['mail'];
   $usuarios = $_POST['usuarios'];
   $mensaje = $_POST['mensaje'];  
   $to = "ventas@trazalog.com";
   $subject = "Mensaje de Contacto";
   // Email Template
   $message = "<b>Nombre: </b>". $name ."<br>";
   $message .= "<b>Empresa: </b>". $empresa ."<br>";
   $message .= "<b>Telefono: </b>". $telefono ."<br>";
   $message .= "<b>Email: </b>".$mail ."<br>";
   $message .= "<b>Cantidad de Usuarios: </b>".$usuarios ."<br>";
   $message .= "<b>Mensaje : </b>".$mensaje ."<br>";

   $header = "From: "+$mail+" \r\n";
   $headers .= "Reply-To: "+$mail+" \r\n";
   $headers .= "Return-Path: "+$mail+" \r\n";
   $headers .= "CC: info@trazalog.com\r\n";
   $headers .= "BCC: hidden@trazalog.com\r\n";
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";


   $retval = mail ($to,$subject,$message,$header);
   // message Notification
   if( $retval == true ) {
      echo json_encode(array(
         'success'=> true,
         'message' => 'Message sent successfully'
      ));
   }else {
      echo json_encode(array(
         'error'=> true,
         'message' => 'Error sending message'
      ));
   }
?>

