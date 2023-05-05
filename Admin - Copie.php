<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <script src="https://kit.fontawesome.com/b08b6005dd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="Admin.css">
  <title>Page Admin</title>
</head>

<body>

  <?php
  session_start();
  ?>
  <!--navbar -->

  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i><img style="height: 30px; border-radius: 3px;" src="th (6).jpg" alt=""></i>
    </label>
    <!--home-->
    <label class="logo">Admin</label>
    <!--End home-->
    <ul id="nav" style="z-index: 999; color: white;">
        <li> <a name="home" id="oper" href="#" class="nav-link">Operations</a></li>
        <li><a id="card_client" name="card" href="#" class="nav-link">Carte</a></li>
        <li><a name="profile" id="profile" href="#" class="nav-link">Admin</a></li>
        <li><a name="profile" id="Guichet" href="#" class="nav-link">Guichet</a></li>
      </ul>
    <!--button-->
    <!--button-->

<!--End Navigation-->
    <!--Admin-->
    <!--Notifications-->
    <?php

    //include la page de connexion
    include_once "connect.php";
    //requête pour afficher la liste des Paiments

    $_POST['notif'] = 0;
    $req = mysqli_query($con, "SELECT * FROM users where usertype='client'");
    if (mysqli_num_rows($req) != 0) {

      //s'il n'existe pas
      $_POST['notif'] = mysqli_num_rows($req);


    ?>
      <div class="navbar-notifications">
        <button class="btnn btn-primary" id="notification" name="notification">
          <i class="fa-solid fa-bell"></i> Notifications
          <span id="notif" class="badge"><?= $_POST['notif'] ?></span>
        </button>
      </div>

    <?php
    }

    ?>
    <!-- End Notifications-->
    <!--End Admin-->
    
  </nav>
  <!--End navbar -->
  <!--Message pour  les clients crée -->
  <div class="accordion3" id="accordion3_message">
    <!--Accordion-->
    <div class="accordion accordion-flush " id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">

          <button style="background-color: #ffcb61;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Notifications d'inscription dans l'application
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <!--php notification-->
          <div>

            <?php

            //include la page de connexion
            include_once "connect.php";
            //requête pour afficher la liste des comptes


            $req = mysqli_query($con, "SELECT * FROM users where usertype='client'");
            if (mysqli_num_rows($req) == 0) {
              //s'il n'existe pas
              echo   '.<li id="client_id">Il n y a pas encore compte ajouter !</li>.';
            } else {
              //si non , affichons la liste 
              while ($row = mysqli_fetch_assoc($req)) {
            ?>
                <div id="items">

                  <p style="margin-left: 10px;"><code><?= $row['first_name'] ?></code> <code><?= $row['last_name'] ?></code> a enregistré un compte sur l'application avec l'e-mail <code><?= $row['email'] ?></code></p>
                  <!--Nous alons mettre l'id de chaque operation dans ce lien -->
                </div>

            <?php
              }
            }
            ?>


          </div>

        </div>
      </div>
    </div>
    <!--End Accordion-->
  </div>
  <!--End Accordion-->
  </div>
  <!--End Message pour  les clients crée -->

  <!--Card client-->
  <div class="col-12">
    <div id="card" class="container">

      <div class="card-container">

        <div class="front">
          <div class="image">
            <img src="chip.png" alt="">
            <img src="visa.png" alt="">
          </div>
          <div class="card-number-box" style="font-size: 1rem;">################</div>
          <div class="flexbox">
            <div class="box">

              <div class="card-holder-name">Nom Complet</div>
            </div>
            <div class="box">
              <span>expires end</span>
              <div class="expiration">
                <span class="exp-month">mm</span>
                <span class="exp-year">yy</span>
              </div>
            </div>
          </div>
        </div>

        <div class="back">
          <div class="stripe"></div>
          <div class="box">
            <span>cvv</span>
            <div class="cvv-box"></div>
            <img src="visa.png" alt="">
          </div>
        </div>

      </div>

      <form action="controle.php" method="post">
        <div class="inputBox">
          <span>Numéro de carte</span>
          <input name="num_carte" type="text" maxlength="20" class="card-number-input">
          <span>N° compte</span>
          <input name="num" type="text" maxlength="20" class="client-number-input">
        </div>
        <div class="inputBox">
          <span>Titulaire de la carte</span>
          <input name="nom" type="text" class="card-holder-input">
        </div>
        <div class="flexbox">
          <div class="inputBox">
            <span>month</span>
            <select name="mois" id="" class="month-input">
              <option value="" selected disabled>month</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="inputBox">
            <span>year</span>
            <select name="annee" id="" class="year-input">
              <option value="" selected disabled>year</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
            </select>
          </div>
          <div class="inputBox">
            <span>cvv</span>
            <input name="cvv" type="text" maxlength="4" class="cvv-input">
          </div>
        </div>
        <input name="card" type="submit" value="submit" class="submit-btn">
      </form>

    </div>

  </div>


  <!--card script-->

  <script>
    document.querySelector('.card-number-input').oninput = () => {
      document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
    }

    document.querySelector('.card-holder-input').oninput = () => {
      document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
    }

    document.querySelector('.month-input').oninput = () => {
      document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
    }

    document.querySelector('.year-input').oninput = () => {
      document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
    }

    document.querySelector('.cvv-input').onmouseenter = () => {
      document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
      document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
    }

    document.querySelector('.cvv-input').onmouseleave = () => {
      document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
      document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
    }

    document.querySelector('.cvv-input').oninput = () => {
      document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
    }
  </script>
  <!--End card script-->
  <!--End card client-->
  <!-- card Operations-->
  <?php

  include("message.php");

  ?>
  <div id="opertritement">
  <div id="operation1" class="row mt-1">
    <div class="left1" style="margin-bottom: 10px;">
      <div class="left_form" class="col-sm-3 mt-3" style="margin-bottom: 10px;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Déposer L'argent</h5>
            <p class="card-text">Toutes les informations client doivent étre renseignées.</p>
            <a id="deposer1" name="deposer1" href="#" class="btn btn-primary">Déposer</a>
          </div>
        </div>
      </div>
      <div class="tritement" class="col-sm-3 mt-3 ">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Retirer L'argent</h5>
            <p class="card-text">Toutes les informations client doivent étre renseignées.</p>
            <a id="retirer_argent" name="retirer" href="#" class="btn btn-primary">Retirer</a>
          </div>
        </div>
      </div>
    </div>
    <div class="right1">
      <div class="tritement" class="col-sm-3 " style="margin-bottom: 10px;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ajustement</h5>
            <p class="card-text">Traitement Des informations sur les comptes des clients.</p>
            <a id="Traitement" name="tritement" href="#" class="btn btn-primary">Ouvrir </a>
          </div>
        </div>
      </div>
      <div class="left_form" class="col-sm-3 ">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Message</h5>
            <p class="card-text">Toutes les informations client doivent étre renseignées.</p>
            <a id="message" name="retirer" href="notification.php" class="btn btn-primary">Envoyer</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--End card operation-->
  <div id="element_form" class="card Client-form-card  col-6 bg-transparent border-0">
    <div class="Form-body">
      <!--form Client-->
      <form action="controle.php" method="post" id="element_form">
        <h1 class="form-header card-title">
          <i class="fa fa-adit"><img style="height: 50px;" src="th (20).jpg" alt=""></i> Client
        </h1>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword4">Code secret</label>
            <input type="number" name="code" class="form-control" id="inputPassword4" placeholder=" Entre Code de compte">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Ville</label>
            <input type="text" name="ville" class="form-control" id="inputPassword4" placeholder="Entre Ville">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Numéro de compte</label>
          <input type="text" name="numero" class="form-control" id="exampleFormControlInput1" placeholder="Entre Numéro de compte">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">N° de Client</label>
          <input type="text" name="numero_client" class="form-control" id="exampleFormControlInput1" placeholder="Entre N° de Client">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputAddress">Numéro de chèque</label>
            <input type="number" name="cheque" class="form-control" id="inputEmail4" placeholder="Enter Date">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Solde</label>
            <input type="number" name="solde" class="form-control" id="inputPassword4" placeholder=" Enter Solde Client">
          </div>
        </div>
        <!--Form choose -->
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sélectionner Type De Compte</label>
        <select name="type_compte" class="form-control" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
          <option value="">--Sélectionner Type De Compte--</option>
          <option value="Cheque">Chèque</option>
          <option value="Economies">Des économies</option>
          <option value="Entreprise">Entreprise</option>
        </select>
        <button id="submit" name="account" type="submit" class="btn btn-primary my-3">Submit</button>
        <!--Form choose -->
      </form>

      <!--End Form Client-->
    </div>
  </div>
  <!--Card: deposer card-->
  <div id="form_deposer" class="card deposer-card w-100 m-auto mt-5 border-0">
    <!--card body-->
    <div style=" width: fit-content;">

      <!--deposit form-->
      <form action="controle.php" class="deposer-form" method="post">
        <!--form group-->
        <div class="form-group mb-2">
          <label for="">Saisir Le Montant Du Déposer</label>
          <input type="text" name="deposer_montant" class="form-control" id="" placeholder="Saisir Le Montant Du Déposer">
        </div>
        <!--End form group-->
        <!--code client-->
        <div class="form-group">
          <label for="inputAddress">Code</label>
          <input type="text" name="Code" class="form-control" id="inputEmail4" placeholder="Enter Code de compte">
        </div>
        <!-- End code client-->
        <!--form group-->
        <div class="form-group">
          <label for="">Sélectionner Le Compte</label>
          <!--select account option-->
          <select name="select" class="form-control my-3" id="">
            <option value="">--Sélectionner Le Compte--</option>
            <option value="Cheque">Chèque</option>
            <option value="Economies">Des économies</option>
            <option value="Entreprise">Entreprise</option>
          </select>
          <!--End select account option-->
        </div>
        <!--End form group-->


        <!--form group-->
        <div class="form-group  my-2">
          <button id="transact-btn" name="deposer" class="btn btn-md" style="background-color: rgb(0, 179, 255);">Déposer</button>
        </div>

        <!--End form group-->
      </form>
      <!--End deposit form-->

    </div>
    <!--End card body-->
  </div>
  <!--End Card: Déposer card-->
  <!--Card: retirer card-->
  <div class="card retirer-card w-100 m-auto mt-5 border-0" id="retirer">
    <!--card body-->
    <div class="card-body">

      <!--retirer form-->
      <form action="controle.php" class="retirer-form" method="post">
        <!--form group-->
        <div class="form-group mb-2">
          <label for="">Saisir Le Montant Du Retirer</label>
          <input type="text" name="montant" class="form-control" id="" placeholder="Saisir Le Montant Du Retirer">
        </div>
        <div class="form-group mb-2">
          <label for="">N° Client</label>
          <input type="text" name="client" class="form-control" id="" placeholder="Saisir N° Client">
        </div>
        <!--End form group-->

        <!--form group-->
        <div class="form-group">
          <label for="">Sélectionner Le Compte</label>
          <!--select account option-->
          <select name="option" class="form-control my-3" id="">
            <option value="">--Sélectionner Le Compte--</option>
            <option value="Cheque">Chèque</option>
            <option value="Economies">Des économies</option>
            <option value="Entreprise">Entreprise</option>
          </select>
          <!--End select account option-->
        </div>
        <!--End form group-->


        <!--form group-->
        <div class="form-group my-2">
          <button id="transact-btn" name="retirer" class="btn btn-md" style="background-color: rgb(0, 179, 255);">Retirer</button>
        </div>
        <!--End form group-->

      </form>
      <!--End retirer form-->

    </div>
    <!--End card body-->
  </div>
  <!--End Card: retirer card-->
  <!-- liste admin -->
  <!--Message pour  les clients crée -->
  <div class="container_client" id="container2">
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Admin
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="notification">
            <?php
            include_once "connect.php";
            $req = mysqli_query($con, "SELECT * FROM users where usertype='admin'");
            if (mysqli_num_rows($req) == 0) {
              echo '<p>Il n\'y a pas encore de compte ajouté!</p>';
            } else {
              while ($row = mysqli_fetch_assoc($req)) {
            ?>
                <ul class="user-info">
                  <li><strong>Prénom:</strong> <?= $row['first_name'] ?></li>
                  <li><strong>Nom:</strong> <?= $row['last_name'] ?></li>
                  <li><strong>Email:</strong> <?= $row['email'] ?></li>
                  <li><strong>Mot de passe:</strong> <?= $row['password1'] ?></li>
                  <li><strong>Type:</strong> <?= $row['usertype'] ?></li>
                  <li class="user-actions">
                    <a href="modifier.php?id=<?= $row['user_id'] ?>" class="modify-link">Modifier</a>
                    <a href="supprimer.php?id=<?= $row['user_id'] ?>" class="delete-link">Supprimer</a>
                  </li>
                </ul>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--End Message pour  les clients crée -->

  <div class="compte" id="compte">
    <div id="bt">
      <div class="add-account-btn">
        <a id="ajouter_compte" href="#" class="Btn_add">Ajouter un compte</a>
      </div>
    </div>

    <form action="Admin.php" method="post" class="search-form">
      <div class="search-inputs">
        <input type="text" name="search" placeholder="Rechercher par ID">
        <div class="search-buttons">
          <input type="submit" value="Rechercher" name="submit">
          <input type="submit" value="Actualiser" name="submit">
          <input value="Effacer" type="reset" name="submit">
        </div>
      </div>

      <select id="select" name="select" class="form-select" aria-label="Default select example">
        <option selected>Rechercher dans...</option>
        <option value="1">Transactions</option>
        <option value="2">Comptes</option>
      </select>
    </form id="formpaiment">
    <header>
        <h1>Liste des comptes et opérations</h1>
    </header>
    <div style="overflow: scroll; height: 200px; width: 100%;">
    <table class="table1">
      
      <thead>
        <tr id="items">
          <th>ID Compte</th>
          <th>ID Client</th>
          <th>Numéro de compte</th>
          <th>Mot de passe</th>
          <th>Ville</th>
          <th>Type de compte</th>
          <th>Montant</th>
          <th>Date de création</th>
          <th>Modifier</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //include la page de connexion
        include_once "connect.php";
        //requête pour afficher la liste des comptes
        $req = mysqli_query($con, "SELECT * FROM accounts");
        if (isset($_POST['search']) && $_POST['search'] != "") {
          $req = mysqli_query($con, "SELECT * FROM accounts where account_id=" . $_POST['search'] . ";");
        } else {
          $req = mysqli_query($con, "SELECT * FROM accounts");
        }
        if (mysqli_num_rows($req) == 0) {
          //s'il n'existe pas des comptes dans la base de donné , alors on affiche ce message :
          echo "";
        } else {
          //si non , affichons la liste de tous les comptes
          while ($row = mysqli_fetch_assoc($req)) {
        ?>
            <tr class="cc">
              <td><?= $row['account_id'] ?></td>
              <td><?= $row['user_id'] ?></td>
              <td><?= $row['account_number'] ?></td>
              <td><?= $row['password'] ?></td>
              <td><?= $row['ville'] ?></td>
              <td><?= $row['account_type'] ?></td>
              <td><?= $row['balance'] ?></td>
              <td><?= $row['create_at'] ?></td>
              <!--Nous alons mettre l'id de chaque compte dans ce lien -->
              <td><a name="Modifier" href="Modifier.php?account_id=<?= $row['account_id'] ?>"><img src="th (30).jpg"></a></td>
              <td><a href="controle.php?account_id=<?= $row['account_id'] ?>"><img src="th (29).jpg"></a></td>
            </tr>

        <?php
          }
        }
        ?>


    </table>
      </div>
    <div style="width: 100%; overflow: scroll; height: 200px;" >
      <table class="table3" >

        <tr id="items">
          <th>Id</th>
          <th>Type De Trensaction</th>
          <th>Type Compte</th>
          <th>Montant</th>
          <th>statut</th>
          <th>Date</th>

        </tr>
        <?php
        //include la page de connexion
        include_once "connect.php";
        //requête pour afficher la liste 
        $req = mysqli_query($con, "SELECT * FROM operation");
        if (isset($_POST['search']) && $_POST['search'] != "") {
          $req = mysqli_query($con, "SELECT * FROM operation where id_oeration=" . $_POST['search'] . ";");
        } else {
          $req = mysqli_query($con, "SELECT * FROM operation");
        }
        if (mysqli_num_rows($req) == 0) {
          //s'il n'existe pas  dans la base de donné , alors on affiche ce message :
          echo "";
        } else {
          //si non , affichons la liste de tous 
          while ($row = mysqli_fetch_assoc($req)) {
        ?>
            <tr class="cc">
              <td><?= $row['id_oeration'] ?></td>
              <td><?= $row['type_operation'] ?></td>
              <td><?= $row['type_account'] ?></td>
              <td><?= $row['Montant'] ?></td>
              <td><?= $row['statut'] ?></td>
              <td><?= $row['date'] ?></td>

            </tr>
        <?php
          }
        }
        ?>


      </table>
    </div>
  </div>
  <!--form data-->
  <div id="ddddd" class="d-flex w-100 mt-3" style="justify-content: center; ">
    <div class="data1" id="hhh">
      <h1>Add Data Form</h1>
      <?php $message = ""; ?>
      <form id="form" action="paiement.php" method="post">
        <?php include("message.php"); ?>
        <label class="lab1" for="latitude">Latitude:</label>
        <input class="input1" type="text" id="latitude" name="latitude" required>

        <label class="lab1" for="longitude">Longitude:</label>
        <input class="input1" type="text" id="longitude" name="longitude" required>

        <label class="lab1" for="ville">Ville:</label>
        <input class="input1" type="text" id="ville" name="ville" required>

        <label class="lab1" for="localisation">Localisation:</label>
        <input class="input1" type="text" id="localisation" name="localisation" required>

        <label class="lab1" for="guichet">Guichet:</label>
        <input class="input1" type="text" id="guichet" name="guichet" required>

        <label class="lab1" for="latitude">Montant:</label>
        <input class="input1" type="text" id="latitude" name="Montant" required>

        <button name="Guichet" type="submit">Add Data</button>
      </form>
    </div>
  </div>

  <script src="admin.js"></script>
</body>

</html>