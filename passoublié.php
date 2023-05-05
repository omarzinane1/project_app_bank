<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="passoublie.css">
    <script src="https://kit.fontawesome.com/b08b6005dd.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="display: flex;justify-content: center; align-items: center;">
<?php
include("./connect.php");

if(!isset($_POST['email'])){
    echo '<form method="post">
    
    <div class="container" style="border-radius:12px;">
    <h2 style="margin: 10px; justify-content: center; align-items: center; display: flex;">mot passe oublié</h2>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      <button type="submit">Envoyer-moi le mot de passe</button>
    </div>
  </form>';
}


?>
    


<?php


    if(isset($_POST['email'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $sql="SELECT * FROM users WHERE email= '$email'";
    $query_run = mysqli_query($con, $sql);
    $num_ligne=mysqli_num_rows($query_run);
    if($num_ligne > 0){
         $ligne=mysqli_fetch_assoc($query_run);
      
    $password= $ligne['password1'];

    $message = "Bonjour, voici votre nouveau mot de passe : $password";
    $headers = 'Content-Type: text/plain; charset="utf-8"'." ";

    if(mail($_POST['email'],'Mot de passe oublié',$message,$headers)){
        echo '<div class="container"style="color: green;width:100%;border-radius:12px;"> Message Envoyé A Votre Adress Mail <i class="fa-sharp fa-solid fa-check"></i></div>';
    }else{
        echo '<div class="container"style="color: red;width:100%;border-radius:12px;"> Email inconnu <i class="fa-sharp fa-solid fa-octagon-exclamation"></i></div>';
    }
    }else{
        echo '<div class="container" style="color: red;width:100%;border-radius:12px;"> Email inconnu <i class="fa-sharp fa-solid fa-octagon-exclamation"></i></div>';
    }
    
    }
    


?>

</body>
</html>