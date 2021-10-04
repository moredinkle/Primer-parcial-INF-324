<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura2 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model("mibase_model");
		$this->load->helper('url');
    }
	
	
	public function index()
	{
		$filas = $this->mibase_model->persona();
		$data['personas']=$filas;
		$this->load->view('myviewLectura', $data);
	}
	
	public function agregar()
	{
		$this->load->view('agregar');
	}

	public function guardar()
	{
		$this->load->view('guardar');
		$data = array(
			'ci' => $this->load->input->post('ci', TRUE),
			'nombre_completo' => $this->load->input->post('nombre_completo', TRUE),
			'fecha_nacimiento' => $this->load->input->post('fecha_nacimiento', TRUE),
			'departamento' => $this->load->input->post('departamento', TRUE),
			'rol' => $this->load->input->post('rol', TRUE)
		);
		$this->mibase_model->guardar($data);

	}
	
	public function editar(){
		$ci = $this->uri->segment(3);
		$getPersona = $this->mibase_model->getPersona($ci);
		
		if($getPersona != false){
			foreach ($getPersona ->result() as $row){
				$ci = $row->ci;
				$nombre_completo = $row->nombre_completo;
				$fecha_nacimiento = $row->fecha_nacimiento;
				$departamento= $row->departamento;
				$rol = $row->rol;
			}
			$data = array(
				'ci' => $ci,
				'nombre_completo' => $nombre_completo,
				'fecha_nacimiento' => $fecha_nacimiento,
				'departamento' => $departamento
			);
		}
		else{
			$data = '';
			return false;
		}
		
		$this->load->view('editar', $data);
	}
	
	public function editarPersona(){
		$ci = $this->uri->segment(3);
		$data = array(
			'ci' => $this->input->post('ci', TRUE),
			'nombre_completo' => $this->input->post('nombre_completo', TRUE),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento', TRUE),
			'departamento' => $this->input->post('departamento', TRUE),
			'rol' => $this->input->post('rol', TRUE)
		);
		
		$this->mibase_model->editarPersona($ci, $data);
		redirect('/Lectura2');
	}
	
	
	public function eliminar(){
		$ci = $this->uri->segment(3);
		$this->mibase_model->eliminar($ci);
		redirect('/Lectura2');
	}

}
?>