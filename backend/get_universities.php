<?
error_reporting(E_ERROR | E_PARSE);
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");
if (!(isset($_GET['search']) && $_GET['search']!="")) 
{
	echo json_encode(Array());
	die();
}

$search = $_GET['search'];
$city = $_GET['city'];

$response = file_get_contents('https://api.vk.com/method/database.getCities?access_token=2e5cdc362e5cdc362e5cdc36512d4e2eb822e5c2e5cdc364a5961072ffc77da44e1c1f5&v=5.131&country_id=1&count=10&need_all=0&lang=ru&q=' . $city);

$response = json_decode($response, true);
$city_id = $response["response"]["items"][0]["id"];

$response = file_get_contents('https://api.vk.com/method/database.getUniversities?access_token=2e5cdc362e5cdc362e5cdc36512d4e2eb822e5c2e5cdc364a5961072ffc77da44e1c1f5&v=5.131&country_id=1&lang=ru&city_id=' . $city_id . '&q=' . $search);
$response = json_decode($response, true);
$result = Array();
foreach ($response["response"]["items"] as $value) {
	$result[] = $value["title"];
}
echo json_encode($result);


?>