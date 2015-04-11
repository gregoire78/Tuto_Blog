<?php
//
// Created by Grégoire JONCOUR on 09/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//

namespace App\Table;

use Core\Table\Table;

/**
 * Class PostTable
 * @package App\Table
 */
class PostTable extends Table
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @return array
     */
    public function last()
    {
        return $this->query("
            SELECT articles.id,articles.titre,articles.contenu,categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            ORDER BY articles.date DESC
        ");
    }

    /**
     * recupère les derniers articles de la category demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id)
    {
        return $this->query("
            SELECT articles.id,articles.titre,articles.contenu,categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.categorie_id = ?
            ORDER BY articles.date DESC
        ", [$category_id]);
    }

    /**
     * recupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id)
    {
        return $this->query("
            SELECT articles.id,articles.titre,articles.contenu,categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.id = ?
        ", [$id], true);
    }
}