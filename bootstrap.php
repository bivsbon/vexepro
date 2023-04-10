<?php
require_once 'configs/routes.php';
require_once 'configs/database.php';

require_once 'core/Connection.php';

$mysqlCon = Connection::getInstance();

require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'core/Request.php';
require_once 'core/SqlClauses.php';
require_once 'core/BaseSqlBuilder.php';
require_once 'core/MySqlBuilder.php';
require_once 'core/Database.php';

require_once 'app/utils/language.php';

require_once 'app/App.php';