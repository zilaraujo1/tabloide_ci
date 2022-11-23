<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Servicos_model extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
       
        
    }
    public function salvar($dados){
        if(isset($dados['id']) && $dados['id']> 0):
            //post já existe, devo editar
            $this->db->where('id', $dados['id']);
            unset($dados['id']); //para que o id não seja alterado
            $this->db->update('servicos', $dados); // atualiza todos os campos
            return $this->db->affected_rows(); //retorna todos dados alterados

        else:
            //post não existe , devo inserir
            $this->db->insert('servicos', $dados);
            return $this->db->insert_id();
        endif;
    }
    public function get($limit=0, $offset=0){
        if($limit == 0):
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('servicos');
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        else:
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('servicos', $limit);
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        endif;
    }
    public function get_single($id=0){
        $this->db->where('id', $id);
        $query = $this->db->get('servicos', 1);
        if($query->num_rows() == 1):
            $row = $query->row();
            return $row;
        else:
            return NULL;
        endif;
    }
    public function get_estab($estab_fk=0){
        $this->db->where('estab_fk', $estab_fk);
        $query = $this->db->get('servicos', 1);
        if($query->num_rows() == 1):
            $row = $query->row();
            return $row;
        else:
            return NULL;
        endif;
    }

    public function excluir($id=0){
        $this->db->where('id', $id);
        $this->db->delete('servicos');  // nome da tabela
        return $this->db->affected_rows();
    }

}