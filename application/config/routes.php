<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Paginas';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'Paginas';
$route['Estabelecimento'] = 'Estabelecimento';

$route['servico/(:num)'] = 'Paginas/servico';

//$route['listar'] = 'Livro/listar';     // Requer parámetros 9caso não tenha, carrega a home)
//$route['pesquisar'] = 'Livro/pesquisar';
//$route['livro/(:num)'] = 'Paginas/videoaula/$1'; 
//$route['livro'] = 'Livro';

//$route['cadastro_users'] = 'Paginas/cadastro_users';
$route['cadastro'] = 'Estabelecimento/cadastro';

//para gerar o página post (que será alimentada pelo banco de dados)
//$route['controle_livros'] = 'Controle_livros';     // Requer parámetros 9caso não tenha, carrega a home)
//$route['controle_livros/(:num)'] = 'Paginas/postagem/$1';  // carrega a página com parâmetros

//carrega a página de login do sistema
$route['login'] = 'Setup';
$route['autentica_login'] = 'Setup/autentica_login';
$route['admin'] = 'Setup/admin';
//$route['painel'] = 'Setup/login';