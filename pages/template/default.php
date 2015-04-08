<?php
//
// Created by Grégoire JONCOUR on 07/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= \App\App::getTitle(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Project name</a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template" style="padding-top: 100px;">
        <?php echo $content; ?>
    </div>

</div><!-- /.container -->

</body>
</html>