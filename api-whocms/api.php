<?php
$url = NULL;
$web = $_POST['url'];
if(isset($_POST['enviar'])) {
    $ch = curl_init();

    $ch = curl_init('https://whatcms.org/API/Tech?key=YOUR API KEY&url='.$web);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);
    curl_close($ch);
    $exec = json_decode($json, true); 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>a{ text-decoration: none;}</style>
  </head>
  <body>
        <div class="container">
            <h1 class="display-3 text-danger"><?php echo $web; ?></h1>
            <p class="lead">What CMS</p>
            <hr class="my-2" />
            <p>
                <span class="text-info">CMS:</span>
                <a href="<?php echo $exec['results'][1]['url']; ?>"><?php echo $exec['results'][1]['name']; ?></a>
            </p>
            <p>
                <span class="text-info">Versión:</span>
                <?php echo $exec['results'][1]['version']; ?>
            </p>
            <p>
                <span class="text-info">Constructor:</span>
                <a href="<?php echo $exec['results'][0]['url']; ?>"><?php echo $exec['results'][0]['name']; ?></a>
            </p>
            <p>
                <span class="text-info">Lenguaje:</span>
                <?php echo $exec['results'][2]['name']; ?>
            </p>
            <p>
                <span class="text-info">Base de Datos:</span>
                <?php echo $exec['results'][3]['name']; ?>
            </p>
            <p>
                <span class="text-info">Social:</span>
                <?php echo $exec['meta']['social'][0]['network']; ?><br>
                <span class="text-info">Perfil:</span>
                <a href="<?php echo $exec['meta']['social'][0]['url']; ?>">@<?php echo $exec['meta']['social'][0]['profile']; ?></a>
                
            </p>
        </div>
<?php }else{
    echo 'Solicitud no encontrada';
}
?>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
