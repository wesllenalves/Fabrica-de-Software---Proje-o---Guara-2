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
    
    protected $tabela = "clientes";
    protected $tabela2 = "os";
    
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 2;
    protected $chaveEstrangeira = "clientes_id";

    public function cadastrar($request) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date("Y-m-d H:i:s");
        
        if(!empty ($request->post->documentoCpf)){
            $documento = $request->post->documentoCpf;
            $tipoPessoa = "PF";
        }elseif (!empty ($request->post->documentoCpnj)) {
            $documento = $request->post->documentoCpnj;
            $tipoPessoa = "PJ";
        }        
            
            
            
        $array = array(
            "0" => array(
                'nomeCliente' => $request->post->nome, 'documento' => $documento,
                'tipoPessoa' => $tipoPessoa, 'telefone' => $request->post->telefone,
                'celular' => $request->post->celular, 'cidade' => $request->post->cidade,
                'estado' => $request->post->estado, 'cep' => $request->post->cep, 'dataCadastro' => $dataAtual
            ),
            "1" => array(
                'status_pedido' => "Aberto", 'dataInicial' => $request->post->data,
                'descricaoServico' => $request->post->descricao, 'dataCadastro' => $dataAtual
            )
            );       
                
           
        if ($this->insert($array)) {
            return TRUE;
        } else {
            return False;
        }
    }
    

}
