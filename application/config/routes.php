<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Paginas';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'Paginas';
$route['Estabelecimento'] = 'Estabelecimento';
$route['Servico'] = 'Servico';

$route['servico/(:num)'] = 'Paginas/servico/$1';

//$route['listar'] = 'Livro/listar';     // Requer parámetros 9caso não tenha, carrega a home)
//$route['pesquisar'] = 'Livro/pesquisar';
//$route['livro/(:num)'] = 'Paginas/videoaula/$1'; 
//$route['livro'] = 'Livro';

$route['cadastro_users'] = 'Paginas/cadastro_users';
$route['cadastro'] = 'Estabelecimento/cadastro';
$route['cadastro_servico'] = 'Servico/cadastro_servico';
$route['form_servico/(:num)'] = 'Servico/form_servico/$1';

//para gerar o página post (que será alimentada pelo banco de dados)
//$route['controle_livros'] = 'Controle_livros';     // Requer parámetros 9caso não tenha, carrega a home)
//$route['controle_livros/(:num)'] = 'Paginas/postagem/$1';  // carrega a página com parâmetros

//carrega a página de login do sistema
$route['login'] = 'Setup';
$route['autentica_login'] = 'Setup/autentica_login';
$route['admin'] = 'Setup/admin';
$route['salva_user'] = 'Paginas/salva_user';