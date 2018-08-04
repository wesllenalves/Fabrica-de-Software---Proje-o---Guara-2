<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

use PDO;
use PDOException;

/**
 * Description of DataBase
 *
 * @author Wesllen
 */
class DataBase {

    private $usuario;
    private $senha;
    private $servidor;
    private $dbName;    
    private static $pdo;

    //'HTTP_CLIENT_IP'
    //'REMOTE_ADOR'

//    

    public function conecta() {

        $conf = require_once __DIR__ . '/../app/Config/config.php';
        $dbname = $conf['database'];
        $host = $conf['host'];
        $username = $conf['username'];
        $password = $conf['password'];
        $charset = $conf['charset'];

        $this->usuario = $username;
        $this->servidor = $host;
        $this->dbName = $dbname;
        $this->senha = $password;
        $this->charset = $charset;



        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO("mysql:host=$this->servidor;dbname=$this->dbName", "$this->usuario", "$this->senha", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            return self::$pdo;
        } catch (PDOException $ex) {
            die("Erro: <code>" . $ex->getMessage() . "</code>");
        }
    }

}
