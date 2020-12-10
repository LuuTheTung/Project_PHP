<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
require_once('connection.php');
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $controller = 'Base';
        $action = 'home';
    }
} else {
    $controller = 'Base';
    $action = 'home';
}
if ($controller != 'Base' && $controller != 'Authentication') {
    if ($_SESSION['login'] == '') {
        $controller = 'Authentication';
        $action = 'onClickSignInButton';
    }
}
require_once('routes.php');
?>