<?php
//
// Created by Grégoire JONCOUR on 09/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//

namespace Core;


/**
 * Class Config
 * @package App
 */
class Config
{
    /**
     * @var array|mixed
     */
    private $settings = [];
    /**
     * @var
     */
    private static $_instance;

    /**
     * @return Config
     */
    public static function getInstance($file)
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    /**
     *
     */
    public function __construct($file)
    {
        $this->settings = require($file);
    }

    public function get($key)
    {
        if(!isset($this->settings[$key]))
        {
            return null;
        }
        return $this->settings[$key];
    }
}