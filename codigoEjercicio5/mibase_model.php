<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mibase_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
    
	public function persona()
	{
		$query=$this->db->query('select * from persona where rol="docente"');
		return $query->result();
	}
	
	public function guardar($data)
	{
		$this->db->insert('persona',$data);
	}
	
	public function getPersona($ci)
	{
		$this->db->where('ci',$ci);
		$query = $this->db->get('persona');
		if ($query->num_rows() > 0){ return $query;}
		else { return false; } 
	}
	
	public function editarPersona($ci,$data)
	{
		$this->db->where('ci',$ci);
		$this->db->update('persona',$data);
	}
	
	public function eliminar($ci){
		$this->db->where('ci',$ci);
		$this->db->delete('persona');
		
	}
	
}
?>