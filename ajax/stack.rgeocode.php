<?
$lat = $_GET['lat'];
$lon = $_GET['lon'];

$google_url   = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=true";
$json         = file_get_contents($google_url);
print $json;
?>
