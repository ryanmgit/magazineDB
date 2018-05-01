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
		Subscribers

	</div>
  <div class="php">

<?php

require_once "dbconnection.php";
//execute the follpwing quary
$query="select * from subscriber";
$sql=$pdo->prepare($query);
$sql->execute();

echo "<table border='1'>";
echo "<tr><th>Subscriber id</th><th>Subscribers fname</th><th>Subscribers lname</th><th>Email</th><th>City</th><th>State</th><th>Action</th></tr>";
//$row = $sql->fetch(PDO::FETCH_ASSOC states that store the next row in the quesry result into $row
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){//print out the query result row by row
    echo "<tr><td>";
    echo ($row['Subscriberid']);
    echo "</td><td>";
    echo ($row['Subscribersfname']);
    echo "</td><td>";
    echo ($row['Subscriberslname']);
    echo "</td><td>";
    echo ($row['Email']);
    echo "</td><td>";
    echo ($row['City']);
    echo "</td><td>";
    echo ($row['State']);
    echo "</td>";
    echo "<td>";
//clicking on differnt links leads to corresponding editing pages
    echo ('<a href="editsubscriber.php?subscriberid='.$row['Subscriberid'].'">Edit</a> /');
    echo ('<a href="deletesubscriber.php?subscriberid='.$row['Subscriberid'].'">Delete</a>');
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
