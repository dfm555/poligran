<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 08:49 PM
 */
define('HOST','http://'.$_SERVER['HTTP_HOST']);
define('DIR_FS_DOCUMENT_ROOT', '/var/www/poligran/'); // where the pages are located on the server
define('DIR_WS_ADMIN', '/'); // absolute path required
define('BASE_INDEX',HOST.'/index/');
define('BASE_INDEX_INCLUDE',DIR_FS_DOCUMENT_ROOT.'/index/');
define('BASE_MODELS',DIR_FS_DOCUMENT_ROOT.'models/');
define('BASE_VIEWS',DIR_FS_DOCUMENT_ROOT.'views/');
define('BASE_CONTROLLERS',DIR_FS_DOCUMENT_ROOT.'/controllers/');

// define our database connection
define('DB_SERVER', '127.0.0.1'); // eg, localhost - should not be empty for productive servers

define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', 'root');
define('DB_DATABASE', 'db_calasanz');
