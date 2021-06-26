<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Gasto_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}
	}

	public function index()
	{   
        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('gasto/add');
        $this->load->view('layout/footer');
        $this->load->view('layout/js/gasto');
    }
    
    public function save(){

        $descripcion	= $this->input->post("descripcion");
        $valor = $this->input->post("valor");
        

        $this->form_validation->set_rules("descripcion","Descripción del gasto","required");
        $this->form_validation->set_rules("valor","Valor del gasto","required|numeric");


		if ($this->form_validation->run()==TRUE) {
			$data  = array(
				'descripcion' => $descripcion,
                'valor' => $valor
			);

			$this->Gasto_model->save($data);

			$this->session->set_flashdata("success","Gasto registrado correctamente!");
		
            redirect(base_url()."gastos"); // redirigir dos veces atras 


		}else{
			$this->load->view('layout/head');
			$this->load->view('layout/sidenav');
			$this->load->view('layout/topnav');
			$this->load->view('gasto/add');
			$this->load->view('layout/footer');
			$this->load->view('layout/js/gasto');
		}
	}
}


?>