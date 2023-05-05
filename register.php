<?php
  session_start();
?>
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
    <link rel="stylesheet" href="Style.css">
    <title>Document</title>
</head>
<body class="d-flex align-items-center justify-content-center">
  
    <!-- Registration de form-->
   
    <div class="card Registration-form-card bg-transparent border-0 mb-5">
        <div class="Form-body">
            <!--Form header-->
                 
                <form action="controle.php" action="message.php" method="post">
                
                <h1 class="form-header card-title" style="color:white">
                <i class="fa-regular fa-address-card" style="color:white"></i> Register
            </h1>
                <?php
                   include("message.php");            
                ?>
                    <div class="form-row">
                        <div class="col">
                            <label style="color:white" for="inputName4">Nom</label>
                          <input type="text" class="form-control" placeholder="Entre Nom" name="nom">
                        </div>
                        <div class="col">
                            <label style="color:white" for="inputName4">Prénom</label>
                          <input type="text" class="form-control" placeholder="Entre Prénom" name="prenom">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                      <div class="form-group col-md-6">
                        <label style="color:white" for="inputEmail4">Password</label>
                        <input type="password" name="pass" pattern=".{8,10}" class="form-control" id="inputPassword4" placeholder="Enter Password" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label style="color:white" for="inputPassword4">Confirm Password</label>
                        <input type="password" name="passc" class="form-control" id="inputPassword4" placeholder="Confirm">
                      </div>
                    </div>
                    <div class="form-group">
                      <label style="color:white" for="inputAddress">Email</label>
                      <input type="email" name="address" class="form-control" id="inputEmail4" placeholder="Enter Email" required>
                    </div>
                    <label style="color:white" class="my-1 mr-2" for="inlineFormCustomSelectPref">Sélectionner Type</label>
                        <select name="select" class="form-control" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="">--Sélectionner Type utilisateur--</option>
                            <option value="Admin">Admin</option>
                            <option value="Client">Client</option>
                        </select>
                        
                    <button type="submit" class="btn btn-primary mt-3" aria-placeholder="Connexion" name="button">Valider</button>
                    <p>Vous avez déjà un compte ?
                    <span class="ms-2 text-warning"><a href="login.php">S'identifier</a></span>
                  </p>
                  </form>
                  <!--End form-->
                  
        </div>

    </div>
    
</body>
</html>