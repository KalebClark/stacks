<?
include('../inc.php');
$sql = new mysql();

$lat = $_GET['lat'];
$lon = $_GET['lon'];

$query = "
  SELECT  lat
      ,   lon
      ,   box_title
  FROM stacks
";

$query = "
  SELECT  *
      ,   (3959 * ACOS(COS(RADIANS(42.358431))
      *   COS(RADIANS(lat))
      *   COS(RADIANS(lon)
      -   RADIANS(-71.059773))
      +   SIN(RADIANS(42.358431))
      *   SIN(RADIANS(lat)))) AS distance
  FROM stacks 
  ORDER by distance 
";

$query = "
  SELECT  *
      ,   (3959 * ACOS(COS(RADIANS($lat))
      *   COS(RADIANS(lat))
      *   COS(RADIANS(lon)
      -   RADIANS($lon))
      +   SIN(RADIANS($lat))
      *   SIN(RADIANS(lat)))) AS distance
  FROM stacks 
  ORDER by distance 
";


$stacks = $sql->getRows($query);
$stacks = json_encode($stacks);
print $stacks;
?>
