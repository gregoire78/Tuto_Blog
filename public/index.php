<?php
//
// Created by Grégoire JONCOUR on 07/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
require '../app/Autoloader.php';
\App\Autoloader::register();

if(isset($_GET['p']))
{
    $p = $_GET['p'];
}
else
{
    $p = 'home';
}


ob_start();
if($p === 'home')
{
    require '../pages/home.php';
}
elseif ($p === 'article')
{
    require '../pages/single.php';
}
elseif ($p === 'categorie')
{
    require '../pages/categorie.php';
}
$content = ob_get_clean();
require '../pages/template/default.php';