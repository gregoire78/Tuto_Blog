<?php
//
// Created by Grégoire JONCOUR on 08/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
namespace App\Table;
use App\App;

class Categorie extends Table
{
    protected static $table = 'categories';

    public function getUrl()
    {
        return 'index.php?p=categorie&id='.$this->id;
    }
}