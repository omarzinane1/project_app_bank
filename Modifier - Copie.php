<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin.css">
    <title>Document</title>
</head>
<body>
<?php

//connexion à la base de donnée
 include_once "connect.php";
//on récupère le id dans le lien
 $id= $_GET['account_id'];
 //requête pour afficher les infos d'un trensaction
 $req = mysqli_query($con , "SELECT * FROM accounts WHERE account_id= $id");
 $row = mysqli_fetch_assoc($req);


//vérifier que le bouton ajouter a bien été cliqué
if(isset($_POST['Modifier'])){
    $id= $_GET['account_id'];
    $account_number=$_POST['account_number'];
    $password=$_POST['password'];
    $ville=$_POST['ville'];
    $account_type=$_POST['account_type'];
    $balance=$_POST['balance'];
  //extraction des informations envoyé dans des variables par la methode POST
  extract($_POST);
  //verifier que tous les champs ont été remplis
  if(isset($balance) && isset($account_type)){
      //requête de modification
      //$req = mysqli_query($con, "UPDATE list_temps SET cne='$cne', nom = '$nom' , prenom = '$prenom' , presente = '$presente',professeur = '$professeur',matire='$matire',date='$date', heure='$heure' WHERE id = $id");
      $req = mysqli_query($con,"UPDATE accounts SET account_number ='$account_number',password='$password',ville='$ville',account_type='$account_type',balance='$balance' WHERE account_id= $id");
       if($req){//si la requête a été effectuée avec succès , on fait une redirection
           header("location: Admin.php");
       }else {//si non
           $message = "Trensaction non modifié";
       }

  }else {
      //si non
      $message = "Veuillez remplir tous les champs !";
  }
}

?>

<div class="form" id="form1">
<a href="Admin.php" class="back_btn"><img src="back.png">Retour</a>
<h2>Modifier la liste : </h2>
<p class="erreur_message">
  <?php 
     if(isset($message)){
         echo $message ;
     }
  ?>
</p>
<form action="" method="POST">
   <label>Numéro Compte</label>
   <input style="height: 30px; border-radius: 10px;"  type="text" name="account_number" value="<?=$row['account_number']?>">
   <label>Password</label>
   <input style="height: 30px; border-radius: 10px;"  type="text" name="password" value="<?=$row['password']?>">
   <label>Ville</label>
   <input style="height: 30px; border-radius: 10px;"  type="text" name="ville" value="<?=$row['ville']?>">
   <label>Montant</label>
   <input style="height: 30px; border-radius: 10px;"  type="text" name="balance" value="<?=$row['balance']?>">
   <label>Type compte</label>
   <select style="height: 30px; border-radius: 10px;" name="account_type" id="">
       <option value="cheque" >chéque</option>
       <option value="Economies" >des Economies</option>
       <option value="Entreprise" >Entreprise</option>
   </select>
   <input type="submit" value="Modifier" name="Modifier">
</form>
</div>
</body>
</html>
    
