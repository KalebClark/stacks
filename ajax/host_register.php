<?
include('../inc.php');
$sql = new mysql();

$userid     = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);
$full_name  = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
$email_addr = filter_var($_POST['email_addr'], FILTER_SANITIZE_EMAIL);

$check_query = "
  SELECT count(id) AS cnt
  FROM user
  WHERE userid = '$userid'
";
$dups = $sql->getRows($check_query);
if($dups[0]->cnt > 0) {
  // User already exists
  // Return -1 as fail
  print "-1";
} else {
  // User does not exist. Proceed with insert
  $insert_query = "
    INSERT INTO user SET
    userid    = '$userid',
    password  = PASSWORD('code4sac'),
    fullname  = '$full_name',
    email     = '$email_addr',
    notes     = 'This is a note'
  ";
  $user_id = $sql->insert($insert_query);
  print $user_id;
}
?>
