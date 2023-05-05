<?php
require 'connect.php';
session_start();
//form paiement
if (isset($_POST['payer'])) {
    $Beneficiaire = mysqli_real_escape_string($con, $_POST['Beneficiaire']);
    $account_number = mysqli_real_escape_string($con, $_POST['account_number']);
    $account = mysqli_real_escape_string($con, $_POST['account']);
    $reference = mysqli_real_escape_string($con, $_POST['reference']);
    $montant = mysqli_real_escape_string($con, $_POST['montant']);
    $query1="SELECT * FROM accounts where account_type ='$account'";
    $query_run1 = mysqli_query($con, $query1);
    $num_ligne=mysqli_num_rows($query_run1);
    $statut = "échoué";
    if($num_ligne > 0){
        $ligne=mysqli_fetch_assoc($query_run1);
    }else{
      $_SESSION['message'] = "Se il vous plait Vérifier le type du compte";
      header("Location: header.php");
      exit(0);
    }
    if($ligne['balance']>=$montant){
         
    $statut = "succés";
    $sql1= "UPDATE accounts SET balance=balance - '$montant' where account_type ='$account'";
    $query_run3 = mysqli_query($con, $sql1);
    $query = "INSERT INTO paymnets(payment_id, account_id, beneficiaire,beneficiaire_acc_num,montant,referance_no,statut,create_at) 
    VALUES (null,null,'$Beneficiaire','$account_number','$montant','$reference','$statut',now())";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
      $_SESSION['message'] = "Processus de paiement terminé avec succès";
          header("Location: header.php");
          exit(0); 
    }
    }else{
      $query = "INSERT INTO paymnets(payment_id, account_id, beneficiaire,beneficiaire_acc_num,montant,referance_no,statut,create_at) 
        VALUES (null,null,'$Beneficiaire','$account_number','$montant','$reference','$statut',now())";
        $query_run = mysqli_query($con,$query);
      $_SESSION['message'] = "Se il vous plait Vérifier le solde du compte";
      header("Location: header.php");
      exit(0);
    }
    
}
// end form paiement

// form transaction
if (isset($_POST['Transfert'])) {
  $account_type1 = mysqli_real_escape_string($con, $_POST['account_type1']);
  $account_type2 = mysqli_real_escape_string($con, $_POST['account_type2']);
  $montant = mysqli_real_escape_string($con, $_POST['montant']);
  $statut = "succes";
  
  
  $query1="SELECT * FROM accounts where account_type ='$account_type1'";
  $query_run1 = mysqli_query($con, $query1);
  $query2="SELECT * FROM accounts where account_type ='$account_type2'";
  $query_run2 = mysqli_query($con, $query2);
  $num_ligne1=mysqli_num_rows($query_run1);
  $num_ligne2=mysqli_num_rows($query_run2);
 
  if($num_ligne1 > 0  && $num_ligne2 > 0 && $account_type1!=$account_type2){
  $ligne1=mysqli_fetch_assoc($query_run1);
  $ligne2=mysqli_fetch_assoc($query_run2);
  }else{
    $statut = "échoué";
    $query = "INSERT INTO trensaction (trensaction_id	,account_id	,trensaction_type,	montant	,source	,statut,	code_raison	,create_at)
     VALUES (null,null, '','$montant','','$statut','',now())";
     $query_run = mysqli_query($con, $query);
    $_SESSION['message'] = "Vérifier le type des comptes";
          header("Location: header.php");
      exit(0);
  }
  if($ligne1['balance']>=$montant){
  $sql1= "UPDATE accounts SET balance=balance - '$montant' where account_type ='$account_type1'";
  $query_run3 = mysqli_query($con, $sql1);
  $sql2="UPDATE accounts SET balance=balance + '$montant'  where account_type ='$account_type2'";
  $query_run4 = mysqli_query($con, $sql2);
  $query = "INSERT INTO trensaction (trensaction_id	,account_id	,trensaction_type,	montant	,source	,statut,	code_raison	,create_at	
  ) VALUES (null,null, '','$montant','','$statut','',now())";
   $query_run = mysqli_query($con, $query);
  }else{
    $statut = "échoué";
    $query = "INSERT INTO trensaction (trensaction_id	,account_id	,trensaction_type,	montant	,source	,statut,	code_raison	,create_at)
     VALUES (null,null, '','$montant','','$statut','',now())";
     $query_run = mysqli_query($con, $query);
    $_SESSION['message'] = "Vérifier le montant";
          header("Location: header.php");
      exit(0);
  }
  if ($query_run) {
      $_SESSION['message'] = "Ajouté avec succès";
          header("Location: header.php");
      exit(0);
  
  }else{
    
     $_SESSION['message'] = "L'opération est un échec";
          header("Location: header.php");
     exit(0);
  }

}



//form geachie
if (isset($_POST['Guichet'])) {
  $latitude = mysqli_real_escape_string($con, $_POST['latitude']);
  $longitude = mysqli_real_escape_string($con, $_POST['longitude']);
  $ville = mysqli_real_escape_string($con, $_POST['ville']);
  $localisation = mysqli_real_escape_string($con, $_POST['localisation']);
  $guichet = mysqli_real_escape_string($con, $_POST['guichet']);
  $solde = mysqli_real_escape_string($con, $_POST['Montant']);
  
  $query = "INSERT INTO map (lat, lon, ville, localisation, guichet, Montant) VALUES 
          ('$latitude','$longitude','$ville', '$localisation','$guichet', '$solde')";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['message'] = "L'operation a réussi";
      header("Location: Admin.php");
      exit(0);
  
  }else {
    $_SESSION['message'] = "Vérifiez les données";
          header("Location: Admin.php");
          exit(0);
  }
  }



  //client  supprimer une trensaction

        //include la page de connexion
        //connexion a la base de données
        include_once "connect.php";
        //récupération de l'id dans le lien
        $id= $_GET['payment_id'];
        //requête de suppression
        $req = mysqli_query($con , "DELETE FROM paymnets WHERE payment_id= $id");
        //redirection vers la page HistoriqueP.php
        header("Location:HistoriqueP.php");
        // client  supprimer une trensaction

       
        
?>