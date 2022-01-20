<?php
 $ip = file_get_contents('https://api.ipify.org');

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
    "ip" => $ip
);
 
$json = curl_post_request("https://neutrinoapi.net/ip-probe ", $postData); 
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
                <h1 class="display-3">IP Info</h1>
                <p class="lead">TU IP: <?php echo $ip; ?></p>
                <hr class="my-2">
                <?php
                    echo "<p><b>IP: </b>".$ip."</p>";
                    if($result['valid'] == 1){ echo '<p><b>Valido: </b>Es Valido'; }else{ echo '<p><b>Valido: </b>No es valido';};
                    if($result['is-hosting'] == true){ echo '<p><b>Hosting: </b>Si'; }else{ echo '<p><b>Hosting: </b>No';};
                    if($result['is-isp'] == true){ echo '<p><b>ISP: </b>Si'; }else{ echo '<p><b>ISP: </b>No';};
                    if($result['is-proxy'] == true){ echo '<p><b>Proxy: </b>Si'; }else{ echo '<p><b>Proxy: </b>No';};
                    if($result['is-vpn'] == true){ echo '<p><b>VPN: </b>Si'; }else{ echo '<p><b>VPN: </b>No';};
                    if($result['is-v4-mapped'] == true){ echo '<p><b>IPv4: </b>Si'; }else{ echo '<p><b>IPv4: </b>No';};
                    if($result['is-v6'] == true){ echo '<p><b>IPv6: </b>Si'; }else{ echo '<p><b>IPv6: </b>No';};
                    echo "<p><b>Nombre Host: </b>".$result['hostname']."</p>";
                    echo "<p><b>Dominio Host: </b>".$result['host-domain']."</p>";
                    echo "<hr>";
                    echo "<p><b>País: </b>".$result['country-code']."</p>";
                    echo "<p><b>Región: </b>".$result['region']."</p>";
                    echo "<p><b>Ciudad: </b>".$result['city']."</p>";
                    echo "<p><b>Moneda: </b>".$result['currency-code']."</p>";                
                    echo "<hr>";
                    echo "<p><b>Proveedor: </b>".$result['provider-type']."</p>";
                    echo "<p><b>Dominio: </b>".$result['provider-domain']."</p>";
                    echo "<p><b>Web: </b>".$result['provider-website']."</p>";
                    echo "<p><b>Descripción: </b>".$result['provider-description']."</p>";
                    
                ?>
            </div>
        </div>
    </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>