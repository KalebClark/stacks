<? 
/* Include all required files
*    Emerge Framework
*/
defined('ROOT_PATH') or define('ROOT_PATH', realpath(dirname(__FILE__)));
include(ROOT_PATH.'/conf/site-config.php');

// Authentication
include(ROOT_PATH.'/lib/class.uFlex.php');
$user = new uFlex(false);
$user->db['host'] = $site_config['mysql']['host'];
$user->db['user'] = $site_config['mysql']['user'];
$user->db['pass'] = $site_config['mysql']['pass'];
$user->db['name'] = $site_config['mysql']['db'];
$user->start();

// Include all files below this line ----------------------------------------
include(ROOT_PATH.'/lib/auth.php');
include(ROOT_PATH.'/lib/util.php');
include(ROOT_PATH.'/lib/mysqli.php');
