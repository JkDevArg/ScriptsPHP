<?php
$email = "jkdevarg@gmail.com";
function curl_post_request($url, $data) 
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}
 
$postData = array(
    "user-id" => "jkdevarg",
    "api-key" => "9f5Ue7a2o19UPPk9FpBNGK8n2sv0KlYughrD2ocART2dRj4h",
    "email" => $email
);
 
$json = curl_post_request("https://neutrinoapi.net/email-validate ", $postData); 
$result = json_decode($json, true);

?>

<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3">Email Info</h1>
                <p class="lead">Email: <?php echo $email; ?></p>
                <hr class="my-2">
                <?php
                    echo "<p><b>Dominio: </b>".$result['domain']."</p>";
                    echo "<p><b>Email: </b>".$result['email']."</p>";
                    if($result['is-freemail'] == true){ echo '<p><b>Gratuito: </b>Si'; }else{ echo '<p><b>Gratuito: </b>No';};
                    if($result['is-personal'] == true){ echo '<p><b>Personal: </b>Si'; }else{ echo '<p><b>Personal: </b>No';};
                    echo "<p><b>Proveedor: </b>".$result['provider']."</p>";
                    if($result['valid'] == true){ echo '<p><b>Valido: </b>Si'; }else{ echo '<p><b>Valido: </b>No';};
                ?>
            </div>
        </div>
    </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>