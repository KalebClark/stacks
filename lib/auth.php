<?
function login_link($s) {
  if($s) {
    $retVal = '<a href="#" id="nav-logout">Logout</a>';
  } else {
    $retVal = '<a href="#" id="nav-login">Login</a>';
  }
  print $retVal;
}
?>
