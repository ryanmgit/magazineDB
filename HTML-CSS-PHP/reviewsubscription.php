
<?php
require_once "dbconnection.php";
//execute the follpwing quary
$query="SELECT magazineid, subscriberid FROM subscription where subscriptionid = :subscriptionid";
$sql=$pdo->prepare($query);
$sql->execute(array(":subscriptionid" => $_GET['subscriptionid']));

$row = $sql->fetch(PDO::FETCH_ASSOC);
$magazineid = $row['Magazineid'];
$subscriberid = $row['Subscriberid'];
$subscriptionid = $row['Subscriptionid'];

$query="SELECT magazinename FROM magazine where magazineid = :magazineid";
$sql = $pdo->prepare($query);
$sql->execute(array(":magazineid" => $magazineid));

$row = $sql->fetch(PDO::FETCH_ASSOC);
$magazinename = $row['Magazinename'];

$query="SELECT subscribersfname, subscriberslname FROM subscriber where subscriberid = :subscriberid";
$sql = $pdo->prepare($query);
$sql->execute(array(":subscriberid" => $subscriberid));

$row = $sql->fetch(PDO::FETCH_ASSOC);
$subscriberfname = $row['Subscribersfname'];
$subscriberlname = $row['Subscriberslname'];

if(isset($_POST['submitbutton'])){
  $query="INSERT INTO review (subscriptionid, stars, reviewdate) values (:subscriptionid, :stars, :reviewdate)";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":reviewdate" => date("y-m-d-"),// date("y-m-d") generates the date format in yyyy-mm-dd.
        ":stars" => $_POST['stars'],
        ":subscriptionid" => $_GET['subscriptionid'])
               );
//they are defenitions for :businessname,:city,:state
  header('Location: displaymagazine.php');//go back
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
		Review a Magazine
	</div>
  <div class="php">
  <p>
    <form method="post">
  <p>Magazine name:
    <input type="text" name="magazinename" value="<?= $magazinename ?>" readonly="readonly">
  </p>
  <p>Subscriber first name:
    <input type="text" name="subscriberfname" value="<?= $subscriberfname ?>" readonly="readonly">
  </p>
  <p>Subscriber last name:
    <input type="text" name="subscriberlname" value="<?= $subscriberlname ?>" readonly="readonly">
  </p>
  <p>Star Rating:
	 <input type="radio" id="1star" name="stars" value="1">
    	 <label for="1star">1</label>
	 <input type="radio" id="2star" name="stars" value="2">
    	 <label for="2star">2</label>
	 <input type="radio" id="3star" name="stars" value="3">
    	 <label for="3star">3</label>
	 <input type="radio" id="4star" name="stars" value="4">
    	 <label for="4star">4</label>
	 <input type="radio" id="5star" name="stars" value="5" checked="checked">
    	 <label for="5star">5</label>
  <p>
	  <input type="hidden" name="subscriptionid" value="<?= $subscriptionid ?></input>
    <input type="submit" name="submitbutton" value="submit"></input>
  </p>
    </form>
  </p>
</div>
<p>
</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displaymagazine.php';">
</div>

</div>
</div>
</body>
</html>
