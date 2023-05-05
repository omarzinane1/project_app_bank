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
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">-->
    <link rel="stylesheet" href="main.css">
    <title>Header</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <!--Main page header-->
    <!--Navigation-->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i><img style="height: 30px; border-radius: 3px;" src="th (6).jpg" alt=""></i>
        </label>
        <!--home-->
        <label class="logo"><i class="fa-solid fa-building-columns"></i> Banque</label>
        <!--End home-->
        <ul id="nav" style="z-index: 999;">
            <li><a class="active" href="#">Page Home</a></li>
            <li><a href="HistoriqueP.php">Historique</a></li>
            <li><a href="login.php">Quitter</a></li>
        </ul>
        <!--button-->
        <!--button-->
    </nav>
    <!--End Navigation-->

    <!--Start transact-->

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <?php
        include("message.php");
        ?>
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Transaction</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color:white;"></button>
        </div>
        <!--offcanvas: transact body-->
        <div class="offcanvas-body">
            <small class="card-text text-white">
                choisissez une option ci-dessous pour effectuer une transaction.
            </small>
            <!--Transaction type -->
            <select name="transact-type" class="form-control my-3" id="transact-type">
                <option value="" style="width: 70%;">-Sélectionner type de transaction-</option>
                <option value="Paiement" style="width: 70%;">Paiement</option>
                <option value="transfert" style="width: 70%;">Transfert</option>
                <option value="Cheque" style="width: 70%;">Chèque</option>

            </select>
            <!--End Transaction type -->

            <!--Card: payment card-->
            <form action="paiement.php" method="post" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">
                <div class="card payment-card" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">
                    <!--card body-->

                    <div class="card-body" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">
                        <!--form group-->

                        <div class="form-group mb-2" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">

                            <label for="">Titulaire du compte/Nom Du Bénéficiaire</label>
                            <input type="text" name="Beneficiaire" class="form-control" id="" placeholder="Saisir Titulaire du compte/Nom Du Bénéficiaire">
                        </div>
                        <!--End form group-->
                        <!--form group-->
                        <div class="form-group mb-2">
                            <label for="">Le Numéro De Bénéficiaire</label>
                            <input type="text" name="account_number" class="form-control" id="" placeholder="Saisir Numéro De Bénéficiaire">
                        </div>
                        <!--End form group-->
                        <!--form group-->
                        <div class="form-group">
                            <label for="">Sélectionner Le Compte</label>
                            <!--select account option-->
                            <select name="account" class="form-control my-3" id="">
                                <option value="">--Sélectionner Le Compte--</option>
                                <!--php-->
                                <?php
                                include_once "connect.php";
                                //include la page session pour id_users
                                include("session.php");
                                $req = mysqli_query($con, "SELECT * FROM accounts where user_id='$id'");
                                if (mysqli_num_rows($req) > 0) {
                                    while ($row = mysqli_fetch_assoc($req)) {
                                    
                                ?>
                                <option value="<?=$row['account_type']?>"><?=$row['account_type']?></option>
                                <?php
                                }
                                }else{
                                    echo'<option value="">--pas des comptes disponible--</option>';
                                }
                                ?>
                            </select>
                            <!--End select account option-->
                        </div>
                       
                        <!--End form group-->
                        <!--form group-->
                        <div class="form-group mb-2">
                            <label for="">référence</label>
                            <input type="text" name="reference" class="form-control" id="" placeholder="Saisir référence">
                        </div>
                        <!--End form group-->
                        <!--form group-->
                        <div class="form-group mb-2">
                            <label for="">Saisir Le Montant Du Paiement</label>
                            <input type="text" name="montant" class="form-control" id="" placeholder="Saisir Le Montant Du Paiement">
                        </div>
                        <!--End form group-->
                        <!--form group-->
                        <div class="form-group mb-2">
                            <button name="payer" id="transact-btn" class="btn btn-md">Payer</button>
                        </div>
                        <!--End form group-->

                    </div>
                    <!--End card body-->

                </div>
            </form>
            <!--End Card: payment card-->


            <!--Card: transfer card-->
            <form action="paiement.php" method="post" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">
                <div class="card transfer-card" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">
                    <!--card body-->
                    <div class="card-body" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">

                        <!--form group-->
                        <div class="form-group" style="background-color: #f0f0f0;font-family: Arial, sans-serif;">
                            <label for="">Sélectionner Le Compte</label>
                            <!--select account option-->
                            <select name="account_type1" class="form-control my-3" id="">
                                <option value="">--Sélectionner Le Compte--</option>
                                <option value="Cheque">--Chèque--</option>
                                <option value="Economies">--Des économies--</option>
                                <option value="Entreprise">--Entreprise--</option>
                            </select>
                            <!--End select account option-->
                        </div>
                        <!--End form group-->
                        <div class="form-group mb-2">
                            <label for="">N° compte destinataire</label>
                            <input type="text" name="montant" class="form-control" id="" placeholder="Saisir N° compte">
                        </div>
                        <!--form group-->
                        <div class="form-group">
                            <label for="">Sélectionner Le Compte</label>
                            <!--select account option-->
                            <select name="account_type2" class="form-control my-3" id="">
                                <option value="">--Sélectionner Le Compte--</option>
                                <!--php-->
                                <?php
                                include_once "connect.php";
                                //include la page session pour id_users
                                include("session.php");
                                $req = mysqli_query($con, "SELECT * FROM accounts where user_id='$id'");
                                if (mysqli_num_rows($req) > 0) {
                                    while ($row = mysqli_fetch_assoc($req)) {
                                    
                                ?>
                                <option value="<?=$row['account_type']?>"><?=$row['account_type']?></option>
                                <?php
                                }
                                }else{
                                    echo'<option value="">--pas des comptes disponible--</option>';
                                }
                                ?>
                            </select>
                            <!--End select account option-->
                        </div>
                        <!--End form group-->
                       
                        <!--form group-->
                        <div class="form-group mb-2">
                            <label for="">Saisir Le Montant Du Transfert</label>
                            <input type="text" name="montant" class="form-control" id="" placeholder="Saisir Le Montant Du Transfert">
                        </div>
                        <!--End form group-->
                        <!--form group-->
                        <div class="form-group mb-2">
                            <button  id="transact-btn" name="Transfert" class="btn btn-md">Transfert</button>
                        </div>
                        <!--End form group-->

                    </div>
                    <!--End card body-->
                </div>
            </form>
            <!--End Card: transfer card-->
            <!--payer par cheack-->
            <form id="chak" action="https://example.com/payment" method="post">
                
                <label class="lab" for="amount">Montant du paiement :</label>
                <input class="inpu6" type="text" id="amount" name="amount">

                <label class="lab" for="recipient-name">Nom du destinataire :</label>
                <input class="inpu6" type="text" id="recipient-name" name="recipient-name">

                <label class="lab"  for="recipient-address">N° du destinataire :</label>
                <input class="inpu6" type="text" id="recipient-address" name="recipient-address">

                <label class="lab" for="check-number">Numéro de chèque :</label>
                <input class="inpu6" type="text" id="check-number" name="check-number">

                <label class="lab" for="payment-date">Date de paiement :</label>
                <input class="inpu6" type="date" id="payment-date" name="payment-date">

                <button id="butt5" type="submit">Soumet</button>

            </form>
            <!--end form chack-->




        </div>
        <!--End Offcanvas transct-->
    </div>
    <!--End Start transact-->
    <!--Right side offcanvas: servise -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel" class="text-white">Nous sommes à votre service</h5>
            <button style="background-color:white;" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!--offcanvas-body-->
        <div class="offcanvas-body">
            <!-- card :servise Form container-->
            <div class="card" id="servise1">
                <!--card body-->
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" id="Contactez"><img src="th (35).jpg" alt="" style="height: 40px; border-radius: 50px;"> Contactez-nous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Map.php"><img src="th (36).jpg" alt="" style="height: 35px; border-radius: 50px;" id="Agences"> Agences & guichets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="Immobilier" style="font-size: 15px;"><img src="th (1).jpg" alt="" style="height: 30px; border-radius: 60px;">Crédit Immobilier en ligne</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#" id="propos"><img src="th (2).jpg" alt="" style="height: 35px; border-radius: 60px;"> A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="login.php"><img src="th (3).jpg" alt="" style="height: 45px; border-radius: 60px;"> Quitter </a>
                        </li>
                    </ul>
                </div>
                <!--End card body-->


            </div>
            <!--End card :accounts Form container-->
            <!--Contactez nous-->
            <div class="Contactez" id="cont1">
                <a href="#" id="return"><i class="fa-solid fa-right-from-bracket"></i></a>
                <h4 class="cco1">Contactez nous</h4>
                <div class="Contactez-content">
                    <span><img src="images.png" alt="" style="height: 30px;"><a id="phon1" class="phon" href="tel:2121"><i class="fa-solid fa-phone"></i>2121</a></span>
                    <span><img src="download.png" alt="" style="height: 30px;"><a id="phon1" class="phon" href="tel:02 880 44 71"><i class="fa-solid fa-phone"></i>02 880 44 71</a></span>
                    <span><img src="download (1).png" alt="" style="height: 30px;"><a id="phon1" class="phon" href="tel:438 800 27 26"><i class="fa-solid fa-phone"></i>438 800 27 26</a></span>
                    <span><img src="download (2).png" alt="" style="height: 30px;"><a id="phon1" class="phon" href="tel:78 15 07 71"><i class="fa-solid fa-phone"></i>78 15 07 71</a></span>
                    <span><img src="download (3).png" alt="" style="height: 30px;"><a id="phon1" class="phon" href="tel:911231540"><i class="fa-solid fa-phone"></i>911231540</a></span>
                </div>
            </div>
            <!--End contactez-->
            <!-- form a prorps-->
            <div id="app">
                <a href="#" id="return9"><i class="fa-solid fa-right-from-bracket"></i></a>
                <br>
                <br>
                <h5 style="color:blue;">Information sur l'application:</h5>
                <ul>
                    <li>Version 3.8.5</li>
                    <li>Build 54</li>
                </ul>
                <br>
                <h5 style="color:blue;">Information sur votre appareil:</h5>
                <u>
                    <li>Modele de l'appareil: SM-A207F</li>
                    <li>-OS: android & web</li>
                </u>
                <br>
                <h5 style="color:blue;"> Vous pouvez utiliser cette application pour:</h5>
                <p>Vérifier votre solde de compte en temps réel et consulter l'historique des transactions.

                    Effectuer des transferts d'argent en temps réel entre vos comptes bancaires ou vers d'autres comptes bancaires.

                    Payez vos factures en utilisant l'application, sans avoir à vous rendre physiquement à la banque.

                    Localiser les distributeurs automatiques de billets (DAB) les plus proches pour retirer de l'argent en espèces.

                    Prendre rendez-vous avec un conseiller bancaire pour discuter de vos besoins financiers ou poser des questions.

                    Accéder à des services de paiement en ligne pour effectuer des achats en ligne en toute sécurité.

                    Configurer des alertes pour être informé de l'état de votre compte, des dépenses importantes ou des dates de paiement de factures.</p>

            </div>
            <!-- End form a prorps-->
            <!-- Range -->
            <div style="padding: 10px; border-radius: 12px;" id="immo">
                <a href="#" id="return10"><i class="fa-solid fa-right-from-bracket" style="color: white;"></i></a>
                <br>
                <br>
                <img src="1jpg_61d6bf83ca5a9.jpg" alt="" style="height: 200px;">
                <br>
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="customRange1" class="form-label" style="display: inline;">Durée</label>
                        <input style="width: 200px;" type="range" class="form-range" id="customRange2" max="25">
                    </div>
                    <div class="col">
                        <input style="display: inline;" id="ans" type="text" class="form-control" placeholder="" name="ans">
                        <label style="float: right;" for="inputName4">Ans</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="customRange1" class="form-label" style="display: inline;">Différé</label>
                        <input style="width: 200px;" type="range" class="form-range" id="customRange3" max="24">
                    </div>
                    <div class="col">
                        <input id="mois" style="display: inline;" type="text" class="form-control" placeholder="" name="mois">
                        <label style="float: right;" for="inputName4">Mois</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="customRange1" class="form-label" style="display: inline;">Taux</label>
                        <input style="width: 200px;" type="range" class="form-range" id="customRange4" max="10">
                    </div>
                    <div class="col">
                        <input id="taux" style="display: inline;" type="text" class="form-control" placeholder="" name="bonst">
                        <label style="float: right;" for="inputName4">%</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="customRange1" class="form-label" style="display: inline;">Montant</label>
                        <input style="width: 200px;" type="range" step="10000" class="form-range" id="customRange1" max="20000000">
                    </div>
                    <div class="col">
                        <input id="Man" style="display: inline;" type="text" class="form-control" placeholder="" name="montant">
                        <label style="float: right;" for="inputName4">Dhs</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="customRange1" class="form-label" style="display: inline;">Echéance</label>
                        <input disabled style="width: 200px;" type="range" class="form-range" max="500000049" id="customRange5">
                    </div>
                    <div class="col">
                        <input id="echan" style="display: inline;" type="text" class="form-control" placeholder="" name="echeance">
                        <label style="float: right;" for="inputName4">Dhs</label>
                    </div>
                </div>
                <button id="DETAIL" type="submit" class="btn btn-primary" name="login">DETAIL</button>
            </div>
            <!--End range-->
        </div>
        <!--End offcanvas-body-->
    </div>
    <!--End Right side offcanvas service-->

    <!-- container-->
    <div id="form_client">
        <div class="container d-flex">
            <br>
            <button id="serv" class="btn btn-primary shadow" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="fa-solid fa-file-invoice-dollar"></i> Services
            </button>

            <button id="transact-btn" class="btn ms-auto shadow" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fa-solid fa-money-bill-transfer"></i>
                Transaction
            </button>
        </div>
        <!--end container-->
        <!--container: total accounts balance-->
        <?php
        //include la page de connexion
        include_once "connect.php";
        //include la page session pour id_users
        include("session.php");
        //requête pour afficher la liste des comptes
        $solde = null;
        $req = mysqli_query($con, "SELECT * FROM accounts where user_id='$id'");
        if (mysqli_num_rows($req) == 0) {
            
            //s'il n'existe pas
            $solde = 0;
        ?>

            <div class="container d-flex py-3">
            <h4 style="font-weight: bold;" class="ma-auto">Solde Total :</h4>
            <h4 style="font-weight: bold;" class="ms-auto"><?= $solde ?>.00 Dh</h4>
        </div>
        <?php
            
        } else {
            
            // affichons la liste
            while ($row = mysqli_fetch_assoc($req)) {
                $solde += $row['balance'];
            }
            
        ?>
            <div class="container d-flex py-3">
                <h4 style="font-weight: bold;" class="ma-auto">Solde Total :</h4>
                <h4 style="font-weight: bold;" class="ms-auto"><?= $solde ?>.00 Dh</h4>
            </div>
    </div>
<?php

        }
?>
<!--End container: total accounts balance-->

<!--container : Accordion-->

<div class="container">
    <!--Accordion-->
    <div class="accordion accordion-flush " id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button style="height: 65px;" name="client" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <img style="height: 70px; border-radius: 50px;padding: 10px;" src="OIP.jpg" alt=""> Informations sur le compte
                </button>
            </h2>
            <div id="flush-collapseOne" style="overflow: scroll;" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <table>
                    <tr id="items">
                        <th>Id_Client</th>
                        <th>Numéro de compte </th>
                        <th>Code secret</th>
                        <th>Ville</th>
                        <th>Type De Compte</th>
                        <th>Solde</th>
                        <th>Date</th>


                    </tr>
                    <?php

                    //include la page de connexion
                    include_once "connect.php";
                    //requête pour afficher la liste des comptes
                    //include la page session pour id_users
                    include("session.php");

                    $req = mysqli_query($con, "SELECT * FROM accounts where user_id='$id'");
                    if (mysqli_num_rows($req) == 0) {
                        //s'il n'existe pas
                        echo   '<script> alert("Il n y a pas encore compte ajouter !")</script>';
                    } else {
                        //si non , affichons la liste 
                        while ($row = mysqli_fetch_assoc($req)) {
                    ?>
                            <tr class="cc">
                                <td><?= $row['user_id'] ?></td>
                                <td id="client_id"><?= $row['account_number'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><?= $row['ville'] ?></td>
                                <td><?= $row['account_type'] ?></td>
                                <td><?= $row['balance'] ?></td>
                                <td><?= $row['create_at'] ?></td>
                                <!--Nous alons mettre l'id de chaque operation dans ce lien -->

                            </tr>

                    <?php
                        }
                    }
                    ?>


                </table>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!--Accordion-->
    <div class="accordion accordion-flush " id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button style="height: 65px;" name="users19" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <img style="height: 70px; border-radius: 60px;padding: 10px;" src="th (11).jpg" alt=""> Informations sur le client
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body" style="overflow: scroll;">

                    <?php
                    include_once "connect.php";
                    //$email3=$_SESSION['emailg'];
                    //$password3=$_SESSION['passworg'];
                    //requête pour afficher la liste des comptes
                    //if (isset($_POST['users19'])) {
                    //$email = mysqli_real_escape_string($con,  $_POST['emailg']);
                    //$password = mysqli_real_escape_string($con, $_POST['passworg']);

                    include("session.php");

                    $req = mysqli_query($con, "SELECT * FROM users where email='$email' AND password1='$password'");
                    if (mysqli_num_rows($req) == 0) {
                        //s'il n'existe pas
                        echo   '.<li id="client_id">Il n y a pas encore Client ajouter !</li>.';
                    } else {
                        //si non , affichons la liste 
                        while ($row = mysqli_fetch_assoc($req)) {
                    ?>


                            <ul class="cc">
                                <div class="wrapp">
                                    <div class="content">
                                        <div id="nia" class="data">
                                            <h4 style="text-align: center; color: red;">Bonjour M.<span><?= $row['last_name'] ?> <?= $row['first_name'] ?></span> </h4>
                                            <span style="text-align: center; display: flex; justify-content: center;"><i class="fa-solid fa-user" style="font-size: 50px;"></i></span>
                                            <p><b><i class="fa-solid fa-key" style="font-size: 20px;"></i> Id: </b><span><?= $row['user_id'] ?></span></p>
                                            <p><b><i class="fa-solid fa-user" style="font-size: 20px;"></i></i> Nom complet: </b><span><?= $row['last_name'] ?> <?= $row['first_name'] ?></span></p>
                                            <p><b><i class="fa-solid fa-envelope" style="font-size: 20px;"></i> Email: </b><span><?= $row['email'] ?></span></p>
                                            <p><b><i class="fa-solid fa-phone" style="font-size: 20px;"></i></i> Téléphone: </b><span>........</span></p>
                                            <p><b><i class="fa-solid fa-lock" style="font-size: 20px;"></i> Password: </b><span><?= $row['password1'] ?></span></p>
                                        </div>
                                    </div>
                                </div>
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
<div class="container">
    <!--Accordion-->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button style="height: 65px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <img style="height: 65px; border-radius: 80px;padding: 10px;" src="th (5).jpg" alt=""> Notification
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body" style="overflow: scroll;">
                    <!--php notification-->
                    <h3 style="text-align: center; color: red;">Mes Notification</h3>

                    <?php

                    //include la page de connexion
                    include_once "connect.php";
                    //requête pour afficher la liste des comptes
                    include("session.php");
                    $req2 = mysqli_query($con, "SELECT * FROM notification where email='$email'");
                    if ( mysqli_num_rows($req2) == 0) {
                        //s'il n'existe pas
                        $_SESSION['message'] = "";
                        
                        //notif
                        echo'
                        
                            <!--title-->
                            <h3 class="alert alert-success" role="alert">
                                <i class="alert-heading"><img src="th (22).jpg" alt="" style="height: 30px; margin-bottom: 10px; border-radius: 20px;"></i>Attention:
                                <hr>
                                <!--body-->
                                <div>
                                    <!--Text-->
                                    <p class="mb-0" style="font-size: 15px;">
                                            pas d annonce maintenant !
                                    </p>
                                    <!--End Text-->
                                    <hr>
                                    
                                
                                </div>
                                <!--End body-->

                            </h3>
                            <!--End title-->
                            ';
                        //end notif
                    } else {
                        $req = mysqli_query($con, "SELECT * FROM notification where email='$email'");
                        if (mysqli_num_rows($req) == 0) {
                            //s'il n'existe pas
                            echo   '<li id="client_id">Il n y a pas encore Message Envoyer !</li>';
                        } else {
                            //si non , affichons la liste 
                            while ($row = mysqli_fetch_assoc($req)) {
                    ?>


                                <ul class="cc">
                                    <div class="wrapp">
                                        <div class="content">
                                            <div id="nia" class="data">
                                                <?php include("message.php");?>
                                                <p style="color: red;"><span><img style="height: 30px;margin: 1px;" src="th (9).jpg">Email :</span><?= $row['email'] ?></p>
                                                <p style="color: green;"><span><img style="height: 30px;margin: 1px;" src="th (14).jpg">Sujet :</span><span style="overflow: scroll;width: 50%;"><?= $row['sujet'] ?></span></p>
                                                <p style="color: blue;"><span><img style="height: 30px;margin: 1px;" src="th (13).jpg">Message :</span><span style="overflow: scroll;width: 50%;"><?= $row['message'] ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </ul>

                    <?php
                            }
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
<!--card client-->

<div class="container">
    <!--card client-->

    <div id="card" class="container1">

        <div class="card-container1">
            <?php

            //include la page de connexion
            include_once "connect.php";
            //requête pour afficher la liste des Paiments
            include("session.php");
            
            $req1 ="SELECT * FROM accounts where user_id = '$id'";
            $query_run = mysqli_query($con, $req1);
            $num_ligne=mysqli_num_rows($query_run);
            if($num_ligne == 0){
                echo "";
            }else{
            $row2 = mysqli_fetch_assoc($query_run);
            $test = $row2['account_number'];
           
            $req = mysqli_query($con, "SELECT * FROM carte where num_compte='$test'");
            //si non , affichons la liste 
            while ($row = mysqli_fetch_assoc($req)) {
            ?>
                <div class="front">
                    <div class="image">
                        <img src="chip.png" alt="">
                        <img src="visa.png" alt="">
                    </div>
                    <div class="card-number-box"><?= $row['num_carte'] ?></div>
                    <div class="flexbox">
                        <div class="box">

                            <div class="card-holder-name"><?= $row['nom_c'] ?></div>
                        </div>
                        <div class="box">
                            <span>expires end</span>
                            <div class="expiration">
                                <span class="exp-month"><?= $row['mois'] ?></span>
                                <span class="exp-year"><?= $row['annee'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvv-box"><?= $row['cvv'] ?></div>
                        <img src="image/visa.png" alt="">
                    </div>
                <?php
            }
        }
                ?>

                <!--carte scripte-->
                <script>
                    document.querySelector('#card').onmouseenter = () => {
                        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
                        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
                    }

                    document.querySelector('#card').onmouseleave = () => {
                        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
                        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
                    }
                </script>
                <!--End card sceripte-->

                </div>

                <!--End card client-->
        </div>




        <script src="main.js"></script>
</body>

</html>