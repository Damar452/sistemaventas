<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Gasto_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}

        if($this->session->userdata("rol")==2){ 
            redirect(base_url()."dashboard");

        }

        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
    }


    public function index()
    {       
        $data = array("data" => $this->Gasto_model->getGastos()); 

        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('gasto/main',$data);
        $this->load->view('layout/footer');
        $this->load->view('layout/js/gasto');
        
        
    }



}

?>