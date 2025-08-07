<?php
session_start();

require_once '../config/config.php';
require_once '../app/core/Database.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Router.php';

use Core\Router;

$url = $_GET['url'] ?? 'home/index';

$router = new Router();
$router->direct($url);
