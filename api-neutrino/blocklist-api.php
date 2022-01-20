<?php
$ip = "143.0.200.100";
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
 
$json = curl_post_request("https://neutrinoapi.net/ip-blocklist ", $postData); 
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
                <h1 class="display-3">IP BlockList</h1>
                <p class="lead"><span class="badge bg-dark"><?php echo $ip; ?></span></p>
                <hr class="my-2">
                <?php
                    echo "<p><b>IP: </b>".$result['ip']."</p>";
                    if($result['is-bot'] == true){ echo '<p><b>BOT: </b>Si'; }else{ echo '<p><b>BOT: </b>No';};
                    if($result['is-dshield'] == true){ echo '<p><b>DShield: </b>Si'; }else{ echo '<p><b>DShield: </b>No';};
                    if($result['is-exploit-bot'] == true){ echo '<p><b>Exploit BOT: </b>Si'; }else{ echo '<p><b>Exploit BOT: </b>No';};
                    if($result['is-hijacked'] == true){ echo '<p><b>Hijacked: </b>Si'; }else{ echo '<p><b>Hijacked: </b>No';};
                    if($result['is-listed'] == true){ echo '<p><b>Lista: </b>Si'; }else{ echo '<p><b>Lista: </b>No';};
                    if($result['is-malware'] == true){ echo '<p><b>Malware: </b>Si'; }else{ echo '<p><b>Malware: </b>No';};
                    if($result['is-proxy'] == true){ echo '<p><b>Proxy: </b>Si'; }else{ echo '<p><b>Proxy: </b>No';};
                    if($result['is-spam-bot'] == true){ echo '<p><b>Spam BOT: </b>Si'; }else{ echo '<p><b>Spam BOT: </b>No';};
                    if($result['is-spider'] == true){ echo '<p><b>Spider: </b>Si'; }else{ echo '<p><b>Spider: </b>No';};
                    if($result['is-spyware'] == true){ echo '<p><b>Spyware: </b>Si'; }else{ echo '<p><b>Spyware: </b>No';};
                    if($result['is-tor'] == true){ echo '<p><b>TOR: </b>Si'; }else{ echo '<p><b>TOR: </b>No';};
                    if($result['is-vpn'] == true){ echo '<p><b>VPN: </b>Si'; }else{ echo '<p><b>VPN: </b>No';};
                ?>
            </div>
        </div>
    </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>