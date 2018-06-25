<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of Servicos_os
 *
 * @author Wesllen
 */
class Servicos_os extends BaseModel{
     protected $tabela = "servicos_os";
     protected $tabelaUse = 1;
     
      public function cadastrar(array $result) {
         
        $array = array(
             "0" => array(
            'os_id' => $result['os_id'] , 'servicos_id' => $result['servicos_id'], 'subTotal' => $result['subTotal'],
            'DataCadastro' => $result['DataCadastro']
        ));

        if ($dados = $this->insert($array)) {
            return $dados;
        } else {
            return False;
        }
    }
    
    public function deletar($id) {       
        if ($this->delete("idServicos_os = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
