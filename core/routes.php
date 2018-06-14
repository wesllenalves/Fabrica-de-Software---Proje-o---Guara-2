<?php
$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/index', 'HomeController@index'];
$routes[] = ['/login', 'HomeController@login'];
$routes[] = ['/login/verificar', 'HomeController@validarLogin'];
$routes[] = ['/cadastro/create', 'HomeController@cadastroCreat'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/cadastro/cliente', 'HomeController@cadastroCliente'];
$routes[] = ['/cadastro/orcamento', 'HomeController@cadastroOrcamento'];

//mapes
$routes[] = ['/dashboard', 'AdminController@index'];
/*Clientes*/
$routes[] = ['/clientes', 'AdminController@clientes'];
$routes[] = ['/clientes/visualizar', 'AdminController@clientesVisualizar'];
$routes[] = ['/clientes/editar', 'AdminController@clientesEditar'];
$routes[] = ['/clientes/editar/salvar', 'AdminController@clientesEditarSalvar'];
$routes[] = ['/clientes/adicionar', 'AdminController@clientesAdicionar'];
$routes[] = ['/clientes/remover', 'AdminController@clientesRemover'];
$routes[] = ['/clientes/adicionar/salvar', 'AdminController@clientesAdicionarSalvar'];
/*Produtos*/
$routes[] = ['/produtos', 'AdminController@produtos'];
$routes[] = ['/produtos/adicionar', 'AdminController@produtosAdicionar'];
$routes[] = ['/produtos/adicionar/salvar', 'AdminController@produtosSalvar'];
$routes[] = ['/produtos/visualizar', 'AdminController@produtosVisualizar'];
$routes[] = ['/produtos/editar', 'AdminController@produtosEditar'];
/*Serviços*/
$routes[] = ['/servicos', 'AdminController@servicos'];
$routes[] = ['/servicos/adicionar', 'AdminController@servicosAdicionar'];
$routes[] = ['/servicos/adicionar/salvar', 'AdminController@servicosSalvar'];
$routes[] = ['/servicos/adicionar/editar', 'AdminController@servicosEditar'];
$routes[] = ['/servicos/adicionar/update', 'AdminController@servicosUpdate'];
/*OS*/
$routes[] = ['/os', 'AdminController@os'];
$routes[] = ['/os/adicionar', 'AdminController@osAdicionar'];
/*Vendas*/
$routes[] = ['/vendas', 'AdminController@vendas'];
$routes[] = ['/vendas/adicionar', 'AdminController@vendasAdicionar'];




//Admin normal
//$routes[] = ['/dashboard', 'AdminController@index'];
//$routes[] = ['/dashboard/cadastro-produto', 'AdminController@cadastroProduto'];
//$routes[] = ['/dashboard/funcionario', 'AdminController@funcionario'];
//$routes[] = ['/dashboard/cadastro/funcionario', 'AdminController@cadastroFuncionario'];
//$routes[] = ['/dashboard/listar/clientes', 'AdminController@listarCliente'];
//$routes[] = ['/dashboard/alterar/cliente/{id}', 'AdminController@editarCliente'];
//$routes[] = ['/dashboard/update/cliente', 'AdminController@updateCliente'];
//$routes[] = ['/dashboard/delete/cliente/{id}', 'AdminController@deleteCliente'];

return $routes;

