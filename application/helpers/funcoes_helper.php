<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if(!function_exists('set_msg')):
//seta uma mensagem via session para ser lida posteriormente
function set_msg($msg=NULL){
	$ci = & get_instance();
	$ci->session->set_userdata('aviso', $msg);
}
endif;
if(!function_exists('get_msg')):
//retorna uma mensagem definida pela função set_msg
function get_msg($destroy=TRUE){
	$ci = & get_instance();
	$retorno = $ci->session->userdata('aviso');
	if($destroy) $ci->session->unset_userdata('aviso');
	return $retorno;

}
endif;
if(!function_exists('verifica_login')):
	//verifica se o usuário está logado, caso negativa redireciona
	function verifica_login($redirect='login'){
		$ci = & get_instance();
		if(	$ci->session->userdata('logged') != TRUE):
			set_msg('<p>Acesso restrito! Faça login para continuar.</p>');
			redirect($redirect, 'reflesh');
		endif;
	

	}
endif;

if(!function_exists('config_upload')):
	//define as configurações para upload de imagens/arquivos
	function config_upload($path='./uploads/logos/', $types='jpg|png', $size=1024){
		$config['upload_path']= $path;
		$config['allowed_types'] = $types;
		$config['max_size'] = $size;
		return $config;
	}
endif;
if(!function_exists('config_upload_serv')):
	//define as configurações para upload de imagens/arquivos
	function config_upload_serv($path='./uploads/servicos/', $types='jpg|png', $size=1024){
		$config['upload_path']= $path;
		$config['allowed_types'] = $types;
		$config['max_size'] = $size;
		return $config;
	}
endif;

if(!function_exists('to_bd')):
	//codifica o html para salvar no banco de dados
	function to_bd($string=NULL){
		return htmlentities($string);
	}
endif;

if(!function_exists('to_html')):
	//decodifica o html e remove barras invertidas do conteúdo
	function to_html($string=NULL){
		return html_entity_decode($string);
	}
endif;


if(!function_exists('resumo_post')):
	//gera um texto parcial a partir do conteúdo de um post
	function resumo_post($string=NULL, $tamanho=100){ //parâmetros: recebe  uma string e tamanho
		$string = to_html(($string)); // reverte o texto do bd para html
		$string = strip_tags($string); //remove as tags html(func. nativa do php)
		$string = substr($string, 0,$tamanho); // gera o resumo no número de caracteres determinado($tamanho) (func. nativa do php)
		return $string;
	}

endif;