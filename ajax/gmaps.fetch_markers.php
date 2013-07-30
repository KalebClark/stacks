<?
/* Retrieves markers from database */
include('../inc.php');
$sql = new mysql();

$lat = $_GET['lat'];
$lon = $_GET['lon'];

/* I do not understand this query.
*  =============================== */
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
