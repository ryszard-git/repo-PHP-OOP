<?php
declare (strict_types = 1);

session_start();

$_SESSION['pageTitle'] = '';
$_SESSION['pageContent'] = '';
$_SESSION['menuContent'] = '';
$_SESSION['footerContent'] = '';
$_SESSION['headerContent'] = '';
$_SESSION['messageContent'] = '';

require_once 'Controller/Controller.php';
require_once 'Model/DBConnection.php';
require_once 'Model/DBQueries.php';
require_once 'View/View.php';
require_once 'View/Menu.php';
require_once 'View/Footer.php';
require_once 'View/Header.php';
require_once 'View/Content.php';
require_once 'View/FetchFromQuery.php';
require_once 'View/Forms.php';
require_once 'View/Messages.php';

use test_objects\Controller\Controller;

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case "":
    case "mainPage":
        Controller::launchMainPage();
        break;

    case "addData":
        Controller::launchAddData();
        break;
    
    case "submitData":
        Controller::submitFormData();
        break;
    
    case "viewData":
        Controller::launchViewData();
        break;
    
    default :
        Controller::launch404Message();
}
