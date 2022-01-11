<?php

    use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];

        $errors = array();
        
        if(empty($nombre)){
            $errors[] = 'El campo <b>nombre</b> es obligatorio';
        }
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'El <b>Correo</b> no es valido, intente de nuevo';
        }
        if(empty($asunto)){
            $errors[] = 'El campo <b>asunto</b> es obligatorio';
        }
        if(empty($mensaje)){
            $errors[] = 'El campo <b>mensaje</b> es obligatorio';
        }
        if(count($errors) == 0){
           $msj = "De: $nombre <a href='mailto:$correo'>$correo</a><br>";
           $msj .= "Asunto: $asunto<br><br>";
           $msj .= "Cuerpo del mensaje:";
           $msj .= '<p>'.$mensaje.'</p>';
           $msj .= "--<p> Este mensaje se envio cesde un formulario de prueba</p>";
            
           $mail = new PHPMailer(true);

           try{
               $mail->SMTPDebug = SMTP::DEBUG_OFF;
               $mail->isSMTP();
               $mail->Host = 'host.tucorreo@mail.com';
               $mail->SMTPAuth = true;
               $mail->Username = 'tucorreo@mail.com';
               $mail->Password = 'CONTRASEÑA CORREO';
               $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
               $mail->Port = '465';

               $mail->setFrom('CAMBIAR CORREO DE ', 'CAMBIAR TEXTO');
               $mail->addAddress('CAMBIAR CORREO PARA', 'CAMBIAR TEXTO');
               $mail->isHTML(true);
               $mail->Subject = 'Formulario de Prueba';
               $mail->Body = utf8_decode($msj);
               $mail->send();

               $respuesta = 'Correo enviado exitosamente';
            } catch(Exception $e){
                $respuesta = 'Mensaje ' . $mail->ErrorInfo;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <script src="js/bootstrap.min.js"></script>
</head>
<body class="bg-dark text-light">
    <main>
        <div class="container">
            <header class="mb-4 border-bottom">
                <h1 class="fs-4">Formulario</h1>
            </header>
            <?php 
                if(isset($errors)){
                    if(count($errors) > 0){
            ?>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php foreach($errors as $error){ echo $error.'<br>'; } ?>
                    </div>
                    
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form" autocomplete="off">
                        <div class="mb-3">
                            <label for="nombre" class="form-label"> Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label"> Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label"> Asunto</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" required>
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label"> Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                    </form>
                </div>
            </div>
            <hr>
            <?php if(isset($respuesta)) { ?>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="alert alert-info" role="alert">
                        <strong><?php echo $respuesta; ?></strong>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>