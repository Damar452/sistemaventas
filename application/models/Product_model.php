<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE product AUTO_INCREMENT 1');
		return $this->db->insert("product",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("product",$data);
	}

	public function getProduct($id){
		$this->db->select("p.*");
		$this->db->from("product p");
		$this->db->where("p.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getProducts(){
		$this->db->select("p.*, c.name as category");
		$this->db->from("product p");
		$this->db->join("category c","c.id=p.category_id");
		$this->db->order_by("p.stock", "asc");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("product")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar productos que se han vendido!");
		}
	}

	public function getCategorys(){
		$this->db->select("c.id, c.name");
		$this->db->from("category c");
		$results = $this->db->get();
		return $results->result();
	}

	public function getId(){
		$this->db->select("p.id");
		$this->db->from("product p");
		$this->db->order_by("p.id","desc");
		$this->db->limit(1);
		$result = $this->db->get();
		if($result->row()){
			return $result->row()->id+1;
		}else{
			return 0;
		}
	}


	public function getStock(){
		$this->db->select("p.name as name, p.stock as stock");
		$this->db->from("product p");
		$this->db->where("p.stock <= 5");
		$results = $this->db->get();
		   if($results->num_rows() > 0) {
        $results = $results->result();
    }
    return $results;


}


public function filtroinversion($fecha1, $fecha2, $estado){

	$this->db->select("sd.cant as cants, p.p_compra as precio");
	$this->db->from("sale_detail sd");
	$this->db->join("sale s","s.id=sd.sale_id");
	 $this->db->join("product p","p.id=sd.product_id");
	$this->db->where('s.date >=', $fecha1);
	$this->db->where('s.date <=', $fecha2);
	$this->db->where('s.estado', $estado );
	$results=$this->db->get();
	 return  $results->result_array();



}
	

}