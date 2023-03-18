<?
header('Access-Control-Allow-Origin: *');
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres port=5433") or die('Could not connect: ' . pg_last_error());

?>