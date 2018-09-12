<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;
use Core\Session_low;

/**
 * Description of Auth
 *
 * @author laboratorio
 */
class Auth {
    private static $id = null;
    private static $name = null;
    private static $email = null;
    
    
    public function __construct()
    {
        if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        if(Session_low::get('user')){
            $user = Session_low::get('user');
            
            
            self::$id = $user['id'];
            self::$name = $user['name'];            
        }
    }
    public static function id()
    {
        return self::$id;
    }
    public static function name()
    {
        return self::$name;
    }
    public static function email()
    {
        return self::$email;
    }
    public static function check()
    {
        if(self::$id == null || self::$name == null)
            return false;
        return true;
    }
}
