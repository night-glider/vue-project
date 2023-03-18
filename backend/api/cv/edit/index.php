<?
require_once "../../db.php";
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");


$query = "UPDATE public.summary
	SET profession='$_GET[prof]', city='$_GET[city]', name='$_GET[name]', phone='$_GET[phon]', 
	email='$_GET[mail]', birthday='$_GET[birt]', payment='$_GET[pay]', skills='$_GET[skills]', 
	about='$_GET[about]', education='$_GET[educ]', school='$_GET[school]', faculty='$_GET[fac]', 
	spec='$_GET[spec]', graduation_year='$_GET[grad]', photo_url='$_GET[photo]'
	WHERE public.summary.id = $_GET[id];";
$result = pg_query($dbconn, $query);

exit();
?>