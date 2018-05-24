<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of ListarClientes
 *
 * @author laboratorio
 */
class ListarClientes extends BaseModel{
    protected $tabela = "cliente";
    
    
    public function listar(){
        $lista = $this->read("*");
        return $lista;
    }
}
