<?php
$pdo = new PDO('mysql:host=localhost;dbname=magazineDBpreloaded', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
