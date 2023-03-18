<?
require_once "../db.php";
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");

if (isset($_GET["id"])) {
	$query = "SELECT * FROM public.summary WHERE public.summary.id = $_GET[id]";
	$result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());
	echo json_encode(pg_fetch_all($result));
	exit();
}



$query = 'SELECT * FROM public.summary ORDER BY id ASC ';
$result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

echo json_encode(pg_fetch_all($result));
exit();
?>