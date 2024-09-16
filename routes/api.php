<?php

require_once '../Controllers/GetDataTreeController.php';

$controller = new TreeController();
if ($_SERVER['REQUEST_URI'] == '/menu') {
    $controller->getTreeData();
}