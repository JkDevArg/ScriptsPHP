<?php
$bin = "47192100";
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
    "bin-number" => $bin
);
 
$json = curl_post_request("https://neutrinoapi.net/bin-lookup", $postData); 
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
                <h1 class="display-3">Bin Info</h1>
                <p class="lead">Bin: <?php echo $bin; ?></p>
                <hr class="my-2">
                <?php
                    echo "<p><b>Número Bin: </b>".$result['bin-number']."</p>";
                    echo "<p><b>Banda: </b>".$result['card-brand']."</p>";
                    echo "<p><b>Categoria: </b>".$result['card-category']."</p>";
                    echo "<p><b>Tipo: </b>".$result['card-type']."</p>";
                    echo "<p><b>País: </b>".$result['country']."</p>";
                    echo "<p><b>Moneda: </b>".$result['currency-code']."</p>";
                    if($result['is-commercial'] == true){ echo '<p><b>Comercial: </b>Si'; }else{ echo '<p><b>Comercial: </b>No';};
                    if($result['is-prepaid'] == true){ echo '<p><b>Pre Paga: </b>Si'; }else{ echo '<p><b>Pre Paga: </b>No';};
                    echo "<p><b>Banco: </b>".$result['issuer']."</p>";
                    echo "<p><b>Banco Tel: </b>".$result['issuer-phone']."</p>";
                    echo "<p><b>Banco Web: </b>".$result['issuer-website']."</p>";
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