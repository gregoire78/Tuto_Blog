<?php
//
// Created by Grégoire JONCOUR on 09/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=posts.category&id='.$this->id;
    }
}