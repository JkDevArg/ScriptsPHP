<?php 

function genTarjeta(){
  $ch = curl_init('https://fakerapi.it/api/v1/credit_cards?_quantity=1');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $json = curl_exec($ch);
  curl_close($ch);
  
  $data = json_decode($json, true);
  return $data;
  
}


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="card bg-dark text-light">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
          <h4 class="card-title">Generador de Tarjeta</h4>
          <hr>
          <?php var_dump(genTarjeta()); ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
