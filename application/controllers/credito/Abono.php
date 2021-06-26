<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abono extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Detail_model");
        $this->load->model("Sale_model");
        $this->load->model("Product_model");
        $this->load->model("Abono_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}

        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
    }

	public function index($id)
	{       
        $data = array(
            "sale" => $this->Detail_model->getSale($id),
            "data" => $this->Detail_model->getSalesDetail($id),
            "abonos" => $this->Abono_model->getcreditsAbono($id)
        ); 

        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('credito/abono',$data);
        $this->load->view('layout/footer');
        $this->load->view('layout/js/detail');
    }


    public function abonar(){

        $id = $this->input->post("id");
        $abono = $this->input->post("abono");


        if( $id != "" && $abono != ""){

        $data = array(
			'id_sale' => $id, 
            'cantidad' => $abono
		);
	    $abono = $this->Abono_model->save($data);

        if ($abono){

            $abonado = $this->Abono_model->getTotalAbono($id);

               $act = array(
        
                    'abonos' => $abonado->abonado
                );

                $this->Sale_model->update($act,$id);
        }

        }
        

	    $this->session->set_flashdata("success","Abono exitoso!");

    }



    public function eliminar(){

        $id = $this->input->post("id");

        $sale = $this->Sale_model->getSale($id);
		$data = array(
			'estado' => 2, 
		);
		$this->Sale_model->update($data,$id);
        $detalle = $this->Detail_model->getSalesDetail($id);

        
// actualizar stock eliminar factura

        foreach($detalle as $elemento){
            $product = $this->Product_model->getProduct($elemento->product_id);
            $data = array(
                'stock' =>  $product->stock + $elemento->cant , 
            );
            $this->Product_model->update($data,$elemento->product_id);
            
            
        }

	    $this->session->set_flashdata("success","Factura eliminada correctamente");


    }
    

}
