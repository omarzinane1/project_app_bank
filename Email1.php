<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="Admin.css">
      <title>Document</title>
</head>
<style>
   ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  margin-bottom: 20px;
  padding: 20px;
  background-color: #f5f5f5;
  border: 1px solid #e0e0e0;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

li strong {
  font-weight: bold;
}

li span {
  display: block;
  font-size: 0.8rem;
  color: #999;
  margin-top: 5px;
}

li a {
  display: inline-block;
  padding: 10px 20px;
  background-color: #2badc4;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 10px;
  transition: background-color 0.3s;
}

li a:hover {
  background-color: #269ba8;
}


</style>
<body>
    
      <ul>
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
                    <strong>Payment ID:</strong> <?= $row['payment_id'] ?><br>
                    <strong>Beneficiary Name:</strong> <?= $row['beneficiaire'] ?><br>
                    <strong>Beneficiary Account Number:</strong> <?= $row['beneficiaire_acc_num'] ?><br>
                    <strong>Amount:</strong> <?= $row['montant'] ?><br>
                    <strong>Reference:</strong> <?= $row['referance_no'] ?><br>
                    <strong>Status:</strong> <?= $row['statut'] ?><br>
                    <strong>Date:</strong> <?= $row['create_at'] ?><br>
                    <!--We will put the id of each payment operation in this link-->
                    <a href="delete.php?id=<?= $row['payment_id']?>">Delete</a>
                </li>
            <?php
                }
            }
            ?>
            </ul>
            

</body>
</html>