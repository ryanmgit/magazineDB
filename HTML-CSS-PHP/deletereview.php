<?php
require_once "dbconnection.php";
$query="SELECT reviewid, subscribersfname, subscribersfname, magazinename, stars, reviewdate FROM review where reviewid = :reviewid";
$sql = $pdo->prepare($query);
$sql->execute(array(":reviewid" => $_GET['reviewid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$reviewid = $row['reviewid'];
$subscribersfname = $row['subscribersfname'];
$subscriberslname = $row['subscriberslname'];
$magazinename = $row['magazinename'];
$stars = $row['stars'];
$reviewdate = $row['reviewdate'];

if(isset($_POST['yesbutton'])){
  $query="DELETE FROM review WHERE reviewid=:reviewid";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(
        ":reviewid" => $_GET['reviewid'])
                );
  header('Location: displayreview.php');
};
?>

<!DOCTYPE html>
<html>
<head>
<title>Delete Review</title>
<link rel="stylesheet" type="text/css" href="magazinestyle.css">
</head>
<body>
<div class="background">
<div class="fullform">
	<div class="welcometext">
		Delete a Review

	
  <div class="php">
<p>Are you sure you want to delete the following review?</p>
<p>
  <form method="post">
<p>Review id:
  <input type="text" name="Reviewid" value="<?= $reviewid ?>" readonly="readonly">
</p>
<p>Magazine Name:
  <input type="text" name="Magazinename" value="<?= $j ?>" readonly="readonly">
</p>
<p>Subscriber fname:
  <input type="text" name="Subscribersfname" value="<?= $subscribersfname ?>" readonly="readonly">
</p>
<p>Subscriber lname:
  <input type="text" name="Subscriberslname" value="<?= $subscriberslname ?>" readonly="readonly">
</p>
<p>Stars:
  <input type="text" name="Stars" value="<?= $stars ?>" readonly="readonly">
</p>
<p>Stars:
  <input type="text" name="Reviewdate" value="<?= $reviewdate ?>" readonly="readonly">
</p>
<p>
  <input type="submit" name="yesbutton" value="YES">
</p>
  </form>

</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displayreview.php';">
</div>

</div>
</div>
</body>
</html>
