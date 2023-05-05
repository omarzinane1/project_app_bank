<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b08b6005dd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="HistoriqueP.css">
    <title>historique paiement</title>
</head>

<body>


    <!--container : Accordion-->
    <div class="container" >
        <!--Accordion-->
        <!--historique de paiement-->

        <!--container : Accordion-->

        <!--Accordion-->
        <div class="accordion accordion-flush " id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne" style=" box-shadow: 5px 9px 22px #888888;">
                    <button name="transaction" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <img src="" alt=""> Historique de paiement
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    
                <h2 style="margin-top: 20px;" >Liste des paiements</h2>


                    <ul style="overflow: scroll; height: 400px;">
                        <?php
                        //include the connection page
                        include_once "connect.php";
                        //query to display the list of payments

                        $req = mysqli_query($con, "SELECT * FROM paymnets");

                        if (mysqli_num_rows($req) == 0) {
                            //if there are no payments yet
                            echo "There are no payments yet!";
                        } else {
                            //if there are payments, display the list
                            while ($row = mysqli_fetch_assoc($req)) {
                        ?>
                                <li>
                                    <strong>N°:</strong> <?= $row['payment_id'] ?><br>
                                    <strong>Bénéficiaire:</strong> <?= $row['beneficiaire'] ?><br>
                                    <strong>Numéro De Bénéficiaire:</strong> <?= $row['beneficiaire_acc_num'] ?><br>
                                    <strong>Montant:</strong> <?= $row['montant'] ?><br>
                                    <strong>Reference:</strong> <?= $row['referance_no'] ?><br>
                                    <strong>statut:</strong> <?= $row['statut'] ?><br>
                                    <strong>Date:</strong> <?= $row['create_at'] ?><br>
                                    <!--We will put the id of each payment operation in this link-->
                                    <a href="paiement.php?payment_id=<?= $row['payment_id'] ?>">Delete</a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!--End historique de transaction-->
                <!--Accordion-->
                <div class="accordion accordion-flush mt-3 " id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo" style=" box-shadow: 5px 9px 22px gray;">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Historique de la transaction
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample" >
                        <form class="transaction-form">
                    <h2 style="margin-top: 20px;">Liste des transactions</h2>
                    <ul style="overflow: scroll; height: 400px;">
                        <?php
                        //include the connection page
                        include_once "connect.php";
                        //query to display the list of payments

                        $req = mysqli_query($con, "SELECT * FROM trensaction");

                        if (mysqli_num_rows($req) == 0) {
                            //if there are no payments yet
                            echo "There are no payments yet!";
                        } else {
                            //if there are payments, display the list
                            while ($row = mysqli_fetch_assoc($req)) {
                        ?>
                                <li>
                                    <strong>N°:</strong> <?= $row['trensaction_id'] ?><br>
                                    <strong>Montant:</strong> <?= $row['montant'] ?><br>
                                    <strong>statut:</strong> <?= $row['statut'] ?><br>
                                    <strong>Date:</strong> <?= $row['create_at'] ?><br>
                                    <!--We will put the id of each payment operation in this link-->
                                    <a  href="deletetrensaction.php?trensaction_id=<?= $row['trensaction_id'] ?>">Delete</a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!--End historique de transaction-->
               

                        </div>
                    </div>
                </div>
            
</body>
<script src="https://kit.fontawesome.com/b08b6005dd.js" crossorigin="anonymous"></script>

</html>