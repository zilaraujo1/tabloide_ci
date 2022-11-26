<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller{

    function __construct(){
        parent::__construct();
        //imports
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('servicos_model', 'serv');
        $this->load->model('usuarios_model', 'user');
        $this->load->model('estabelecimentos_model', 'estab');
    }

    public function index(){

        $estab_fk = $this->uri->segment(2); 
        $data['dono'] = $this->estab->get_single($estab_fk);
        $data['titulo'] = "Cadastro de serviços";
        $this->load->view('form_servico', $data);
    }
    public function listar(){
        //verifica se o usuário está logado
        verifica_login();

        //carrega a view
        $dados['titulo'] = 'BNTH - Listagem de livros';
        $dados['h2'] = 'Listagem e edição de livros cadastrados';

        $dados['tela'] = 'listar'; //para carregar qual o tipo da view
        $dados['livros'] = $this->livro->get();
        $this->load->view('painel/livros', $dados);
    }
    public function form_servico(){
        $estab_fk = $this->uri->segment(2); 
        $data['dono'] = $this->estab->get_single($estab_fk);
        $data['titulo'] = "Cadastro de serviços";
        $this->load->view('form_servico', $dados);
    }
    public function cadastro_servico(){
        //verifica se o usuário está logado
       // verifica_login();

        //regras de validação
        $this->form_validation->set_rules('tipo', 'Tipo', 'trim|required');
        $this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
        $this->form_validation->set_rules('valor', 'Valor', 'trim|required');
        $this->form_validation->set_rules('horario_func', 'Horario_func', 'trim|required');
       // $this->form_validation->set_rules('foto', 'Foto', 'trim|required');
        
     
        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $this->load->library('upload', config_upload_serv());
           
            if($this->upload->do_upload('foto')):
                //upload foi efetuado
                $dados_upload = $this->upload->data();
            
            
                $dados_form = $this->input->post();

                $dados_insert['tipo'] = to_bd($dados_form['tipo']);
                $dados_insert['descricao'] = to_bd($dados_form['descricao']);
                $dados_insert['valor'] = to_bd($dados_form['valor']);
                $dados_insert['horario_func'] = to_bd($dados_form['horario_func']);
                $dados_insert['foto'] = to_bd($dados_form['foto']);
                $dados_insert['estab_fk'] = to_bd($dados_form['estab_fk']);
                
                
                
                
                $dados_insert['foto'] = $dados_upload['file_name'];
             
                var_dump($dados_insert);
               //salvar no banco de dados
               if($id = $this->serv->salvar($dados_insert)):
                    set_msg('<p>Dados cadastrado com sucesso!</p>');
                    $estab_fk = $this->uri->segment(2); 
                    $data['dono'] = $this->estab->get_single($estab_fk);
                     $data['titulo'] = "Cadastro de serviços";
                    redirect('Paginas/home', $data, 'refresh');
               else:
                    set_msg('<p> Erro! Dados não cadastrado.</p>');
               endif;

            else:
                //erro no upload
                $msg = $this->upload->display_errors();
                $msg .= '<p>São permitidas arquivos JPG e PNG de até 512KB.</p>';
                set_msg($msg);
            endif;
        endif;



        //carrega a view

        
         $data['dono'] = $this->estab->get();
        // $data['titulo'] = "Cadastro de serviços";
         $this->load->view('home', $data);
    
    }
    public function excluir(){
        //verfica se o usuário está logado
        verifica_login();

        //verifica se foi passado o id do post
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar com a exclusão
            if($postagem = $this->livro->get_single($id)): // método do model
                $dados['livros'] = $postagem;
            else:
                set_msg('<p>Livro inexistente! Escolha um  para excluir</p>');
                redirect('video/listar', 'refresh');
            endif;
        else:
            set_msg('<p>Você deve escolher um vídeo para excluir</P>');
            redirect('livro/listar', 'refresh');
        endif;

        //regras de validação
        $this->form_validation->set_rules('enviar', 'ENVIAR', 'trim|required');

        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $imagem = 'uploads/'.$postagem->imagem; // concactenado com a imagem vinda do banco de dados
            if($this->livro->excluir($id)): //excluido no bd
                unlink($imagem); // deletar a imagem na pasta
                set_msg('<p>Dados excluídos com sucesso!</p>');
                redirect('livro/listar', 'refresh');
            else:
                set_msg('<p>Erro! Dados não excluídos!</p>');
            endif;
        endif;


        //carrega a view

        $dados['titulo'] = 'BNTH - Exclusão de vídeos';
        $dados['h2'] = 'Exclusão de vídeos';
        $dados['tela'] = 'excluir'; //para carregar qual o tipo da view
        $this->load->view('painel/livros', $dados);

    }
    public function editar(){
        //verfica se o usuário está logado
        verifica_login();

        //verifica se foi passado o id do post
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar com a edição
            if($postagem = $this->livro->get_single($id)): // método da model
                $dados['livros'] = $postagem;
                $dados_update['id'] = $postagem->id;
            else:
                set_msg('<p>Vídeo inexistente! Escolha um vídeo para editar.</p>');
                redirect('livro/listar', 'refresh');
            endif;
        else:
            set_msg('<p>Você deve escolher um post para editar!</P>');
            redirect('livro/listar', 'refresh');
        endif;

        //regras de validação
        $this->form_validation->set_rules('titulo', 'Título', 'trim|required');
        $this->form_validation->set_rules('autor', 'Autor', 'trim|required');
        $this->form_validation->set_rules('editora', 'Editora', 'trim|required');
        $this->form_validation->set_rules('genero', 'Genero', 'trim|required');
        $this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
        $this->form_validation->set_rules('unidade', 'unidade', 'trim|required');
     

        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            //para edição de imagem (alterar)
            $this->load->library('upload', config_upload());
            if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != ''):
                //foi enviada uma imagem,devo fazer o upload
                if($this->upload->do_upload('imagem')):
                    //upload foi efetuado
                    $imagem_antiga = 'uploads/'.$postagem->imagem;
                    $dados_upload = $this->upload->data();
                    $dados_form = $this->input->post();
                    $dados_update['titulo'] = to_bd($dados_form['titulo']);
                    $dados_update['autor'] = to_bd($dados_form['autor']);
                    $dados_update['editora'] = to_bd($dados_form['editora']);
                    $dados_update['genero'] = to_bd($dados_form['genero']);
                    $dados_update['descricao'] = to_bd($dados_form['descricao']);
                    $dados_update['unidade'] = to_bd($dados_form['unidade']);
                    
                    $dados_update['imagem'] = $dados_upload['file_name'];

                    if($this->livro->salvar($dados_update)): //atualiza no bd
                        unlink($imagem_antiga); //deleta a imagem anterior
                        set_msg('<p>Dados alterados com sucesso!</p>');
                        $dados['videos']->imagem = $dados_update['imagem'];
                    else:
                        set_msg('<p>Erro! Nenhuma alteração foi salva.</p>');
                    endif;
                else:
                    //erro no upload
                    $msg = $this->upload->display_errors();
                    $msg .= '<p>São permitidas arquivos JPG e PNG de até 512KB.</p>';
                    set_msg($msg);
                endif;
            else:
                //não foi enviada uma imagem pelo form
                $dados_form = $this->input->post();
                $dados_update['titulo'] = to_bd($dados_form['titulo']);
                $dados_update['autor'] = to_bd($dados_form['autor']);
                $dados_update['editora'] = to_bd($dados_form['editora']);
                $dados_update['genero'] = to_bd($dados_form['genero']);
                $dados_update['descricao'] = to_bd($dados_form['descricao']);
                $dados_update['unidade'] = to_bd($dados_form['unidade']);
            
                
                if($this->livro->salvar($dados_update)):
                    set_msg('<p>Dados alterados com sucesso!</p>');
                else:
                    set_msg('<p>Erro! Nenhuma alteração foi salva.</p>');
                endif;
            endif;

        endif;


        //carrega a view

        $dados['titulo'] = 'BNTH - Alteração de vídeos';
        $dados['h2'] = 'Alteração de vídeos';
        $dados['tela'] = 'editar'; //para carregar qual o tipo da view
        $this->load->view('painel/livros', $dados);

    }
    
}