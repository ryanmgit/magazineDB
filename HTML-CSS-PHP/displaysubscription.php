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
		Subscriptions

	</div>
  <div class="php">
<?php

require_once "dbconnection.php";
//execute the follpwing quary
$query="select * from subscription";
$sql=$pdo->prepare($query);
$sql->execute();

echo "<table border='1'>";
echo "<tr><th>Magazine id</th><th>Subscriber id</th><th>Subscriptiondate</th><th>Subscriptionperiod</th><th>Action</th></tr>";
//$row = $sql->fetch(PDO::FETCH_ASSOC states that store the next row in the quesry result into $row
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){//print out the query result row by row
    echo "<tr><td>";
    echo ($row['Magazineid']);
    echo "</td><td>";
    echo ($row['Subscriberid']);
    echo "</td><td>";
    echo ($row['Subscriptiondate']);
    echo "</td><td>";
    echo ($row['Subscriptionperiod']);
    echo "</td><td>";
//clicking on differnt links leads to corresponding editing pages
    echo ('<a href="editsubscription.php?subscriptionid='.$row['Subscriptionid'].'">Edit</a> /');
    echo ('<a href="deletesubscription.php?subscriptionid='.$row['Subscriptionid'].'">Delete</a> /');
    echo ('<a href="reviewsubscription.php?subscriptionid='.$row['Subscriptionid'].'">Review</a>');
    echo "</td></tr>";
  }
echo "</table>";
?>
  </div>
  <p>
	</p>
  <div class="button">
		<input type="button" class="cancelbutton" value="Cancel" onclick="location.href='index.html';">
	</div>

</div>
</div>
</body>
</html>
