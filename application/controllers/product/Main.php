<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Product_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}
    }

    public function index()
    {       
        $data = array("data" => $this->Product_model->getProducts()); 

        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('product/main',$data);
        $this->load->view('layout/footer');
        $this->load->view('layout/js/product');
        
        
    }
    

    public function delete(){

        if($this->session->userdata("rol")==2){ 
            $this->session->set_flashdata("error","No tiene permisos para eliminar productos");
            redirect(base_url()."productos");
  
        }
        $id = $this->input->post("id");
                
        $resp=$this->Product_model->delete($id);
        $this->session->set_flashdata($resp[0],$resp[1]);
        redirect(base_url()."productos");
                
    }

    public function getData(){
        $resp = $this->Product_model->getCategorys();
        if($resp){
            echo json_encode($resp);
        }
    }


    // public function Stock(){
    //     $resp = $this->Product_model->getStock();
    //     if($resp){
    //         echo json_encode($resp);
    //     }


    // }
 
}
