<?php

 //include la page de connexion
        //connexion a la base de données
        include_once "connect.php";
        //récupération de l'id dans le lien
        $id= $_GET['trensaction_id'];
        //requête de suppression
        $req = mysqli_query($con , "DELETE FROM trensaction WHERE trensaction_id= $id");
        //redirection vers la page HistoriqueP.php
        header("Location:HistoriqueP.php");?>