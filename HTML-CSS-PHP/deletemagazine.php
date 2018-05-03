<?php
error_reporting(E_ALL);
require_once "dbconnection.php";
$query="SELECT * FROM magazine where magazineid = :magazineid";
$sql = $pdo->prepare($query);
$sql->execute(array(":magazineid" => $_GET['magazineid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$magazineid = $row['Magazineid'];
$magazinename = $row['Magazinename'];
$type = $row['Type'];
$city = $row['City'];
$state = $row['State'];

if(isset($_POST['yesbutton'])){
	$query="DELETE FROM review left join subscription on review.subscriptionid=subscription.subscriptionid WHERE magazineid=:magazineid";
	$sql=$pdo->prepare($query);
	$sql->execute(array(":magazineid" => $_GET['magazineid']));
	$query="DELETE FROM subscription WHERE magazineid=:magazineid";
	$sql=$pdo->prepare($query);
	$sql->execute(array(":magazineid" => $_GET['magazineid']));
	$query="DELETE FROM magazine WHERE magazineid=:magazineid";
	$sql=$pdo->prepare($query);
	$sql->execute(array(":magazineid" => $_GET['magazineid']));
	header('Location: displaymagazine.php');
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
		Delete a Magazine


  <div class="php">
<p>Are you sure you want to delete the following magazine?</p>
<p>
  <form method="post">
<p>Magazineid:
  <input type="text" name="magazineid" value="<?=$magazineid?>">
</p>
<p>Magazinename:
  <input type="text" name="magazinename" value="<?= $magazinename ?>">
</p>
<p>Type:
  <input type="text" name="type" value="<?= $type ?>">
</p>
<p>City:
  <input type="text" name="city" value="<?= $city ?>">
</p>
<p>State:
  <input type="text" name="state" value="<?= $state ?>">
</p>
<p>
  <input type="submit" name="yesbutton" value="YES">
</p>
  </form>

</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displaymagazine.php';">
</div>

</div>
</div>
</body>
</html>
