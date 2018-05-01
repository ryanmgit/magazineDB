
<?php
require_once "dbconnection.php";
//execute the follpwing quary
$query="SELECT * FROM review where Subscriberid = :Subscriberid";
$sql=$pdo->prepare($query);
$sql->execute(array(":Subscriberid" => $_GET['Subscriberid']));

echo "<table border='1'>";
echo "<tr><th>Review Date</th><th>Stars</th></tr>";
//$row = $sql->fetch(PDO::FETCH_ASSOC states that store the next row in the quesry result into $row
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){//print out the query result row by row
    echo "<tr><td>";
    echo ($row['Reviewdate']);
    echo "</td><td>";
    echo ($row['Stars']);
    echo "</td>";
    echo "<tr>";
  }
echo "</table>";

require_once "dbconnection.php";
$query="SELECT * FROM magazine where magazineid = :magazineid";
$sql = $pdo->prepare($query);
$sql->execute(array(":magazineid" => $_GET['magazineid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$in = $row['Magazinename'];
$on = $row['Type'];
$of = $row['City'];
$fo = $row['State'];

if(isset($_POST['submitbutton'])){
  $query="SELECT subscriberid FROM consumer where Email = :Email";
  $sql=$pdo->prepare($query);
  $sql->execute(array(":email" => $_POST['email']));
//after the add button, execute the insert into sql statement
  $row = $sql->fetch(PDO::FETCH_ASSOC);
  $fid = $row['subscriberid'];
//the combination all of the 3 bellow statesments are to execute sql statement
  $query="insert into review (reviewdate,stars,subscriberid,Magazineid) values (:reviewdate,:stars,:subscriberid,:Magazineid)";

  //:businessname,:city,:state are placeholders for inputs
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":reviewdate" => date("y-m-d-"),// date("y-m-d") generates the date format in yyyy-mm-dd.
        ":stars" => $_POST['stars'],
        ":subscriberid" => $_GET['subscriberid'],
        ":Magazineid" => $fid)
               );
//they are defenitions for :businessname,:city,:state
  header('Location: index.html');//go to index
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
    <input type="text" name="magazinename" value="<?= $in ?>" >
  </p>
  <p>Type:
    <input type="text" name="Type" value="<?= $on ?>">
  </p>
  <p>City:
    <input type="text" name="city" value="<?= $of ?>">
  </p>
  <p>State:
    <input type="text" name="State" value="<?= $fo ?>">
  </p>
  <p>Star Rating:
    <input type="text" name="stars">
  </p>
  <p>Subscriber Email:
    <input type="text" name="email">
  </p>
  <p>
    <input type="submit" name="submitbutton" value="submit">
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
