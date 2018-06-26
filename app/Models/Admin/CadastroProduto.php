<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Admin;

use Core\BaseModel;

/**
 * Description of Cadastro
 *
 * @author laboratorio
 */
class CadastroProduto extends BaseModel {
    //definir os nomes da tabelas maximo de 4
    protected $tabela = "produto";
    
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 1; 
    
    
    public function cadastrar($request) {      
        
        $array = array(
                    "0" => array(
            'nome_produto' => $request->post->descricao, 'unidade' => $request->post->unidade, 'precoCompra' => $request->post->precoCompra, 
            'precoVenda' => $request->post->precoVenda, 'estoque' => $request->post->estoque,
            'estoqueMinimo' => $request->post->estoqueMinimo, 'validade' => $request->post->validade
        )
            );
        
        if ($dados = $this->insert($array)) {
            print_r($dados); die();
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
        $id = $request->post->idProdutos;
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-d-m H:m:s");
        $array = array(
            'nome_produto' => $request->post->nome_produto, 'unidade' => $request->post->unidade, 'precoCompra' => $request->post->precoCompra,
            'precoVenda' => $request->post->precoVenda, 'estoque' => $request->post->estoque,
            'estoqueMinimo' => $request->post->estoqueMinimo, 'validade' => $request->post->validade, "dataModificado" => $dataAtual
        );
        
        if ($this->update($array, "idProduto = {$id}")) {
           
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function deletar($id) {        
        if ($this->delete("idProduto = {$id}")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
