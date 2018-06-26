<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;
use Core\BaseModel;
/**
 * Description of Os
 *
 * @author Wesllen
 */
class Os extends BaseModel{
    protected $tabela = "os";
     protected $tabelaUse = 1;
    
    public function cadastrar($request) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-m-d H:m:s");

        $array = array(
            "0" => array(
                'clientes_id' => $request->post->idClientes, 'usuarios_id' => $request->post->idUsuario,
            'status' => $request->post->status, 'dataInicial' => $request->post->dataInicial, 'dataFinal' => $request->post->dataFinal,
            'telefone' => $request->post->telefone,'quantidade' => $request->post->quantidade,
            'cidade' => $request->post->cidade,'produtos' => $request->post->produtos,
            'descricaoServico' => $request->post->descricaoServico,
            'dataCadastro' => $dataAtual
            )
        );
        
        if ($dados = $this->insert($array)) {
            return $dados;
        } else {
            return False;
        }
    }

    public function atualizar($request) {
        $id = $request->post->idClientes;
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");
        $array = array(
            'nomeCliente' => $request->post->nomeCliente, 'documento' => $request->post->documento,
            'pessoa' => $request->post->pessoa, 'telefone' => $request->post->telefone, 'ddd_celular' => $request->post->ddd_celular,
            'celular' => $request->post->celular, 'email' => $request->post->email, 'rua' => $request->post->rua, 'numero' => $request->post->numero,
            'bairro' => $request->post->bairro, 'cidade' => $request->post->cidade, 'estado' => $request->post->estado,
            'cep' => $request->post->cep, "dataUpdate" => $dataAtual
        );
        if ($this->update($array, "idClientes = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function atualizarOs($request) {
        $id = $request->post->idOs;
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-m-d H:m:s");
        $arrayOs = array(
            'status_pedido' => $request->post->status, 'dataInicial' => $request->post->dataInicial,
            'dataFinal' => $request->post->dataFinal, 'quantidade' => $request->post->quantidade,
            'descricaoServico' => $request->post->descricaoServico,  "dataUpdate" => $dataAtual,
            'usuarios_id' => $request->post->usuarios_id, 'clientes_id' => $request->post->clientes_id
        );
        
        $arrayCliente = array(
            'nomeCliente' => $request->post->nomeCliente, 
            'telefone' => $request->post->telefone, 'cidade' => $request->post->cidade
            
                );
        
        if ($this->update($arrayOs, "idOs = {$id}")) {
            $idClientes =$request->post->clientes_id;
            $this->tabela = 'clientes';
            if($this->update($arrayCliente, "idClientes = {$idClientes}")){
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    public function deletar($id) {

        if ($this->delete("idOS = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
