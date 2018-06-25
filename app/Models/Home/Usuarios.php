<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Home;
use Core\BaseModel;
use Core\Session;
use Core\Validator;
/**
 * Description of Usuarios
 *
 * @author Wesllen
 */
class Usuarios extends BaseModel{
    protected $tabela = "usuarios";
    
    public function validar($request){
        $data = [
            'user' => $request->post->usuario,
            'password' => $request->post->password
            ];

        $rules = [
            'user' => 'required', 'password' => 'required'
        ];
        
      if (Validator::make($data, $rules)) {
          return TRUE;
      }  
    }

        public function verificarlogin($dados){
        $dados->password = md5($dados->password);
        
        $usuario = $this->read("*", "BINARY user = '{$dados->usuario}' and password = '{$dados->password}'");
        if (count($usuario) > 0) {
            
            $data = Session::getInstance();
            $data->autenticado = TRUE;
            $data->login = $usuario[0]->login;
            $data->nivel = $usuario[0]->nivel;
            $data->id = $usuario[0]->idusuario;         

            return TRUE;
        }

        return FALSE;
    }
    
}
