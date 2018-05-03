<?php
require_once "dbconnection.php";
$query="SELECT * FROM subscriber where subscriberid = :subscriberid";
$sql = $pdo->prepare($query);
$sql->execute(array(":subscriberid" => $_GET['subscriberid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$subsctiberid = $row['Subscriberid'];
$subscribersfname = $row['Subscribersfname'];
$subscriberslname = $row['Subscriberslname'];
$email = $row['Email'];
$city = $row['City'];
$state = $row['State'];
if(isset($_POST['yesbutton'])){
	$query="DELETE FROM subscription WHERE subscriberid=:subscriberid";
	$sql=$pdo->prepare($query);
	$sql->execute(array(":subscriberid" => $_GET['subscriberid']));
	$query="DELETE FROM subscriber WHERE subscriberid=:subscriberid";
	$sql=$pdo->prepare($query);
	$sql->execute(array(":subscriberid" => $_GET['subscriberid']));
	header('Location: displaysubscriber.php');//go back to page displaybusiness
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
		Delete a Subscriber

	
  <div class="php">
<p>Are you sure you want to delete the following subscriber?</p>
<p>
  <form method="post">
<p>Subscriberid:
  <input type="text" name="subscriberid" value="<?= $subscriberid ?>" >
</p>
<p>Subscribersfname:
  <input type="text" name="Subscribersfname" value="<?= $subscribersfname ?>">
</p>
<p>Subscriberslname:
  <input type="text" name="Subscriberslname" value="<?= $subscriberslname ?>">
</p>
<p>Email:
  <input type="text" name="Email" value="<?= $email ?>">
</p>
<p>City:
  <input type="text" name="City" value="<?= $city ?>">
</p>
<p>State:
  <input type="text" name="State" value="<?= $state ?>">
</p>
<p>
  <input type="submit" name="yesbutton" value="YES">
</p>
  </form>

</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displaysubscriber.php';">
</div>

</div>
</div>
</body>
</html>
