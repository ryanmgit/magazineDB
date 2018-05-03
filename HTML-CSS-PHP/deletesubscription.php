<?php
require_once "dbconnection.php";
$query="select subscriptionid, magazinename, subscribersfname, subscriberslname, subscriptiondate, subscriptionperiod from subscription left join magazine on subscription.magazineid=magazine.magazineid left join subscriber on subscription.subscriberid=subscriber.subscriberid where subscriptionid=:subscriptionid";
$sql = $pdo->prepare($query);
$sql->execute(array(":subscriptionid" => $_GET['subscriptionid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$subscriptionid = $row['subscriptionid'];
$magazinename = $row['magazinename'];
$subscribersfname = $row['subscribersfname'];
$subscriberslname = $row['subscriberslname'];
$subscriptiondate = $row['subscriptiondate'];
$subscriptionperiod = $row['subscriptionperiod'];

if(isset($_POST['yesbutton'])){
  $query="DELETE FROM review WHERE subscriptionid=:subscriptionid";
  $sql=$pdo->prepare($query);
  $sql->execute(array(":subscriptionid" => $_GET['subscriptionid']));
  $query="DELETE FROM subscription WHERE subscriptionid=:subscriptionid";
  $sql=$pdo->prepare($query);
  $sql->execute(array(":subscriptionid" => $_GET['subscriptionid']));
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
  <input type="text" name="subscriptionid" value="<?= $subscriptionid ?>">
</p>
<p>Magazine Name:
  <input type="text" name="magazinename" value="<?= $magazinename ?>">
</p>
<p>Subscriber fname:
  <input type="text" name="subscribersfname" value="<?= $subscribersfname ?>">
</p>
<p>Subscription lname:
  <input type="text" name="subscriberslname" value="<?= $subscriberslname ?>">
</p>
<p>Subscription Date:
  <input type="text" name="subscriptiondate" value="<?= $subscriptiondate ?>">
</p>
<p>Subscription Period:
  <input type="text" name="subscriptionperiod" value="<?= $subscriptionperiod ?>">
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
