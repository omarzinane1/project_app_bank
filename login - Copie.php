<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b08b6005dd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>
<body id="login" class="d-flex">
    <!--form-->
    <?php
    session_start();
    ?>
    
    <form class="login-form"  action="controle.php" method="post">
          <h3>Bienvenue</h3>
          <?php
             include("message.php");            
          ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="emailg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group ">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="passworg" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <span class="psw"><a id="oublie" href="passoublié.php" style="font-weight: bold;">Mot de passe oublié ?</a></span>
        <button id="btn" type="submit" class="btn btn-primary" name="login">SE CONNECTER</button>
        <p>ne pas avoir de  compte ?
            <span class="ms-2 text-warning"><a href="register.php">S'inscrire</a></span>
          </p>
          
      </form>
    <!--End form-->
   
    
</body>
</html>