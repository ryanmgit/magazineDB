<?php
require_once "dbconnection.php";
$query="SELECT * FROM subscription where subscriptionid = :subscriptionid";
$sql = $pdo->prepare($query);
$sql->execute(array(":subscriptionid" => $_GET['subscriptionid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$fn = $row['Subscriptionid'];
$j = $row['Magazineid'];
$k = $row['Subscriberid'];
$kid = $row['Subscriptiondate'];
$lid = $row['Subscriptionperiod'];

if(isset($_POST['yesbutton'])){
  $query="delete from subscription where Subscriptionid=:Subscriptionid";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(
        ":subscriptionid" => $_GET['subscriptionid'])
                );
  header('Location: displaysubscription.php');
};
?>

<!DOCTYPE html>
<html>
<head>
<title>Subscriptions</title>
<link rel="stylesheet" type="text/css" href="magazinestyle.css">
</head>
<body>
<div class="background">
<div class="fullform">
	<div class="welcometext">
		Delete a Subscription

	
  <div class="php">
<p>Are you sure you want to delete the following subscription?</p>
<p>
  <form method="post">
<p>Subscriptionid:
  <input type="text" name="Subscriptionid" value="<?= $fn ?>">
</p>
<p>Magazineid:
  <input type="text" name="Magazineid" value="<?= $j ?>">
</p>
<p>Subscriberid:
  <input type="text" name="Subscriberid" value="<?= $k ?>">
</p>
<p>Subscriptiondate:
  <input type="text" name="Subscriptiondate" value="<?= $kid ?>">
</p>
<p>Subscriptionperiod:
  <input type="text" name="Subscriptionperiod" value="<?= $lid ?>">
</p>
<p>
  <input type="submit" name="yesbutton" value="YES">
</p>
  </form>

</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displaysubscription.php';">
</div>

</div>
</div>
</body>
</html>
