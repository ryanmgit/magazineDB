<?php
$pdo = new PDO('mysql:host=localhost;dbname=magazineDB', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
