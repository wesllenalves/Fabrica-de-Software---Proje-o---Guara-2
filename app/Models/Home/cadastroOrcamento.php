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
class cadastroOrcamento extends BaseModel {

    protected $tabela = "os";
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1;

    public function cadastrar($request) {
        $values_array_0 = array_values($request->produto);
        $insert_values_0 = implode(" , ", $values_array_0);
        
        $array = array(
            "0" => array(
                "nome" => $request->nome, "status" => "Aberto", "dataInicial" => $request->data, "telefone" => $request->telefone,
                "quantidade" => $request->qtd,"cidade" => $request->cidade, "produtos" => $insert_values_0, "descricaoServico" => $request->descricao
                 
                
            )
        );        

        if ($this->insert($array)) {
            return TRUE;
        } else {
            return False;
        }
    }

}
