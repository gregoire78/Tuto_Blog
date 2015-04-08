<?php
//
// Created by Grégoire JONCOUR on 08/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
use App\Table\Article;
use App\Table\Categorie;
use App\App;

$categorie = Categorie::find($_GET['id']);
if($categorie === false)
{
    App::notFound();
}
$article = Article::lastByCategorie($_GET['id']);
$categories = Categorie::all();
?>
<h1><?= $categorie->titre; ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($article as $post): ?>

            <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>
            <p><em><?= $post->categorie; ?></em></p>
            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach (\App\Table\Categorie::all() as $categorie): ?>
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>