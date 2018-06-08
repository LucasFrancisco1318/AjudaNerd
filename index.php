<?php
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

require_once("site.php");
require_once("admin.php");
require_once("suporte.php");
require_once ("admin-users.php");
require_once ("admin-books.php");
require_once ("admin-profile.php");
require_once ("functions.php");

$app->run();

?>