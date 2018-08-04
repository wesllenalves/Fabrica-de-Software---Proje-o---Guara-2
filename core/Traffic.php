<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

use Core\DataBase;
use PDOException;
use PDO;

/**
 * Description of Traffic
 *
 * @author laboratorio
 */
class Traffic {

    private $ip;
    private $uri;
    private $data;
    private $user_agent;

    public function __construct() {
        $this->con = new DataBase();
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
        $this->user_agent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_DEFAULT);
        $cookie = filter_input(INPUT_COOKIE, md5($this->uri), FILTER_DEFAULT);
        $this->ip = '179.185.107.244'; //filter_input(INPUT_SERVER,'REMOTE_ADDR', FILTER_VALIDATE_IP);        
        if (!$cookie) {
            $this->set_cookie();
            $this->rec_data();
        }

        
    }

    private function set_cookie() {
        date_default_timezone_set('America/Sao_Paulo');
        setcookie(md5($this->uri), TRUE, time() + strtotime(date('Y-m-d 23:59:59')) - time());
    }

    private function rec_data() {
        header('Content-Type: application/json; charset=utf-8');
        $geo = json_decode(file_get_contents("http://ip-api.com/json/{$this->ip}"));


        $this->data['data'] = date("Y-m-d H:i:s");
        $this->data['pagina'] = $this->uri;
        $this->data['ip'] = $this->ip;
        $this->data['cidade'] = (isset($geo->city)) ? $geo->city : 'Desconhecida';
        $this->data['regiao'] = (isset($geo->region)) ? $geo->region : 'Desconhecida';
        $this->data['pais'] = (isset($geo->country)) ? $geo->country : 'Desconhecida';
        $this->data['navegador'] = $this->get_browser();
        $this->data['plataforma'] = $this->get_platform();
        $this->data['referencia'] = $this->get_reference();
        $this->gravar();
    }

    private function get_browser() {
        include_once __DIR__ . '/../core/plataformas/Browsers.php';
        foreach ($browsers as $key => $value) {

            if (preg_match('|' . $key . '.*?([0-9\.]+)|i', $this->user_agent)) {
                return $value;
            }
        }
    }

    private function get_platform() {
        include_once __DIR__ . '/../core/plataformas/Plataformas.php';
        foreach ($platforms as $key => $value) {

            if (preg_match('|' . preg_quote($key) . '|i', $this->user_agent)) {
                return $value;
            }
        }
    }

    private function get_reference() {
        $refere = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_VALIDATE_URL);
        $refere_host = parse_url($refere, PHP_URL_HOST);
        $host = filter_input(INPUT_SERVER, 'SERVE_NAME');
        if (!$refere) {
            $retorno = 'Acesso Direto';
        } elseif ($refere_host == $host) {
            $retorno = 'Navegação Interna';
        } else {
            $retorno = $refere;
        }
        return $retorno;
    }

    private function gravar() {

        try {

            $query = $this->con->conecta()->prepare("INSERT INTO trafego (data, pagina, ip, cidade, regiao, pais, "
                    . "navegador, referencia, plataforma)"
                    . " VALUES('{$this->data['data']}', '{$this->data['pagina']}', '{$this->data['ip']}', '{$this->data['cidade']}', '{$this->data['regiao']}', '{$this->data['pais']}', "
                    . "'{$this->data['navegador']}', '{$this->data['referencia']}', '{$this->data['plataforma']}');");                        
            if ($query->execute()) {                
                return TRUE;
            } else {
                print_r($query->errorInfo());
                return FALSE;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
}
    