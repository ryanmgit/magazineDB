<!DOCTYPE html>
<html>
<head>
<title>Search Results</title>
<link rel="stylesheet" type="text/css" href="magazinestyle.css">
</head>
<body>
<div class="background">
<div class="fullform">
	<div class="welcometext"> 
		Search Results 
		
	</div>
  <div class="php">
<?php

  $fname = $_POST['fnameinput'];
  $lname = $_POST['lnameinput'];
  $email = $_POST['emailinput'];
  $city = $_POST['cityinput'];
  $state = $_POST['stateinput'];
  $magazine = $_POST['magazineinput'];
	  
  if ($fname="any"){
    $fname=" is not null";
    } else {
        $fname='="' . $fname . '"';
    }
    
  if ($lname="any"){
    $lname=" is not null";
    } else {
        $lname='="' . $lname . '"';
    }
  
  if ($email="any"){
    $email=" is not null";
    } else {
        $email='="' . $email . '"';
    }
  
  if ($city="any"){
    $city=" is not null";
    } else {
        $city='="' . $city . '"';
    }
  
  if ($state="any"){
    $state=" is not null";
    } else {
        $state='="' . $state . '"';
    }
  
  if ($magazine="any"){
    $magazine=" is not null";
    } else {
        $magazine='="' . $magazine . '"';
    }
  
require_once "dbconnection.php";
//execute the follpwing query
$query="select subscriptionid, magazinename, subscribersfname, subscriberslname, subscriptiondate, subscriptionperiod, subscriber.city, magazine.city, subscriber.state, magazine.state from subscription left join subscriber on subscription.subscriberid=subscriber.subscriberid left join magazine on subscription.magazineid=magazine.magazineid where subscribersfname' . $fname . ' and subscriberslname' . $lname . ' and email' . $email . ' and subscriber.city' . $city . ' and magazine.city' . $city . ' and subscriber.state' . $state . ' and magazine.state' . $state . ' and magazinename' . $magazine . ' group by subscriptionid;'";
$sql=$pdo->prepare($query); 
$sql->execute();

echo "<table class='php'>";
echo "<tr><th>Subscription id</th><th>Magazine name</th><th>Subscriber fname</th><th>Subscriber lname</th><th>Subscriptiondate</th><th>Subscriptionperiod</th><th>City</th><th>State</th><th>Magazine</th><th>Action</th></tr>";
//$row = $sql->fetch(PDO::FETCH_ASSOC states that store the next row in the quesry result into $row
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){//print out the query result row by row
    echo "<tr><td>";
    echo ($row['Subscriptionid']);
    echo "</td><td>";
    echo ($row['Magazinename']);
    echo "</td><td>";
    echo ($row['Subscribersfname']);
    echo "</td><td>";
    echo ($row['Subscriberslname']);
    echo "</td><td>";
    echo ($row['Subscriptiondate']);
    echo "</td><td>";
    echo ($row['Subscriptionperiod']);
    echo "</td><td>";
    echo ($row['City']);
    echo "</td><td>";
    echo ($row['State']);
    echo "</td><td>";
    echo ($row['Email']);
    echo "</td><td>";
//clicking on different links leads to corresponding editing pages
    echo ('<a href="editsubscription.php?subscriptionid='.$row['Subscriptionid'].'">Edit</a> /');
    echo ('<a href="deletesubscription.php?subscriptionid='.$row['Subscriptionid'].'">Delete</a> / ');
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
