<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://kit.fontawesome.com/b08b6005dd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="map.css">
    <title>Document</title>
</head>

<body>
    <!-- search-->

    <div style="display: flex;
            align-items: center;
            justify-content: center;
            background-color: #b0d4dc;
            flex-direction: column;">
        <div class="search mb-5 mt-2">
            <i class="fa fa-search"></i>
            <form action="Map.php" method="post">
                <input  name="search" type="text" class="form-control" placeholder="Have a question? Ask Now">
                <button style="background-color: #2596be;" name="submit" class="btn btn-primary">Search</button>
            </form>

        </div>
        <div id="map" style="border-radius: 12px; box-shadow: 0 0 10px rgba(0,0,0,0.3);"></div>
        <div class="container">
        <div class="accordion" id="accordionExample" style="width: 100%;">
            <div class="accordion-item"style="width: 100%;  align-items: center; justify-content: center;">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa-solid fa-list-ul m-2" ></i> Les ATM Disponible
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body" style="overflow-y: scroll;height: 250px;">
                    <?php
                    include_once "connect.php";
                    if(isset($_POST['search'])){
                    $etat = "à votre service";
                    $req1 = mysqli_query($con, "SELECT * FROM map where ville ='".$_POST['search']."';");
                    if (mysqli_num_rows($req1) == 0) {
                        //s'il n'existe pas
                        echo   '.<li id="client_id"> s il vous plait rechercher !</li>.';
                    } else {
                        //si non , affichons la liste 
                        while ($row1 = mysqli_fetch_assoc($req1)) {
                            if($row1['Montant'] <= 0)
                            $etat = "hors service";
                    ?>
                        <div id="font">
                        <strong><i class="fa-solid fa-building-columns"></i> Banque Populaire</strong> 
                        <p style="font-size: 20px ;color:dodgerblue"><i class="fa-solid fa-house-building"></i> Ville actuelle :<?= $row1['ville'] ?></p>
                        <p><i class="fa-solid fa-location-dot"></i> L'adresse de la banque : <span style="color: green;"> <?= $row1['localisation'] ?></span></p>
                        <p><i class="fa-solid fa-paperclip"></i> Symbole de guichet de banque : <span style="color: green;"><?= $row1['guichet'] ?></span></p>
                        <p><i class="fa-solid fa-check"></i> Etat de guichet bancaire : <span style="color: green;"><?=$etat?></span></p>
                        <p><i class="fa-solid fa-map-location"></i> Latitude , Longitude :<code><?= $row1['lat'] ?>,<?= $row1['lon'] ?></code></p>
                        </div>
                        <?php
                        }
                    }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


    <?php
    //include la page de connexion
    include_once "connect.php";
    //requête pour afficher la liste des comptes
    $lan = array();
    $lon = array();
    if (isset($_POST['search']) && $_POST['search'] != "") {
        $req = mysqli_query($con, "SELECT * FROM map where	ville ='" . $_POST['search'] . "';");
    } else {
        $req = mysqli_query($con, "SELECT * FROM map");
    }
    if (mysqli_num_rows($req) == 0) {
        //s'il n'existe pas
        echo " wellcome !";
    } else {
        //si non , affichons la liste 
        while ($row = mysqli_fetch_assoc($req)) {

            $lan[] = $row['lat'];
            $lon[] = $row['lon'];
        }
    }
    ?>
    <script>
        var locations = <?php echo json_encode([$lan, $lon]); ?>;
        var map_init = L.map('map', {
            center: [31.792306, -7.080168],
            zoom: 5
        });
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map_init);
    </script>
    <script>
        for (let i = 0; i < locations[0].length; i++) {
            L.marker([+locations[0][i], +locations[1][i]]).addTo(map_init);
        }
    </script>
</body>

</html>