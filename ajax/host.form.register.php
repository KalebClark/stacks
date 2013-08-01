<?
include('../inc.php');
?>
<div id="host_alerts"></div>
  <form id="register_host">
    <label>Username:</label>
    <input type="text" name="username" />

    <label>Password:</label>
    <input type="password" name="password" />

    <label>Re-enter Password:</label>
    <input type="password" name="password2" />

    <label>Email: </label>
    <input type="text" name="email" />

    <label>Group: </label>
    <select name="group_id">
    <option value="1">User</option>
    <option value="2">Developer</option>
    <option value="3">Designer</option>
    </select>
  </form>
<div>
  <button onClick="host.register_user()">Sign Up</button>
</div>
