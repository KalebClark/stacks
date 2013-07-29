/* MySQL functions that request from ajax/mysql_js_func.php
*    Emerge Framework
*/
var mysql = {
  update_one_field: function(table, id, field, value) {
	  var action = 'update';
	  var opts = 'action='+action+'&table='+table+'&id='+id+'&field='+field+'&value='+value;
	  emerge.ajax_post('ajax/mysql_js_func.php', opts);
  },

  delete_one_row: function (table, id) {
    var action = 'delete';
	  var opts = 'action='+action+'&table='+table+'&id='+id;
	  emerge.ajax_post('ajax/mysql_js_func.php', opts);
  }
}
