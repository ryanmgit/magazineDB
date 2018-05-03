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
$query="select subscriptionid, magazinename, subscribersfname, subscriberslname, subscriptiondate, subscriptionperiod from subscription left join magazine on subscription.magazineid=magazine.magazineid left join subscriber on subscription.subscriberid=subscriber.subscriberid";
$sql=$pdo->prepare($query);
$sql->execute();

echo "<table border='1'>";
echo "<tr><th>Magazine Name</th><th>Subscriber fname</th><th>Subscriber lname</th><th>Subscriptiondate</th><th>Subscriptionperiod</th><th>Action</th></tr>";
//$row = $sql->fetch(PDO::FETCH_ASSOC states that store the next row in the quesry result into $row
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){//print out the query result row by row
    echo "<tr><td>";
    echo ($row['magazinename']);
    echo "</td><td>";
    echo ($row['subscribersfname']);
    echo "</td><td>";
    echo ($row['subscriberslname']);
    echo "</td><td>";
    echo ($row['subscriptiondate']);
    echo "</td><td>";
    echo ($row['subscriptionperiod']);
    echo "</td><td>";
//clicking on differnt links leads to corresponding editing pages
    echo ('<a href="editsubscription.php?subscriptionid='.$row['subscriptionid'].'">Edit</a> / ');
    echo ('<a href="deletesubscription.php?subscriptionid='.$row['subscriptionid'].'">Delete</a> / ');
    echo ('<a href="reviewsubscription.php?subscriptionid='.$row['subscriptionid'].'">Review</a>');
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
