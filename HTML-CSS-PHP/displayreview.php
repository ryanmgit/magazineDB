<!DOCTYPE html>
<html>
<head>
<title>Reviews</title>
<link rel="stylesheet" type="text/css" href="magazinestyle.css">
</head>
<body>
<div class="background">
<div class="fullform">
	<div class="welcometext">
		Reviews

	</div>
  <div class="php">
<?php
require_once "dbconnection.php";
//execute the follpwing quary
$query="select reviewid, subscribersfname, subscriberslname, magazinename, subscriptionperiod, stars, reviewdate from review left join subscription on review.subscriptionid=subscription.subscriptionid left join subscriber on subscription.subscriberid=subscriber.subscriberid left join magazine on subscription.magazineid=magazine.magazineid";
$sql=$pdo->prepare($query);
$sql->execute();
echo "<table border='1' text-align='center'>";
echo "<tr><th>Review id</th><th>Subscriber fname</th><th>Subscriber lname<th>Magazine Name</th><th>Subscription Period<th>Stars</th><th>Review Date<th>Action</th></tr>";
//$row = $sql->fetch(PDO::FETCH_ASSOC states that store the next row in the quesry result into $row
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){//print out the query result row by row
    echo "<tr><td>";
    echo ($row['reviewid']);
    echo "</td><td>";
    echo ($row['subscribersfname']);
    echo "</td><td>";
    echo ($row['subscriberslname']);
    echo "</td><td>";
    echo ($row['magazinename']);
    echo "</td><td>";
    echo ($row['subscriptionperiod']);
    echo "</td><td align='center'>";
    echo ($row['stars']);
    echo "</td><td>";
    echo ($row['reviewdate']);
    echo "</td><td align='center'>";
//clicking on differnt links leads to corresponding editing pages
    echo ('<a href="deletereview.php?reviewid='.$row['reviewid'].'">Delete</a>');
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
