<?php 
    $pais ='';
    $json = file_get_contents("http://universities.hipolabs.com/search?country=".$pais);
    $arreglo = json_decode($json,"false");
    /* masterguru */
    for ($i = 0; count($arreglo) > $i; $i++) {
        if (!isset($countries[$arreglo[$i]['country']])) {
            $countries[$arreglo[$i]['country']] = 1;
        }
    }
    $countries = array_keys($countries);

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
    <style>a {text-decoration: none;}</style>
  </head>
  <body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">API Universidad</a>
          <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="visually-hidden">(current)</span></a>
                  </li>
                  
              </ul>
          </div>
    </div>
  </nav>

  <div class="container">
        <div class="mb-3">
          <label class="form-label"></label>
          <select class="form-control" id="countriesList">
          <?php
            foreach($countries as $post){
                echo "<option>". $post."</option>";
            }
          ?>
          </select>
        </div>
        <table class="table">
  <thead>
    <tr>
      <td>Nombre</td>
    </tr>
  </thead>
  <tbody id="bodyUni">
  </tbody>
</table>
    </div>



<script>
var countries = document.getElementById('countriesList');

function getUni(record) {
  $("#bodyUni").append('<tr><td><a href="' + record.web_pages[0] + '" target="_blank">' + record.name + '</a></td></tr>');
}
countries.addEventListener("change", function(event) {
  $.ajax({
    type: "GET",
    contentType: "application/json",
    url: "http://universities.hipolabs.com/search?country=" + countries.value,
    asyn: false,
    success: function(data) {
      $("#bodyUni").empty();
      Object.values(data).forEach(val => getUni(val));
    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert(jqXHR.status);
    },
  });
});
</script>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>