<?
include('../inc.php');
$username   = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password   = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$auto       = filter_var($_POST['auto'], FILTER_SANITIZE_STRING);

$user = new uFlex();
$user->db['host'] = $site_config['mysql']['host'];
$user->db['user'] = $site_config['mysql']['user'];
$user->db['pass'] = $site_config['mysql']['pass'];
$user->db['name'] = $site_config['mysql']['db'];
$user->login($username, $password, $auto);

if($user->signed) {
  echo "User Signed In";
} else {
  foreach($user->error() as $err) {
    echo $err;
  }
}
?>
