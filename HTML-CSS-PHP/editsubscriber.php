<?php
require_once "dbconnection.php";
//loading corresponding business data
//the following three lines define and execute the sql statement
$query="SELECT * FROM subscriber where subscriberid = :subscriberid";
$sql = $pdo->prepare($query);
$sql->execute(array(":subscriberid" => $_GET['subscriberid']));

$row = $sql->fetch(PDO::FETCH_ASSOC); //read the next row od the query result into $row
$subscribersfname = $row['Subscribersfname'];
$subscriberslname = $row['Subscriberslname'];
$email = $row['Email'];
$city = $row['City'];
$state = $row['State'];

if(isset($_POST['updatebutton'])){
	//execute the following sql statement
	$query="UPDATE subscriber SET subscribersfname=:subscribersfname, subscriberslname=:subscriberslname, email=:email, city=:city, state=:state WHERE subscriberid=:subscriberid";
	$sql=$pdo->prepare($query);
	$sql->execute(
  	array(":subscribersfname" => $_POST['subscribersfname'],
        	":subscriberslname" => $_POST['subscriberslname'],
        	":email" => $_POST['email'],
        	":city" => $_POST['city'],
        	":state" => $_POST['state'],
        	":subscriberid" => $_GET['subscriberid'])
	);
      // end of the execution of the above sql statement
	header('Location: displaysubscriber.php'); //go back to display business
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
		Edit a Subscriber

	</div>
  <div class="php">
<p>
  <form method="post">
<p>Subscribers fname:
  <input type="text" name="subscribersfname" value="<?= $subscribersfname ?>">
</p>
<p>Subscribers lname:
  <input type="text" name="subscriberslname" value="<?= $subscriberslname ?>">
</p>
<p>Email:
  <input type="text" name="email" value="<?= $email ?>">
</p>
<p>City:
  <input type="text" name="city" value="<?= $city ?>">
</p>
<p>State:
  <input type="text" name="state" value="<?= $state ?>">
</p>
<p>
  <input type="submit" name="updatebutton" value="update">
</p>
  </form>
</p>
</div>
<p>
</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displaysubscriber.php';">
</div>

</div>
</div>
</body>
</html>
