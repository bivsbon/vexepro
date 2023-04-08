<?php
require_once 'configs/routes.php';
require_once 'configs/database.php';

require_once 'core/Connection.php';
global $config;
$db_config = array_filter($config['database']);
$mysqlCon = Connection::getInstance($db_config);

require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'core/Request.php';

require_once 'app/App.php';