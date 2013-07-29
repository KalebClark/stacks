<?
include('../inc.php');
$sql = new mysql();

$pass00   = filter_var($_POST['password00'], FILTER_SANITIZE_STRING);
$uid      = filter_var($_POST['uid'], FILTER_VALIDATE_INT);

$query = "
  UPDATE user SET
  password = PASSWORD('$pass00')
  WHERE id = '$uid'
";
$sql->insert($query);

