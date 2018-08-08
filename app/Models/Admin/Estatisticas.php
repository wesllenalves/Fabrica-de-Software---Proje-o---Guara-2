<?php

namespace App\Models\Admin;

use Core\BaseModel;

/**
 * Description of Estatisticas
 *
 * @author laboratorio
 */
class Estatisticas extends BaseModel {

    protected $tabela = "lancamentos";
    private $data_atual;

    public function Receita($periodo = Null) {
//        SET GLOBAL lc_time_names=pt_BR;
//        date_default_timezone_set('America/Sao_Paulo');
//        $this->data_atual = date("Y-m-d H:i:s");
//        ($periodo == null) ? '' : $intervalo = date('Y-m-d H:i:s', strtotime($periodo, strtotime($this->data_atual)));
//        ($intervalo == '') ? '' : $intervaloResult = "AND dataCreate >= '{$intervalo}'";
//        
//        
//        
//        
//        $resultados = $this->estatistica('valor, tipo, 	MONTHNAME(dataCreate) as mes', "tipo = 'Receita' AND status = 'pago' {$intervaloResult}" );
//
//        foreach ($resultados as $result){            
//            $dados['mes'] = $result->mes;
//            $dados['valor'] = $result->valor;
//
//            
//        }
        if ($periodo == NULL) {
            $resultado = $this->estatistica("tipo, MONTHNAME(data_pagamento) as mes, extract(month from data_pagamento) as mes_num, sum(valor) as valor_total", "tipo='Receita'", "GROUP BY extract(month from data_pagamento)"); 
        }
        
        $dados = [];
        foreach ($resultado as $result ){
            
            $dados[$result->mes] = $result->valor_total;
            
        }
        
        
        echo json_encode($dados);
    }
    
    

    public function Despesa($periodo = Null) {

        if ($periodo == NULL) {
            $resultado = $this->estatistica("tipo, MONTHNAME(data_pagamento) as mes, extract(month from data_pagamento) as mes_num, sum(valor) as valor_total", "tipo='Despesa'", "GROUP BY extract(month from data_pagamento)"); 
        }
        
        session_start();
        $user = ["tipo" => "erro", "mensagem" => "Erro no login"];
        $_SESSION['user'] = $user;
        
        //print_r($_SESSION['user']);
        echo json_encode($_SESSION['user']);
       //echo json_encode($resultado);
        
    }

}
