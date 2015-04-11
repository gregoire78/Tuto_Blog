<?php
//
// Created by Grégoire JONCOUR on 07/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
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

ob_start();
if($page === 'home')
{
    require ROOT . '/pages/posts/home.php';
}
elseif ($page === 'posts.category')
{
    require ROOT . '/pages/posts/category.php';
}
elseif ($page === 'posts.show')
{
    require ROOT . '/pages/posts/show.php';
}
elseif ($page === 'login')
{
    require ROOT . '/pages/users/login.php';
}
$content = ob_get_clean();
require ROOT.'/pages/template/default.php';