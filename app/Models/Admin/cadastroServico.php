<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of cadastroServico
 *
 * @author Wesllen
 */
class cadastroServico extends BaseModel{
    //definir os nomes da tabelas maximo de 4
    protected $tabela = "servicos";
    
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1; 
    
    
    public function cadastrar($request) {      
        
        $array = array(
                    "0" => array(
            'nome' => $request->post->nome, 'descricao' => $request->post->descricao, 'preco' => $request->post->preco
        )
            );
        
        if ($this->insert($array)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function ler(){
        $dados = $this->read("*");
        return $dados;
    }
    
    public function atualizar($request) {
        $id = $request->post->idServicos;
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");
        $array = array(
            'nome' => $request->post->nome, 'descricao' => $request->post->descricao, 'preco' => $request->post->preco, 'dataModificado' => $dataAtual
        );
        if ($this->update($array, "idServicos = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deletar($id) {

        if ($this->delete("idServicos = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
