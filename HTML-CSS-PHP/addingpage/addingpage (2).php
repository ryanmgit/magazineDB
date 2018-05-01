<!DOCTYPE html>
<html>
<head>
<title>add Subscriber, Magazine, Subscription, or Review page</title>
</head>
<body>

<p>Add a new Subscriber below</p>
<form method="post">
<p>Subscriber First Name:
<input type="text" name="subscriberfname"></p>
<p>Subscriber Last Name:
<input type="text" name="subscriberlname"></p>
<p>Email:
<input type="text" name="email" ></p>
<p>City:
<input type="text" name="City"></p>
<p>State:
<input type="text" name="State"></p>

<p><input type="submit" name="addsubscriber" value="Add"/>
</p>
</form>

<p><a href="index.php">Cancel</a> </p>

<p>Add a new Magazine below</p>
<form method="post">
<p>Magazine Name:
<input type="text" name="magazinename"></p>
<p>Type:
<input type="text" name="type"></p>
<p>City:
<input type="text" name="City"></p>
<p>State:
<input type="text" name="State"></p>

<p><input type="submit" name="addmagazine" value="Add"/>
</p>
</form>

<p><a href="index.php">Cancel</a> </p>

<p>Add a new Subscription below</p>
<form method="post">
<p>Subscription Date:
<input type="text" name="subscriptiondate"></p>
<p>Subscription Period:
<input type="text" name="subscriptionperiod"></p>

<p><input type="submit" name="addsubscription" value="Add"/>
</p>
</form>

<p><a href="index.php">Cancel</a> </p>


<p>Add a new Review below</p>
<form method="post">
<p>Stars:
<input type="text" name="stars"></p>
<p>Review Date :
<input type="text" name="Reviewdate"></p>


<p><input type="submit" name="addreview" value="Add"/>
</p>
</form>

<p><a href="index.php">Cancel</a> </p>

</body>
</html>

<?php
require_once "dbconnection.php";//connect to the database

//the following if statement is used to define what to do if the "Add" button in the form is clicked.
//isset($_POST['addbutton'] is used to check whether the "Add" button is clicked
//after clicking the add button, the user input through the html form are saved as $_POST['accountname'],$_POST['email'],$_POST['addbutton']
if(isset($_POST['addsubscriber'])){
  //the following 6 lines of code define and execute an sql statment
  $query="insert into magazine (subscriberfname, subscriberlname, subscriberid, Email, City, State) values (:subscriberfname, :subscriberlname, :Email, :City, :State)";//:accountname,:email are placeholders for user input
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":subscriberfname" => $_POST['subscriberfname'],//the placeholders are defined using array()
        ":subscriberlname" => $_POST['subscriberlname'],
        ":email" => $_POST['email'],
        ":city" => $_POST['city'],
        ":state" => $_POST['state'])
                );
  header('Location: index.php');//go to page index
};

if(isset($_POST['addmagazine'])){
  //the following 6 lines of code define and execute an sql statment
  $query="insert into magazine (magazinename, magazineid, type, City, State) values (:magazinename, :type, :City, :State)";//:accountname,:email are placeholders for user input
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":magazinename" => $_POST['magazinename'],//the placeholders are defined using array()
        ":type" => $_POST['type'],
        ":city" => $_POST['city'],
        ":state" => $_POST['state'])
                );
  header('Location: index.php');//go to page index
};

if(isset($_POST['addsubscription'])){
  //the following 6 lines of code define and execute an sql statment
  $query="insert into magazine (magazineid, subscriberid, subscriptiondate, subscriptionperiod) values (:subscriptiondate, :subscriptionperiod)";//:accountname,:email are placeholders for user input
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":subscriptiondate" => $_POST['subscriptiondate'],
        ":subscriptionperiod" => $_POST['subscriptionperiod'])
                );
  header('Location: index.php');//go to page index
};

if(isset($_POST['addreview'])){
  //the following 6 lines of code define and execute an sql statment
  $query="insert into magazine (magazineid, subscriberid, stars, reviewid, reviewdate) values (:stars, :reviewid, :reviewdate)";//:accountname,:email are placeholders for user input
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":stars" => $_POST['stars'],
        ":reviewid" => $_POST['reviewid'],
        ":reviewdate" => $_POST['reviewdate'])
                );
  header('Location: index.php');//go to page index
};
?>
