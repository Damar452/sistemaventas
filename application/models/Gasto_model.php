<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gasto_model extends CI_Model {



    public function save($data){
		$this->db->query('ALTER TABLE client AUTO_INCREMENT 1');
		return $this->db->insert("gastos",$data);
	}


    public function getGastos(){
		$this->db->select("g.*");
		$this->db->from("gastos g");
		$results = $this->db->get();
		return $results->result();
	}


	public function filtroGasto($fecha1, $fecha2){

		$this->db->select("Sum(g.valor) as gastos");
		$this->db->from("gastos g");
		$this->db->where('g.date >=', $fecha1);
		$this->db->where('g.date <=', $fecha2);
		$results=$this->db->get();
		 return  $results->row();

	}






}


?>