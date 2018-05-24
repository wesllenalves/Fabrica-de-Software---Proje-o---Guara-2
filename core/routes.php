<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/index', 'HomeController@index'];
$routes[] = ['/login', 'HomeController@login'];
$routes[] = ['/login/verificar', 'HomeController@validarLogin'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/cadastro/create', 'HomeController@cadastroCreat'];
$routes[] = ['/cadastro/cliente', 'HomeController@cadastroCliente'];

$routes[] = ['/dashboard', 'AdminController@index'];
$routes[] = ['/dashboard/cadastro-produto', 'AdminController@cadastroProduto'];
$routes[] = ['/dashboard/funcionario', 'AdminController@funcionario'];
$routes[] = ['/dashboard/cadastro/funcionario', 'AdminController@cadastroFuncionario'];
$routes[] = ['/dashboard/listar/clientes', 'AdminController@listarCliente'];
$routes[] = ['/dashboard/alterar/cliente/{id}', 'AdminController@editarCliente'];

return $routes;

