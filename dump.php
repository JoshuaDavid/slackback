<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
$cols = array(
	'token',
    'team_id',
    'team_domain',
    'channel_id',
    'channel_name',
    'timestamp',
    'user_id',
    'user_name',
    'text',
    'trigger_word',
);
function asParam($x) { return ":$x"; }
$sql = "insert into messages ("
	. implode(', ', $cols)
	. ') values ('
	. implode(', ', array_map('asParam', $cols))
	. ')';

$dbfile = 'db/messages.sqlite'; 
$dbh = new PDO("sqlite:$dbfile");
$stmt = $dbh->prepare($sql) or die(json_encode($dbh->errorInfo()));
foreach($cols as $col) {
	$val = isset($_POST[$col]) ? $_POST[$col] : '';
	$stmt->bindValue(":$col", $val);
}
$stmt->execute();
?>
