<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidato_ref_vecinal_model extends CI_Model{

  function getById($id){
    $this->db 
    ->select('*')
    ->from('candidato_vecino')
    ->where('id_candidato', $id);

    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return FALSE;
    }
  }
  function getComentarios($id_candidato){
    $this->db
    ->select('concepto_candidato')
    ->from('candidato_vecino')
    ->where('id_candidato', $id_candidato);

    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return FALSE;
    }
  }
  function countByIdCandidato($id_candidato){
    $this->db
    ->select('id')
    ->from('candidato_vecino')
    ->where('id_candidato', $id_candidato);
    
    $query = $this->db->get();
    return $query->num_rows();
  }
  function check($id){
    $this->db
    ->select('id')
    ->from('candidato_vecino')
    ->where('id', $id);
    
    $query = $this->db->get();
    return $query->num_rows();
  }
  function add($data){
    $this->db->insert('candidato_vecino', $data);
    return $this->db->insert_id();
  }
  function edit($data, $id){
    $this->db
    ->where('id', $id)
    ->update('candidato_vecino', $data);
  }
  function delete($id){
    $this->db
    ->where('id', $id)
    ->delete('candidato_vecino');
  }

}