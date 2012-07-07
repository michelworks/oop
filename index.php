<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
require_once 'models/datamodel.php';
require_once 'models/database.php';
require_once 'config/config.php';
require_once 'app/appfactory.php';

$dataModel = new dataModel(new database());
$view = null;
$controller = null;
$params = null;


if(isset($_REQUEST['v'])) $view = str_replace("/","",$_REQUEST['v']);
else $view = "index";


$controller = new appFactory();
$controllers = $controller->getAppFactory($view, $dataModel, & $params);
$view=$controller->getView();
echo ($view->display());


?>
