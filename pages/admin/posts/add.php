<?php
//
// Created by Grégoire JONCOUR on 11/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//

$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST))
{
    $result = $postTable->create([
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'categorie_id' => $_POST['categorie_id']
    ]);
    if($result)
    {
        header('Location:admin.php?p=posts.edit&id='.App::getInstance()->getDb()->lastInsertId());
    }
}
$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');
$form = new \Core\HTML\BootstrapForm($_POST);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('categorie_id', 'Categorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>