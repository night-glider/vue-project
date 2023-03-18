<?
require_once "../../../db.php";
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");


$query = "UPDATE public.summary SET status='$_GET[status]' WHERE id = $_GET[id]";
$result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

?>