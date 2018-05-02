<?php
require_once "dbconnection.php";
//loading corresponding business data
//the following three lines define and execute the sql statement
$query="SELECT * FROM subscription where subscriptionid = :subscriptionid";
$sql = $pdo->prepare($query);
$sql->execute(array(":subscriptionid" => $_GET['subscriptionid']));

$row = $sql->fetch(PDO::FETCH_ASSOC); //read the next row od the query result into $row
$subscriptiondate = $row['Subscriptiondate'];
$subscriptionperiod = $row['Subscriptionperiod'];
$subscriberid = $row['Subscriberid'];
$magazineid = $row['Magazineid'];

if(isset($_POST['updatebutton'])){
  //execute the following sql statement
  $query="UPDATE subscription SET subscriptiondate=:subscriptiondate, subscriptionperiod=:subscriptionperiod, magazineid=:magazineid WHERE subscriptionid=:subscriptionid";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":subscriptiondate" => $_POST['subscriptiondate'],
        ":subscriptionperiod" => $_POST['subscriptionperiod'],
        ":magazineid" => $_POST['magazineid'],
        ":subscriptionid" => $_GET['subscriptionid'])
                );
      // end of the execution of the above sql statement
  header('Location: displaysubscription.php'); //go back to display business
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
		Edit a Subscription

	</div>
  <div class="php">
<p>
  <form method="post">
<p>Magazine id:
  <input type="text" name="magazineid" value="<?= $magazineis ?>">
</p>
<p>Subscription date:
  <input type="text" name="subscriptiondate" value="<?= $subscriptiondate ?>">
</p>
<p>Subscription period:
	<select>
		<option value="'Daily'" <?php if ($subscriptionperiod == "Daily") echo "selected='selected'";?> >Daily</option>
		<option value="'Weekly'" <?php if ($subscriptionperiod == "Weekly") echo "selected='selected'";?> >Weekly</option>
		<option value="'Monthly'" <?php if ($subscriptionperiod == "Monthly") echo "selected='selected'";?> >Monthly</option>
	</select>
</p>
<p>
  <input type="submit" name="updatebutton" value="update">
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
