<?php

$server = 'localhost';
$dbname = 'hb';
$user ='hb';
$pwd = 'hb';

$dsn = 'mysql:dbname='.$dbname.';host='.$server;

try {
	$db = new PDO($dsn, $user, $pwd);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
	// on détruit les paramètres
	unset($server,$dbname,$user,$pwd,$dsn);

} catch (PDOException $e) {
	print "Erreur ! " . $e->getMessage() . "<br/>";
	die();
}