<?
/* Configuration File
 *   Emerge Framework
*/
$site_config = array (
  'mysql' =>
    array (
      'host'  => 'localhost',
      'port'  => '3306',
      'user'  => 'root',
      'pass'  => '0cool',
      'db'    => 'stacks',
			'resType' => 'object',
			'result'=> false,
			'errors'=> true,
			'debug'	=> true
    ),
	'site' =>
		array (
			'title'		=> 'Stacks',
      'root'    => '/var/www/stacks',
			'wwwroot'	=> '',
			'lang'		=> 'en',
			'charset'	=> 'utf8',
			'jquery'	=> true,
			'jquery_theme' => 'smoothness',
			'google_api'	=> false
		)
);
?>
