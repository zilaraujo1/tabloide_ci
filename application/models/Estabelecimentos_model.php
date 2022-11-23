<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Estabelecimentos_model extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
       
        
    }
    public function salvar($dados){
        if(isset($dados['id']) && $dados['id']> 0):
            //post já existe, devo editar
            $this->db->where('id', $dados['id']);
            unset($dados['id']); //para que o id não seja alterado
            $this->db->update('estabelecimentos', $dados); // atualiza todos os campos
            return $this->db->affected_rows(); //retorna todos dados alterados

        else:
            //post não existe , devo inserir
            $this->db->insert('estabelecimentos', $dados);
            return $this->db->insert_id();
        endif;
    }
    public function get($limit=0, $offset=0){
        if($limit == 0):
            $this->db->order_by('id', 'desc'); //pega os dados em ordem descrecente
            $query = $this->db->get('estabelecimentos');
            if($query->num_rows() > 0): //verifica se as linhas foram alteradas
                return $query->result(); //retorna os resultados da consulta
            else:
                return NULL;
            endif;
        else:
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('estabelecimentos', $limit);
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        endif;
    }

    public function get_single($id=0){
        $this->db->where('id', $id); // retorna dados pelo id escolhido
        $query = $this->db->get('estabelecimentos', 1);
        if($query->num_rows() == 1):
            $row = $query->row();
            return $row;
        else:
            return NULL;
        endif;
    }

    

   public function busca($limit=0, $offset=0){


        
       if($limit == 0):
            $this->db->where('titulo', 0); //pega os dados em ordem descrecente
            $query = $this->db->get('estabelecimentos',0);
            if($query->num_rows() > 0): //verifica se as linhas foram alteradas
                return $query->result(); //retorna os resultados da consulta
            else:
                return NULL;
            endif;
        else:
            $this->db->where('titulo', 'desc');
            $query = $this->db->where('estabelecimentos', $limit);
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        endif;
        
    }

    public function excluir($id=0){
        $this->db->where('id', $id);// retorna dados pelo id escolhido
        $this->db->delete('estabelecimentos');  // nome da tabela (deleta o id indicado)
        return $this->db->affected_rows();
    }

}