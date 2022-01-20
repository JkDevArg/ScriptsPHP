<?php
 $fono = 'NUM CELULAR';

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
    "user-id" => "USER ID",
    "api-key" => "API KEY",
    "number" => $fono
);
 
$json = curl_post_request("https://neutrinoapi.net/s ", $postData); 
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
                <h1 class="display-3">Mobile Info</h1>
                <p class="lead">Núm Celular: <?php echo $fono; ?></p>
                <hr class="my-2">
                <?php
                    echo "<p><b>Número: </b>".$fono."</p>";
                    echo "<p><b>País: </b>".$result['country']."</p>";
                    echo "<p><b>Moneda: </b>".$result['currency-code']."</p>";
                    echo "<p><b>Prefijo: </b>".$result['international-calling-code']."</p>";
                    echo "<p><b>Num Internacional: </b>".$result['international-number']."</p>";
                    echo "<p><b>Num Local: </b>".$result['local-number']."</p>";
                    echo "<p><b>Localización: </b>".$result['location']."</p>";
                    echo "<p><b>Empresa </b>".$result['prefix-network']."</p>";
                    echo "<p><b>Tipo: </b>".$result['type']."</p>";
                    if($result['is-mobile'] == 1){ echo '<p><b>Es Celular: </b>Si'; }else{ echo '<p><b>Es Celular: </b>No';};
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