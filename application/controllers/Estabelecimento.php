<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estabelecimento extends CI_Controller{

    function __construct(){
        parent::__construct();
        //imports
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('estabelecimentos_model', 'estab');
        $this->load->model('imagens_model', 'fotos');
      //  $this->load->model('clivros_model', 'post');
    }

    public function index(){
        redirect('Estabelecimento/listar', 'refresh');
    }
    public function listar(){
        //verifica se o usuário está logado
        verifica_login();

        //carrega a view
        $dados['titulo'] = 'BNTH - controle de livros';
        $dados['h2'] = 'Controle de livros emprestados';
        $dados['tela'] = 'listar'; //para carregar qual o tipo da view
        $dados['posts'] = $this->post->get();
        $this->load->view('painel/controle_livros', $dados);
    }
    public function cadastro(){
        //verifica se o usuário está logado
        //verifica_login();
        echo "cadastrado";
        //regras de validação
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('endereco', 'Endereco', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
        $this->form_validation->set_rules('hora_func', 'Hora_func', 'trim|required');
        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required');
        
      
        
        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            
            $arquivos_permitidos = ['jpg','jpeg','png'];
            $arquivos = $_FILES['upload_fotos'];
            $nomes = $arquivos['name'];

            $dados_user = $this->input->post('user_fk');
            for($i=0; $i < count($nomes); $i++):
                $extensao = explode('.', $nomes[$i]);
                $extensao = end($extensao);
                $nomes[$i] = rand().'-'.$nomes[$i];
                if(in_array($extensao, $arquivos_permitidos)):
                    $query = $this->db->query("insert into imagens (upload_fotos, estab_fk) values('$nomes[$i]','$dados_user')");
                   $mover = move_uploaded_file($_FILES['upload_fotos']['tmp_name'][$i], './uploads/logos/'.$nomes[$i]);
                endif;
            endfor;

 //--------------------------------------------------------------------------------------
        $arquivos = $_FILES['foto'];
        $logo = $arquivos['name'];

        $extensao = explode('.', $logo);
        $extensao = end($extensao);
        $logo = rand().'-'.$logo;
        
        if(in_array($extensao, $arquivos_permitidos)):
         $mover = move_uploaded_file($_FILES['foto']['tmp_name'], './uploads/logos/'.$logo);
    
//-----------------------------------------------------------------------------
   
            $this->load->library('upload', config_upload());
            
                //upload foi efetuado
                $this->upload->do_upload('foto');
                $dados_upload = $this->upload->data();
                $dados_form = $this->input->post();
          


               // var_dump($dados_upload);
               $dados_insert['nome'] = to_bd($dados_form['nome']);
               $dados_insert['endereco'] = to_bd($dados_form['endereco']);
               $dados_insert['telefone'] = to_bd($dados_form['telefone']);
               $dados_insert['hora_func'] = to_bd($dados_form['hora_func']);
               $dados_insert['descricao'] = to_bd($dados_form['descricao']);
               $dados_insert['user_fk'] = to_bd($dados_form['user_fk']);
              
               $dados_insert['foto'] = $logo;
             
              
               //salvar no banco de dados
               if($id = $this->estab->salvar($dados_insert)):
                    set_msg('<p>Cadastrado realizado com sucesso!</p>');
                    $data['dono'] = $this->estab->get();
                    redirect('admin', 'refresh', $data);
               else:
                    set_msg('<p> Erro! Post não foi cadastrado.</p>');
               endif;

            
                //erro no upload
                $msg = $this->upload->display_errors();
                $msg .= '<p>São permitidas arquivos JPG e PNG de até 512KB.</p>';
                set_msg($msg);
            endif;
        

        endif;

        //carrega a view

        $dados['titulo'] = 'Cadastro da empresa';
    
        $this->load->view('admin', $dados);
        
    
    }
    public function excluir(){
        //verfica se o usuário está logado
        verifica_login();

        //verifica se foi passado o id do post
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar com a exclusão
            if($postagem = $this->post->get_single($id)):
                $dados['posts'] = $postagem;
            else:
                set_msg('<p>Post inexistente! Escolha um post para excluir</p>');
                redirect('post/listar', 'refresh');
            endif;
        else:
            set_msg('<p>Você deve escolher um post para excluir</P>');
            redirect('post/listar', 'refresh');
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
            if($this->post->excluir($id)):
                unlink($imagem); // deletar a imagem na pasta
                set_msg('<p>Post excluído com sucesso!</p>');
                redirect('controle_livros/listar', 'refresh');
            else:
                set_msg('<p>Erro! Post não excluído!</p>');
            endif;
        endif;


        //carrega a view

        $dados['titulo'] = 'BNTH - Exclusão de posts';
        $dados['h2'] = 'Exclusão de posts';
        $dados['tela'] = 'excluir'; //para carregar qual o tipo da view
        $this->load->view('painel/controle_livros', $dados);

    }
    public function editar(){
        //verfica se o usuário está logado
        verifica_login();

        //verifica se foi passado o id do post
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar com a edição
            if($postagem = $this->post->get_single($id)):
                $dados['posts'] = $postagem;
                $dados_update['id'] = $postagem->id;
            else:
                set_msg('<p>Post inexistente! Escolha um post para editar.</p>');
                redirect('post/listar', 'refresh');
            endif;
        else:
            set_msg('<p>Você deve escolher um post para editar!</P>');
            redirect('post/listar', 'refresh');
        endif;

        //regras de validação
        $this->form_validation->set_rules('titulo', 'Título', 'trim|required');
        $this->form_validation->set_rules('conteudo', 'Conteúdo', 'trim|required');
        $this->form_validation->set_rules('data', 'Data', 'trim|required');

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
                    $dados_update['conteudo'] = to_bd($dados_form['conteudo']);
                    $dados_update['imagem'] = $dados_upload['file_name'];
                    $dados_update['data'] = to_bd($dados_form['data']);
                    if($this->post->salvar($dados_update)):
                        unlink($imagem_antiga); //deleta a imagem anterior
                        set_msg('<p>Post alterado com sucesso!</p>');
                        $dados['posts']->imagem = $dados_update['imagem'];
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
                $dados_update['conteudo'] = to_bd($dados_form['conteudo']);
                $dados_update['data'] = to_bd($dados_form['data']);
                if($this->post->salvar($dados_update)):
                    set_msg('<p>Post alterado com sucesso!</p>');
                else:
                    set_msg('<p>Erro! Nenhuma alteração foi salva.</p>');
                endif;
            endif;

        endif;


        //carrega a view

        $dados['titulo'] = 'BNTH - Alteração de posts';
        $dados['h2'] = 'Alteração de posts';
        $dados['tela'] = 'editar'; //para carregar qual o tipo da view
        $this->load->view('painel/controle_livros', $dados);

    }
}