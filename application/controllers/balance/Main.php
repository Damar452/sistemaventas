<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Sale_model");
        $this->load->model("Detail_model");
        $this->load->model("Abono_model");
        $this->load->model("Gasto_model");
        $this->load->model("Product_model");
        if (!$this->session->userdata("login")) {
            redirect(base_url()."login");
        }
    }

	public function index()
	{       
        // $data = array("data" => $this->Client_model->getClients()); 

        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('balance/main');
        $this->load->view('layout/footer');
        $this->load->view('layout/js/balance');
    }



    public function filtroBalance()
	{ 
  
        $fecha1 = date("Y-m-d", strtotime($this->input->post("f1")));
        $fecha2 = date("Y-m-d", strtotime($this->input->post("f2")));

        $data = array(
            "ventas" => $this->Sale_model->filtroVenta($fecha1, $fecha2, 1 ),
            "inversion_venta" => $this->Product_model->filtroinversion($fecha1, $fecha2, 1),
            "creditos" => $this->Sale_model->filtroVenta($fecha1, $fecha2, 0 ),
            "inversion_credito" => $this->Product_model->filtroinversion($fecha1, $fecha2, 0),
            "abonado" => $this->Abono_model->filtroAbono($fecha1, $fecha2 ),
            "gasto" => $this->Gasto_model->filtroGasto($fecha1, $fecha2 )
        ); 

       

       

        echo json_encode($data);
        
    }

        

  

}

?>