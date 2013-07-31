<?
include('../inc.php');

$stack_name       = filter_var($_POST['stack_name'], FILTER_SANITIZE_STRING);
$house_number     = filter_var($_POST['house_number'], FILTER_SANITIZE_STRING);
$street_name      = filter_var($_POST['street_name'], FILTER_SANITIZE_STRING);
$city_name        = filter_var($_POST['city_name'], FILTER_SANITIZE_STRING);
$zip_code         = filter_var($_POST['zip_code'], FILTER_SANITIZE_STRING);
$lat              = filter_var($_POST['lat'], FILTER_SANITIZE_STRING);
$lon              = filter_var($_POST['lon'], FILTER_SANITIZE_STRING);

print "userid: ".$user->id;

$sql = new mysql();
$query = "
  INSERT INTO stacks VALUES('0'
    , '$user->id'
    , '1'
    , '$stack_name'
    , '$lat'
    , '$lon'
    , '$house_number'
    , '$street_name'
    , '$city_name'
    , '$zip_code')
";
$id = $sql->insert($query);
print $id;
?>
