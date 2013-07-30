<?
include('../inc.php');
?>
<div id="host_alerts"></div>
<form id="register_host">
<div>
  <input id="userid" name="userid" type="text" value="Username" />
</div>
<div>
  <input id="full_name" name="full_name" type="text" value="Full Name" />
</div>
<div>
  <input id="email_addr" name="email_addr" type="text" value="Email Address" />
</div>
</form>
<div>
  <button onClick="host.register_user()">Sign Up</button>
</div>
