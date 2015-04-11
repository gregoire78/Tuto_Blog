<?php
//
// Created by Grégoire JONCOUR on 11/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//

$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST))
{
    $result = $postTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'categorie_id' => $_POST['categorie_id']
    ]);
    if($result)
    {
        ?>
            <div class="alert alert-success">L'article a bien été ajouté</div>
        <?php
    }
}
$post = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');
$form = new \Core\HTML\BootstrapForm($post);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('categorie_id', 'Categorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>