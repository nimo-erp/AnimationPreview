<?php
session_start();
require_once 'Config/Config.php';
require_once 'Core/Database.php';
require_once 'Core/Router.php';

$Router = new Router();
$Router->Route();
?>