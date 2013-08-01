<?
include('../inc.php');
?>
<div class="container content-box">
<form id="user_login">
<label>Username:</label>
  <input type="text" id="username" name="username" value="Username" />
  <br/>
<label>Password:</label>
  <input type="password" id="password" name="password" />
  <br/>

<label>Remember Me?:</label>
  <input type="checkbox" name="auto" />
  <br/>

</form>
<div>
  <button onClick="host.login();">Log on</button>
</div>
<div>
  <button onClick="host.signup();">Create Account</button>
</div>
</div>
