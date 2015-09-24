<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

$dbfile = 'db/messages.sqlite'; 
touch($dbfile);
chmod($dbfile, 0666);
$dbh = new PDO("sqlite:$dbfile");

$initSql = file_get_contents('db/init.sql');
$stmt = $dbh->prepare($initSql);
$stmt->execute();
?>
ok
