<?php
//
// Created by Grégoire JONCOUR on 10/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//

$posts = App::getInstance()->getTable('Post')->all();
?>
<h1>Administrer les articles</h1>

<p>
    <a href="?p=posts.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->id; ?></td>
                <td><?= $post->titre; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=posts.edit&id=<?= $post->id; ?>">Editer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>