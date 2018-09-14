<?php
$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/index', 'HomeController@index'];
$routes[] = ['/login', 'HomeController@login'];
$routes[] = ['/login/verificar', 'HomeController@validarLogin'];
$routes[] = ['/cadastro/create', 'HomeController@cadastroCreat'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/cadastro/cliente', 'HomeController@cadastroCliente'];
$routes[] = ['/cadastro/orcamento', 'HomeController@cadastroOrcamento'];
$routes[] = ['/JSON/session', 'HomeController@sessao'];

//mapes
$routes[] = ['/dashboard', 'AdminController@index', 'auth'];
/*Clientes*/
$routes[] = ['/clientes', 'AdminController@clientes', 'auth'];
$routes[] = ['/clientes/visualizar', 'AdminController@clientesVisualizar', 'auth'];
$routes[] = ['/clientes/editar', 'AdminController@clientesEditar', 'auth'];
$routes[] = ['/clientes/editar/salvar', 'AdminController@clientesEditarSalvar', 'auth'];
$routes[] = ['/clientes/adicionar', 'AdminController@clientesAdicionar', 'auth'];
$routes[] = ['/clientes/remover', 'AdminController@clientesRemover', 'auth'];
$routes[] = ['/clientes/adicionar/salvar', 'AdminController@clientesAdicionarSalvar', 'auth'];
/*Produtos*/
$routes[] = ['/produtos', 'AdminController@produtos', 'auth'];
$routes[] = ['/produtos/adicionar', 'AdminController@produtosAdicionar', 'auth'];
$routes[] = ['/produtos/adicionar/salvar', 'AdminController@produtosSalvar', 'auth'];
$routes[] = ['/produtos/visualizar', 'AdminController@produtosVisualizar', 'auth'];
$routes[] = ['/produtos/editar', 'AdminController@produtosEditar', 'auth'];
$routes[] = ['/produtos/editar/salvar', 'AdminController@produtosEditarSalvar', 'auth'];
$routes[] = ['/produtos/remover', 'AdminController@produtosRemover', 'auth'];
/*Serviços*/
$routes[] = ['/servicos', 'AdminController@servicos', 'auth'];
$routes[] = ['/servicos/adicionar', 'AdminController@servicosAdicionar', 'auth'];
$routes[] = ['/servicos/Remover', 'AdminController@servicosRemover', 'auth'];
$routes[] = ['/servicos/adicionar/salvar', 'AdminController@servicosSalvar', 'auth'];
$routes[] = ['/servicos/adicionar/editar', 'AdminController@servicosEditar', 'auth'];
$routes[] = ['/servicos/adicionar/update', 'AdminController@servicosUpdate', 'auth'];
/*OS*/
$routes[] = ['/os', 'AdminController@os', 'auth'];
$routes[] = ['/os/adicionar', 'AdminController@osAdicionar', 'auth'];
$routes[] = ['/os/adicionar/salvar', 'AdminController@osAdicionarSalvar', 'auth'];
$routes[] = ['/os/visualizar', 'AdminController@osVisualizar', 'auth'];
$routes[] = ['/os/editar', 'AdminController@osEditar', 'auth'];
$routes[] = ['/os/remover', 'AdminController@osRemover', 'auth'];
$routes[] = ['/os/oRemoverProduto', 'AdminController@osRemoverProduto', 'auth'];
$routes[] = ['/os/oRemoverServico', 'AdminController@osRemoverServico', 'auth'];
$routes[] = ['/os/salvarOsProduto', 'AdminController@salvarOsProduto', 'auth'];
$routes[] = ['/os/salvarOsServico', 'AdminController@salvarOsServico', 'auth'];
$routes[] = ['/os/update/salvar', 'AdminController@updateSalvarOs', 'auth'];
/*Vendas*/
$routes[] = ['/vendas', 'AdminController@vendas', 'auth'];
$routes[] = ['/vendas/adicionar', 'AdminController@vendasAdicionar', 'auth'];
/*Finaceiro*/
$routes[] = ['/financeiro/lancamentos', 'AdminController@financeiroLancamentos', 'auth'];
$routes[] = ['/financeiro/lancamentos/adicionarReceita', 'AdminController@adicionarReceita', 'auth'];
$routes[] = ['/financeiro/lancamentos/adicionarDespesa', 'AdminController@adicionarDespesa', 'auth'];
$routes[] = ['/financeiro/lancamentos/remover', 'AdminController@lacamentosRemover', 'auth'];
$routes[] = ['/financeiro/lancamentos/editar', 'AdminController@financeiroLancamentosEditar', 'auth'];
$routes[] = ['/financeiro/lancamentos/editar/salvar', 'AdminController@financeiroLancamentosEditarSalvar', 'auth'];
/*Certificado*/
$routes[] = ['/certificados', 'AdminController@certificado'];
$routes[] = ['/certificado/cadastro', 'AdminController@cadastroView'];
$routes[] = ['/certificado/gerar', 'AdminController@gerarPDF'];
$routes[] = ['/certificado/editar', 'AdminController@editarCertificado'];
$routes[] = ['/certificado/atualizar', 'AdminController@atualizarCertificado'];
$routes[] = ['/certificado/cadastrar', 'AdminController@cadastrarCertificado'];

return $routes;

