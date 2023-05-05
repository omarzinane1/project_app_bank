<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="notification.css">
    <title>Document</title>
</head>
<body >
    <br /><br />
    <div id="form_message" class="container">
      <nav class="navbar navbar-inverse ">
      <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#"> Notification</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" style="color:white;"class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Admin.php">notification</a></li>
          </ul>
        </li>
        </ul>
      </div>
      </nav>
      <br />
      <form method="post" action="controle.php" id="comment_form">
        <div class="form-group">
          <label>Enter Email</label>
          <input type="email" name="email" id="subject" class="form-control">
        </div>

      <div class="form-group">
        <label>Enter Subject</label>
        <input type="text" name="sujet" id="subject" class="form-control">
      </div>
      
      <div class="form-group">
        <label>Enter Message</label>
        <textarea name="message" id="comment" class="form-control" rows="5"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" name="Envoyer" id="post" class="btn btn-info" value="Envoyer" />
      </div>
      </form>
    </div>
  <!--End Form message -->
</body>
</html>