<?php
error_reporting(E_ALL);

if (is_file('config.php')) {
    require_once('config.php');
}

if (is_file('vendor/autoload.php')) {
    require_once('vendor/autoload.php');
}

require_once('library/controller.php');
require_once('library/loader.php');
require_once('library/model.php');
require_once('library/mpdo.php');
require_once('library/registry.php');
require_once('library/request.php');
require_once('library/view.php');


$registry = new Registry();
$registry->set('request', new Request());
$registry->set('db', new mPDO(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT));
$registry->set('twig', new Twig_Environment(new Twig_Loader_Filesystem('view/tpl/'), array()));
$view = new View($registry);
$registry->set('view', $view);

$loader = new Loader($registry);
$loader->controller('router', '', array());
