<?php
//
// Created by Grégoire JONCOUR on 07/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require dirname(__DIR__)."/app/App.php";
App::load();

if(isset($_GET['p']))
{
    $page = $_GET['p'];
}
else
{
    $page = 'home';
}

//Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if(!$auth->logged())
{
    $app->forbidden();
}

ob_start();
if($page === 'home')
{
    require ROOT . '/pages/admin/posts/index.php';
}
elseif ($page === 'posts.edit')
{
    require ROOT . '/pages/admin/posts/edit.php';
}
elseif ($page === 'posts.add')
{
    require ROOT . '/pages/admin/posts/add.php';
}
$content = ob_get_clean();
require ROOT.'/pages/template/default.php';