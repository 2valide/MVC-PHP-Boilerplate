<?php

require_once '../core/Controller.php';
require_once '../core/Model.php';
require_once '../core/View.php';
require_once '../config/config.php';

$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$url = explode('/', $url);

$controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
$methodName = isset($url[1]) ? $url[1] : 'index';

require_once '../app/controllers/' . $controllerName . '.php';
$controller = new $controllerName();

if (method_exists($controller, $methodName)) {
    $controller->{$methodName}();
} else {
    echo 'Method not found';
}
