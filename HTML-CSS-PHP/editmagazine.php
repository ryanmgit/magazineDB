<?php
require_once "dbconnection.php";
$query="SELECT * FROM magazine where magazineid = :magazineid";
$sql = $pdo->prepare($query);
$sql->execute(array(":magazineid" => $_GET['magazineid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$jn = $row['Magazinename'];
$lil = $row['Type'];
$pil = $row['City'];
$jiid = $row['State'];

if(isset($_POST['updatebutton'])){
  $query="UPDATE magazine SET Magazinename=:Magazinename, type=:type, City=:City, State=:State WHERE Magazineid=:Magazineid";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":Magazinename" => $_POST['Magazinename'],
        ":type" => $_POST['type'],
        ":City" => $_POST['City'],
        ":State" => $_POST['State'],
        ":Magazineid" => $_GET['Magazineid'])
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
  <input type="text" name="Magazinename" value="<?= $jn ?>">
</p>
<p>Type:
  <input type="text" name="Type" value="<?= $lil ?>">
</p>
<p>City:
  <input type="text" name="City" value="<?= $pil ?>">
</p>
<p>State:
  <input type="text" name="State" value="<?= $jiid ?>">
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
