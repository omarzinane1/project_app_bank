<!DOCTYPE html>
<html lang= 'en'>
<head>
    <meta charset= 'UTF-8'>
    <meta http-equiv= 'X-UA-Compatible' content= 'IE=edge'>
    <meta name= 'viewport' content= 'width=device-width, initial-scale=1.0'>
    <script src="https://kit.fontawesome.com/b08b6005dd.js" crossorigin="anonymous"></script>
    <!--<link rel='stylesheet' href= 'email.css'>-->
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
            font-size: confortaa;
        }
        /* Main style body */
        body{
            height: 100vh;
            background-color: rgb(216, 216, 230);
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
        /*<!--wrapper-->*/
        .wrapper{
            width: 550px;
            height: auto;
            padding: 15px;
            background-color: white;
            border-radius: 7px;
        }
        /*<!--Email MSG Header-->*/
        .email-msg-header{
            text-align: center;
        }
        /*compary-name*/
        .compary-name{
            width: 100%;
            font-size: 35px;
            color: gray;
            text-align: center;
        }
        /*<!--bienvenue-text-->*/
        .bienvenue-text{
            text-align: center;
            color: rgb(0, 255, 183);
            font-size: 19px;
        }
        /*<!--vérifier le compte-->*/
        .verifier-compte-btn{
            padding: 15px;
            background-color: rgb(0, 115, 255);
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        /*<!--copye right wrapper-->*/
        .copye-right{
            padding: 15px;
            color: grey;
            font-size: 14px;
            margin: 20px 0px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
    </style>
</head>
<body>
    <?php session_start(); ?>
    <!--wrapper-->
    <div class='wrapper'>
        <!--Email MSG Header-->
        <h2 class='email-msg-header'>
            bienvenue et merci d'avoir choisi
        </h2>
        <!--End Email MSG Header-->
        <!--compary-name-->
        <div class='compary-name'> DIGITAL/BANK </div>
        <!--End compary-name-->
        <hr>
        <!--bienvenue-text-->
        <p class='bienvenue-text'>
            votre compte a été enregistré avec succès, veuillez cliquer ci-dessous pour vérifier le compte.
        </p>
        <!--End bienvenue-text-->
        <br>
        <br>
        <!--vérifier le compte-->
        <?php
        include("session.php");
        if(isset($_POST['verf'])){
        echo'<center><a href=""  name="verf" class="verifier-compte-btn" role="button">vérifier compte</a></center>';
        
        }else{
        echo '<center><i style="font-size: 50px; color: green;" class="fa-sharp fa-solid fa-check"></i></center>';
        $message = " Votre compte est vérifié avec succès ";
        $headers = 'Content-Type: text/plain; charset="utf-8"'." ";
       
        if(mail($email1,'vérifier compte',$message,$headers)){
            echo '<center><i id="icon" style="font-size: 50px; color: green;" class="fa-sharp fa-solid fa-check"></i></center>';
        }else{
            echo '<div class="container" style="color: red;width:100%;border-radius:12px;"> Change email pour valider le compte <i class="fa-sharp fa-solid fa-octagon-exclamation"></i></div>';
        }
        }
        ?>
        <!--Fin vérifier le compte-->
        <!--copye right wrapper-->
        <div class='copye-right'>
            @ Copyright 2023 Tous Conseils Réservés
        </div>
        <!--End copye right wrapper-->
    </div>
    <!--End wrapper-->
    
</body>
</html>