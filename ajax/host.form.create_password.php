<?
include('../inc.php');
$uid  = filter_var($_GET['uid'], FILTER_VALIDATE_INT);
?>
<form id="create_password">
<div>
  <input type="text" id="password00" name="password00" />
</div>
<div>
  <input type="text" id="password01" name="password01" />
</div>
<input type="hidden" name="uid" value="<?=$uid;?>" />
</form>
<div>
  <button onClick="host.create_password();">Create Password</button>
</div>
