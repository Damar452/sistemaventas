<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE sale AUTO_INCREMENT 1');
		return $this->db->insert("sale",$data);
		
	}

	public function saveDetail($data){
		$this->db->query('ALTER TABLE sale_detail AUTO_INCREMENT 1');
		return $this->db->insert("sale_detail",$data);
	}


	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("sale",$data);
	}


	public function getSale($id){
		$this->db->select("s.*");
		$this->db->from("sale s");
		$this->db->where("s.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getSales(){
		$this->db->select("s.*,c.name as client,v.name as voucher");
		$this->db->from("sale s");

		$this->db->join("client c","c.id=s.client_id");
		$this->db->join("voucher v","v.id=s.voucher_id");
		$this->db->where("s.estado","1" );
		// organizando por fecha en
		$this->db->order_by("s.date", "desc");
		$results = $this->db->get();
		return $results->result();
	}


	public function getcredits(){
		$this->db->select("s.*,c.name as client,v.name as voucher");
		$this->db->from("sale s");
		// $this->db->select("sum(a.cantidad) as abonado");
		// $this->db->from("abono a");
		$this->db->join("client c","c.id=s.client_id");
		$this->db->join("voucher v","v.id=s.voucher_id");
		$this->db->where("s.estado","0");
		// $this->db->where("a.id_sale","s.id");
		// organizando por fecha en
		$this->db->order_by("s.date", "desc");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("sale")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar una categoria que contiene productos!");
		}
	}

	public function getProducts($name){
		$this->db->select("p.id,p.name as label,p.price,p.p_compra,p.stock");
		$this->db->from("product p");
		$this->db->like("p.name", $name);
		$results = $this->db->get();
		return $results->result_array();
	}


	public function getClients(){
		$this->db->select("c.id, c.name, c.num_document");
		$this->db->from("client c");
		$results = $this->db->get();
		return $results->result();
	}

	public function getVouchers(){
		$this->db->select("v.name");
		$this->db->from("voucher v");
		$results = $this->db->get();
		return $results->result();
	}

	public function getVoucher($name){
		$this->db->select("v.id,v.name,v.igv");
		$this->db->from("voucher v");
		$this->db->where("v.name",$name);
		$results = $this->db->get();
		return $results->row();
	}

	public function getId(){
		return $this->db->insert_id();
	}


	public function getUltimo(){

		$this->load->database();
		$last_record = $this->db->order_by('id',"desc")
		->limit(1)
		->get('sale')
		->row();
		
		return $last_record-> id;

		
	}


	public function filtroVenta($fecha1, $fecha2, $estado){

		$this->db->select("Sum(s.total) as total");
		$this->db->from("sale s");
		$this->db->where('s.date >=', $fecha1);
		$this->db->where('s.date <=', $fecha2);
		$this->db->where('estado', $estado );
		$results=$this->db->get();
		 return  $results->row();

	}


	
}