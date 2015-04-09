<?php
//
// Created by Grégoire JONCOUR on 07/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
namespace Core;
/**
 * Class Autoloader
 * @package Tutoriel
 */
class Autoloader
{
    /**
     * Enregistrement de notre autoloader
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre class
     * @param $class_name
     */
    static function autoload($class_name)
    {
        if(strpos($class_name,__NAMESPACE__.'\\')===0)
        {
            $class_name = str_replace(__NAMESPACE__ . '\\', '', $class_name);
            $class_name = str_replace('\\', '/', $class_name);
            require __DIR__.'/' . $class_name . '.php';
        }
    }
}