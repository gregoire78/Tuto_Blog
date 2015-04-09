<?php
//
// Created by Grégoire JONCOUR on 07/04/2015.
// Copyright (c) 2015 Grégoire JONCOUR. All rights reserved.
//
namespace Core\Database;
use \PDO;
class MysqlDatabase extends Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
        $this->db_user = $db_user;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if($this->pdo === null)
        {
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class_name=null, $one = false)
    {
        $req = $this->getPDO()->query($statement);
        if($class_name === null)
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        else
        {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one)
        {
            $data = $req->fetch();
        }
        else
        {
            $data = $req->fetchAll();
        }
        return $data;
    }

    public function prepare($statement, $attributes, $class_name, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one)
        {
            $data = $req->fetch();
        }
        else
        {
            $data = $req->fetchAll();
        }
        return $data;
    }
}