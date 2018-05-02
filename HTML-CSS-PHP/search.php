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
	  
  if ($fname=="any" || $fname=="Any"){
    $fname=" is not null";
    } else {
        $fname='="' . $fname . '"';
    }
    
  if ($lname=="any" || $lname=="Any"){
    $lname=" is not null";
    } else {
        $lname='="' . $lname . '"';
    }
  
  if ($email=="any" || $email=="Any"){
    $email=" is not null";
    } else {
        $email='="' . $email . '"';
    }
  
  if ($city=="any" || $city=="Any"){
    $city=" is not null";
    } else {
        $city='="' . $city . '"';
    }
  
  if ($state=="any" || $state=="Any"){
    $state=" is not null";
    } else {
        $state='="' . $state . '"';
    }
  
  if ($magazine=="any" || $magazine=="Any"){
    $magazine=" is not null";
    } else {
        $magazine='="' . $magazine . '"';
    }
  
require_once "dbconnection.php";
//execute the follpwing query
$query='select subscriptionid, magazinename, subscribersfname, subscriberslname, subscriptiondate, subscriptionperiod, subscriber.city, subscriber.state, email from subscription left join subscriber on subscription.subscriberid=subscriber.subscriberid left join magazine on subscription.magazineid=magazine.magazineid where subscribersfname' . $fname . ' and subscriberslname' . $lname . ' and email' . $email . ' and subscriber.city' . $city . ' and subscriber.state' . $state . ' and magazinename' . $magazine . ' and email' . $email . ' group by subscriptionid;';
$sql=$pdo->prepare($query); 
$sql->execute();
	 
echo "<table class='php'>";
echo "<tr><th>Subscription id</th><th>Magazine Name</th><th>Subscriber fname</th><th>Subscriber lname</th><th>Subscription Date</th><th>Subscription Period</th><th>Subscriber City</th><th>Subscriber State</th><th>Email</th><th>Action</th></tr>";
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
    echo ('<a href="editsubscription.php?subscriptionid='.$row['Subscriptionid'].'">Edit</a> / ');
    echo ('<a href="deletesubscription.php?subscriptionid='.$row['Subscriptionid'].'">Delete</a> / ');
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
