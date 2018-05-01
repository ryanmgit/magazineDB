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
		Magazines

	</div>
  <div class="php">
<?php

require_once "dbconnection.php";
//execute the follpwing quary
$query="select * from magazine";
$sql=$pdo->prepare($query);
$sql->execute();

echo "<table border='1'>";
echo "<tr><th>Magazine id</th><th>Magazine name</th><th>Type</th><th>City</th><th>State</th><th>Action</th></tr>";
//$row = $sql->fetch(PDO::FETCH_ASSOC states that store the next row in the quesry result into $row
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){//print out the query result row by row
    echo "<tr><td>";
    echo ($row['Magazineid']);
    echo "</td><td>";
    echo ($row['Magazinename']);
    echo "</td><td>";
    echo ($row['Type']);
    echo "</td><td>";
    echo ($row['City']);
    echo "</td><td>";
    echo ($row['State']);
    echo "</td><td>";
//clicking on differnt links leads to corresponding editing pages
    echo ('<a href="editmagazine.php?magazineid='.$row['Magazineid'].'">Edit</a> /');
    echo ('<a href="deletemagazine.php?magazineid='.$row['Magazineid'].'">Delete</a> / ');
    echo ('<a href="reviewmagazine.php?magazineid='.$row['Magazineid'].'">Review</a>');
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
