<?php
//
// Created by Grégoire JONCOUR on 07/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
use App\App;
use App\Table\Article;
?>
<?php $post = Article::find($_GET['id']);
if($post === false)
{
    App::notFound();
}
App::setTitle($post->titre);
?>
<h1><?= $post->titre; ?></h1>
<p><em><?= $post->categorie; ?></em></p>
<p><?= $post->contenu; ?></p>