<?php
require_once "dbconnection.php";//connect to the database

//the following if statement is used to define what to do if the "Add" button in the form is clicked.
//isset($_POST['addbutton'] is used to check whether the "Add" button is clicked
//after clicking the add button, the user input through the html form are saved as $_POST['accountname'],$_POST['email'],$_POST['addbutton']
if(isset($_POST['addsubscriber'])){
  //the following 6 lines of code define and execute an sql statment
  $query="insert into subscriber(subscribersfname, subscriberslname, Email, City, State) values (:subscribersfname, :subscriberslname, :email, :city, :state)";//:accountname,:email are placeholders for user input
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":subscribersfname" => $_POST['subscribersfname'],//the placeholders are defined using array()
        ":subscriberslname" => $_POST['subscriberslname'],
        ":email" => $_POST['email'],
        ":city" => $_POST['city'],
        ":state" => $_POST['state'])
  );
  header('Location: displaysubscriber.php');//go to subscribers
};

if(isset($_POST['addmagazine'])){
  //the following 6 lines of code define and execute an sql statment
  $query="insert into magazine (magazinename, type, City, State) values (:magazinename, :type, :city, :state)";//:accountname,:email are placeholders for user input
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":magazinename" => $_POST['magazinename'],//the placeholders are defined using array()
        ":type" => $_POST['type'],
        ":city" => $_POST['city'],
        ":state" => $_POST['state'])
  );
  header('Location: displaymagazine.php');//go to magazines
};

if(isset($_POST['addsubscription'])){
  //the following 6 lines of code define and execute an sql statment
  $query="insert into subscription (magazineid, subscriberid, subscriptiondate, subscriptionperiod) values (:magazineid, :subscriberid,:subscriptiondate, :subscriptionperiod)";//:accountname,:email are placeholders for user input
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":magazineid" => $_POST['magazineid'],
	":subscriberid" => $_POST['subscriberid'],
	":subscriptiondate" => $_POST['subscriptiondate'],
        ":subscriptionperiod" => $_POST['subscriptionperiod'])
  );
  header('Location: displaysubscription.php');//go to subscriptions

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
		Add New Entry


  <div class="php">
<p>Add a new Subscriber below</p>
<form method="post">
<p>Subscriber First Name:
<input type="text" name="subscribersfname"></p>
<p>Subscriber Last Name:
<input type="text" name="subscriberslname"></p>
<p>Email:
<input type="text" name="email" ></p>
<p>City:
<input type="text" name="city"></p>
<p>State:
<input type="text" name="state"></p>

<p><input type="submit" name="addsubscriber" value="Add a new Subscriber"></input>
</p>
</form>


<p>Add a new Magazine below</p>
<form method="post">
<p>Magazine Name:
<input type="text" name="magazinename"></p>
<p>Type:
<input type="text" name="type"></p>
<p>City:
<input type="text" name="city"></p>
<p>State:
<input type="text" name="state"></p>

<p><input type="submit" name="addmagazine" value="Add a new Magazine"></input>
</p>
</form>



<p>Add a new Subscription below</p>
<form method="post">
<p>Subscriber ID:
<input type="text" name="subscriberid"></p>
<p>Magazine ID:
<input type="text" name="magazineid"></p>
<p>Subscription Date:
<input type="text" name="subscriptiondate"></p>
<p>Subscription period:
	<input type="text" name="subscriptionperiod"></p>
</p>
	<p><input type="submit" name="addsubscription" value="Add a new Subscription"></input>
</p>
</form>




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

