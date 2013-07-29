<? 
/* MySQL functions for javascript requests
*    Emerge Framework
*/
include('../inc.php');

$action = $_POST['action'];
switch($action) {
	case 'update':
		mjs_update();
		break;
  case 'delete':
    mjs_delete();
    break;
	case 'other':
		mjs_other();
		break;
}

function mjs_delete() {
	$sql = new mysql();
	$table	= filter_var($_POST['table'], FILTER_SANITIZE_STRING);
	$id			= filter_var($_POST['id'], FILTER_VALIDATE_INT);
	$query = "
    DELETE FROM $table WHERE id = '$id'
	";
	//$sql->update($query);
  
}

function mjs_update() {
	$sql = new mysql();
	$table	= filter_var($_POST['table'], FILTER_SANITIZE_STRING);
	$field	= filter_var($_POST['field'], FILTER_SANITIZE_STRING);
	$value	= filter_var($_POST['value'], FILTER_SANITIZE_STRING);
	$id			= filter_var($_POST['id'], FILTER_VALIDATE_INT);
	$query = "
		UPDATE	$table
		SET $field = '$value'
		WHERE id = '$id'
	";
	//$sql->update($query);
}
