<?
include('../inc.php');
$username   = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password   = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$sql = new mysql();

$query = "
  SELECT  *
  FROM user
  WHERE userid   = '$username'
    AND password = PASSWORD('$password')
";
print $query;

$vu = $sql->getRows($query);
Dumper($vu);
?>
