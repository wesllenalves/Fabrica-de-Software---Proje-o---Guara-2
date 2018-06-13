<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Home;
use Core\BaseModel;
/**
 * Description of cadastroOrçamento
 *
 * @author Wesllen
 */
class cadastroOrcamento extends BaseModel{
    protected $tabela = "orcamento";
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1;
    
    
    protected function CheckIsNull($request) {
        
        if ( $request->nome === '' ||  $request->telefone === '' ||  
             $request->cidade === '' ||  $request->produto === '' || $request->qtd === '' || 
             $request->data === '' 
                ) {
            return TRUE;
        }
        return FALSE;
    }
    
     public function cadastrar($request){    
         
        
        if($this->CheckIsNull($request) != TRUE){            
           
        
                $array = array(
                    "0" => array(
                        "nome" => $request->nome,  "telefone" => $request->telefone ,  
              "cidade" => $request->cidade ,   "fkProduto" => $request->produto ,  "qtd" => $request->qtd  , 
              "data" => $request->data 
                    )
                );

                if($this->insert($array)){
                    return TRUE;
                }else{
                    return False;
                }
           
        }else{
            $this->redirect("clientes", "4", "Preencha todos os campos");
            exit();
        }
    }
}
