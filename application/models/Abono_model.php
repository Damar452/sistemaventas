<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abono_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE client AUTO_INCREMENT 1');
		return $this->db->insert("abono",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("abono",$data);
	}

    public function getcreditsAbono($id){
		$this->db->select("a.*");
		$this->db->from("abono a");
		$this->db->where("a.id_sale",$id);
		$results = $this->db->get();
		return $results->result();
	}
	
    public function getTotalAbono($id){
		$this->db->select("SUM(abono.cantidad) as abonado");
		$this->db->from("abono");
		$this->db->where("abono.id_sale",$id);
        $result = $this->db->get();
		return $result->row();

	}


	public function filtroAbono($fecha1, $fecha2){

		$this->db->select("Sum(a.cantidad) as abonos");
		$this->db->from("abono a");
		$this->db->join("sale s","s.id=a.id_sale");
		$this->db->where('a.date >=', $fecha1);
		$this->db->where('a.date <=', $fecha2);
		$this->db->where('s.estado', "0");
		$results=$this->db->get();
		 return  $results->row();

	}

}

?>