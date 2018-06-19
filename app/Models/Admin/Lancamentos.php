<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of Lancamentos
 *
 * @author Wesllen
 */
class Lancamentos extends BaseModel{
   protected $tabela = "lancamentos";
   protected $tabelaUse = 1;
   
   public function cadastrar($request) {      
        
        $array = array(
                    "0" => array(
            'descricao' => $request->post->descricao, 'valor' => $request->post->valor, 'data_vencimento' => $request->post->vencimento,
            'data_pagamento' => $request->post->recebimento, 'cliente_fornecedor' => $request->post->cliente, 'forma_pgto' => $request->post->formaPgto, 'tipo' => $request->post->tipo
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
        $id = $request->post->idLancamentos;
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");
        $array = array(
            'descricao' => $request->post->descricao, 'valor' => $request->post->valor, 'data_vencimento' => $request->post->vencimento,
            'data_pagamento' => $request->post->recebimento, 'forma_pgto' => $request->post->formaPgto, 'tipo' => $request->post->tipo, "dataModificado" => $dataAtual
        );
        
        if ($this->update($array, "idLancamentos = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deletar($id) {

        if ($this->delete("idLancamentos = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
