<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Paginas extends CI_Controller {
    // Configuração para o cache global das páginas
    public function __construct()
    {
        parent::__construct();
        //carrega os módulos e classes
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('usuarios_model', 'user');
        $this->load->model('servicos_model', 'serv');
        $this->load->model('estabelecimentos_model', 'estab');
        $this->load->model('imagens_model', 'foto');
       // $this->output->cache(1440); //corrensponde a 24 horas até o  cache ser atualizado
        
    }
//-----------------------------------------------------------------------------------------
    public function index()
    {
     //debug:  echo 'página home';
     $data['foto'] = $this->estab->get();
     $data['dono'] = $this->estab->get();
     $data['titulo'] = "BNTH | Home";
    $data['desc'] = "Exercício de exemplo do capítulo 5 do livro Codeigniter";
    
        $this->load->view('home', $data);
        
    }
//------------------------------------------------------------------------------------------
    public function servico(){

       //debug: echo 'página empresa';
        $estab_fk = $this->uri->segment(2); 
        $data['titulo'] = "BNTH | A Empresa";
        $data['description'] = "Informações sobre a empresa";
        $data['foto'] = $this->foto->get_single($estab_fk);
        $data['dono'] = $this->estab->get_single($estab_fk);
        $data['serv'] = $this->serv->get_estab($estab_fk);

    
        //$estabel = $this->estab->get_single($id);
       // $data['estab'] = $estabel;
        $this->load->view('servico', $data);
    
    }
//----------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------
    public function cadastro_users()
    {
        $data['titulo']= "Cadastro de login";
        $this->load->view('cadastro_users', $data);
    
    }
    public function salva_user(){
       
       
           // Regras de validação do formulário
          /*  $this->form_validation->set_rules('cnpj', 'Cnpj', 'trim |required| min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'trim |required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim |required|min_length[5]');
           // $this->form_validation->set_rules('password2', 'passord', 'trim |required| min_length[30]');
    
    
            if($this->form_validation->run() == FALSE){
                $data['formErrors'] = validation_errors();
    
            }else{ */
               
                $email = $this->input->post('email');
                $cnpj = $this->input->post('cnpj');
                $password = $this->input->post('password');

               $dados_form = array (
                    "cnpj"=>$cnpj,
                    "email"=>$email,
                    "password"=>$password

               ); 
               //var_dump($email);

             
               if($id = $this->user->salvar($dados_form)):

                    set_msg('<p>Dados cadastrado com sucesso!</p>');
                    $estab_fk = $this->uri->segment(2); 
                    $data['dono'] = $this->estab->get_single($estab_fk);
                    $data['titulo'] = "Cadastro de serviços";
                    redirect('login', $data, 'refresh');
                    
                    
                 else:
                    set_msg('<p> Erro! Dados não cadastrado.</p>');
                    redirect('Paginas/admin', $data, 'refresh');
           
                endif;
            
                
           // }
          
            redirect('Paginas/cadastro_users', 'refresh'); 
    
} 




  
    
}
