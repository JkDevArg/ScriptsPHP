<?php 

$ip = file_get_contents('https://api.ipify.org');
$ch = curl_init('https://ipinfo.io/'.$ip.'/geo');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);

$geoip = json_decode($json, true); 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>IP Info + Geo</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    </head>
    <body>
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3"><?php echo $ip; ?></h1>
                <p class="lead">Info IP</p>
                <hr class="my-2" />
                <p>
                    <span class="text-info">Ciudad:</span>
                    <?php echo $geoip['city']; ?>
                </p>
                <p>
                    <span class="text-info">Región:</span>
                    <?php echo $geoip['region']; ?>
                </p>
                <p>
                    <span class="text-info">País:</span>
                    <?php echo $geoip['country']; ?>
                </p>
                <p>
                    <span class="text-info">ISP:</span>
                    <?php echo $geoip['org']; ?>
                </p>
                <p>
                    <span class="text-info">Postal:</span>
                    <?php echo $geoip['postal']; ?>
                </p>
                <p>
                    <span class="text-info">Zona Horaria:</span>
                    <?php echo $geoip['timezone']; ?>
                </p>
                <p>
                    <span class="text-info">Localización:</span>
                    <?php echo $geoip['loc']; ?>
                </p>

                <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
                <div id="map" class="map map-home" style="margin: 12px 0 12px 0; height: 400px;"></div>
                <script>
                    var osmUrl = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                        osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                        osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib });
                    var map = L.map("map").setView([<?php echo $geoip['loc']; ?>], 14).addLayer(osm);
                    L.marker([<?php echo $geoip['loc']; ?>]).addTo(map).bindPopup("Tu IP: <?php echo $ip; ?>").openPopup();
                </script>
            </div>
        </div>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
