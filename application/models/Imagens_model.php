<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Imagens_model extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
       
        // Load model
        $this->tableName = ('imagens');
    }
    public function salvar($dados){
        if(isset($dados['id']) && $dados['id']> 0):
            //post já existe, devo editar
            $this->db->where('id', $dados['id']);
            unset($dados['id']); //para que o id não seja alterado
            $this->db->update('imagens', $dados); // atualiza todos os campos
            return $this->db->affected_rows(); //retorna todos dados alterados

        else:
            //post não existe , devo inserir
            $this->db->insert('imagens', $dados);
            return $this->db->insert_id();
        endif;
    }
    public function get($limit=0, $offset=0){
        if($limit == 0):
            $this->db->order_by('id', 'desc'); //pega os dados em ordem descrecente
            $query = $this->db->get('imagens');
            if($query->num_rows() > 0): //verifica se as linhas foram alteradas
                return $query->result(); //retorna os resultados da consulta
            else:
                return NULL;
            endif;
        else:
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('imagens', $limit);
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        endif;
    }

    public function get_single($estab_fk=0){
        $sql = "select upload_fotos from imagens where estab_fk =?";
        // $this->db->where('estab_fk', $estab_fk);
         $query = $this->db->query($sql,$estab_fk);
        return $query->result();
    }
 

    

   public function busca($limit=0, $offset=0){


        
       if($limit == 0):
            $this->db->where('titulo', 0); //pega os dados em ordem descrecente
            $query = $this->db->get('imagens',0);
            if($query->num_rows() > 0): //verifica se as linhas foram alteradas
                return $query->result(); //retorna os resultados da consulta
            else:
                return NULL;
            endif;
        else:
            $this->db->where('titulo', 'desc');
            $query = $this->db->where('imagens', $limit);
            if($query->num_rows() > 0):
                return $query->result();
            else:
                return NULL;
            endif;
        endif;
        
    }

    public function excluir($id=0){
        $this->db->where('id', $id);// retorna dados pelo id escolhido
        $this->db->delete('imagens');  // nome da tabela (deleta o id indicado)
        return $this->db->affected_rows();
    }

}