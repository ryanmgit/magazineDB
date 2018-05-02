<?php
require_once "dbconnection.php";
$query="SELECT * FROM magazine where magazineid = :magazineid";
$sql = $pdo->prepare($query);
$sql->execute(array(":magazineid" => $_GET['magazineid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$magazinename = $row['Magazinename'];
$type = $row['Type'];
$city = $row['City'];
$state = $row['State'];

if(isset($_POST['updatebutton'])){
  $query="UPDATE magazine SET magazinename=:magazinename, type=:type, city=:city, state=:state WHERE magazineid=:magazineid";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":magazinename" => $_POST['magazinename'],
        ":type" => $_POST['type'],
        ":city" => $_POST['city'],
        ":state" => $_POST['state'],
        ":magazineid" => $_GET['magazineid'])
        );

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
		Edit a Magazine

	</div>
  <div class="php">
<p>
  <form method="post">
<p>Magazine name:
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
  <input type="submit" name="updatebutton" value="update">
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
