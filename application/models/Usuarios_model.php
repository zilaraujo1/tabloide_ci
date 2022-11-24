<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
       
        
    }
//------------------------------------------------------------------
    public function verifica_login($email, $password)
	{
		$this->db->where("email", $email);
        $this->db->where("password", $password);
        $user = $this->db->get("usuario")->row_array();
        return $user;

	}
//------------------------------------------------------------------
    public function salvar($dados){
        if(isset($dados['id']) && $dados['id']> 0):
            //post já existe, devo editar
            $this->db->where('id', $dados['id']);
            unset($dados['id']); //para que o id não seja alterado
            $this->db->update('usuario', $dados); // atualiza todos os campos
            return $this->db->affected_rows(); //retorna todos dados alterados

        else:
            //post não existe , devo inserir
            $this->db->insert('usuario', $dados);
            return $this->db->insert_id();
        endif;
    }
//------------------------------------------------------------------
    public function get($limit=0, $offset=0){
        if($limit == 0):
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('usuario');
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        else:
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('usuario', $limit);
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        endif;
    }
//------------------------------------------------------------------
    public function get_single($id=0){
        $this->db->where('id', $id);
        $query = $this->db->get('usuario', 1);
        if($query->num_rows() == 1):
            $row = $query->row();
            return $row;
        else:
            return NULL;
        endif;
    }
//------------------------------------------------------------------

    public function excluir($id=0){
        $this->db->where('id', $id);
        $this->db->delete('usuario');  // nome da tabela
        return $this->db->affected_rows();
    }

	
}