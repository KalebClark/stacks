<?
include('../inc.php');
?>
<div class="container content-box">
<form id="user_login">
<div>
  <input type="text" id="username" name="username" value="Username" />
</div>
<div>
  <input type="password" id="password" name="password" />
</div>
</form>
<div>
  <button onClick="host.login();">Log on</button>
</div>
<div>
  <button onClick="host.signup();">Create Account</button>
</div>
</div>
