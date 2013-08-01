<?
include('../inc.php');
$sql = new mysql();

$auth = array();
$auth['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$auth['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$auth['email']    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$auth['group_id']    = filter_var($_POST['group_id'], FILTER_SANITIZE_EMAIL);

$auth['email'] = urldecode($auth['email']);
Dumper($auth);

$registered = $user->register($auth, false);

if($registered) {
  echo "user registered";
} else {
  foreach($user->error() as $err) {
    echo $err;
  }
}
?>
