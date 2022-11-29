<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Setup extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct();
       $this->load->helper('form');
       $this->load->library('form_validation');
       $this->load->model('usuarios_model', 'user');
       $this->load->model('estabelecimentos_model', 'estab');
        
    }
   
    public function index(){
        $dados['titulo'] = "login";
        $this->load->view('painel/login', $dados);
    }
 
 
    public function autentica_login()
    {
       
        // Regras de validação do formulário
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');


               //verifica a validação
        if($this->form_validation->run()== FALSE):
            if(validation_errors()):
                set_msg('<p> Cadastro inexistente! Verifique se os dados estão corretos!</p>');
                $dados['titulo'] = "login";
                $this->load->view('painel/login', $dados);//função do helper
            endif;
        else:
            $email = $this->input->post("email");
            $senha = $this->input->post("password");
            $usuario = $this->user->verifica_login($email, $senha);
        
                //usuário existe
                if($usuario):
                    //senha ok, fazer login
                   $userdata = $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata($usuario);
                    
                    $data['user'] =  $_SESSION['id'];
                    //$this->session->set_userdata('password', $this->option->get('password'));
                      // Fazer o redirect para a home do painel
                      //var_dump($usuario['id']);
                 
                    redirect('admin', $data);
                else:
                    //senha incorreta
                    set_msg('<p> Cadastro inexistente! Verifique se os dados estão corretos!</p>');
                    $dados['titulo'] = "login";
                    $this->load->view('painel/login', $dados);
                endif;
            
            endif;

          
        

    }
    //----------------------------------------------------------------------------------------
 public function admin(){
     $this->session->set_userdata('logged');
    $data['user'] =  $_SESSION['id'];
    $data['titulo'] = "Cadastro";
    $data['estab'] = $this->estab->get();
    $data['titulo'] = "Cadastro da empresa";
    $data['description'] = "cadastro de usuários";
   
    //var_dump($_SESSION['id']);
   
    $this->load->view('admin',$data);
    
} 
   

   
    public function logout(){
        // destrói os dados da sessão
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('user_login');
        $this->session->unset_userdata('user_email');
        set_msg('<p> Você saiu do sistema!</p>');
        redirect('login', 'reflesh');
    }

}