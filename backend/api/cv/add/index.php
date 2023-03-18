<?
require_once "../../db.php";
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');



$query = "INSERT INTO public.summary(
	profession, city, name, phone, email, birthday, payment, skills, about, education, school, faculty, spec, graduation_year, status, photo_url)
	VALUES ( '$_GET[prof]', '$_GET[city]', '$_GET[name]', '$_GET[phon]', 
			'$_GET[mail]', '$_GET[birt]', '$_GET[pay]', '$_GET[skills]', 
			'$_GET[about]', '$_GET[educ]', '$_GET[school]', '$_GET[fac]', '$_GET[spec]', '$_GET[grad]', 'новый', '$_GET[photo]')";
$result = pg_query($dbconn, $query);

exit();
?>