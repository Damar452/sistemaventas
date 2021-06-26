<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function getCants(){

        $product=$this->db->get("product")->num_rows();
       

        
        
                                                            $fecha = date('Y-m-d');
                                                            $this->db->select("SUM(total) as total , COUNT(id) as ids");
                                                            $this->db->from("sale");
                                                            $this->db->like('date', $fecha , 'after');
                                                            $this->db->where('estado', "1" );
                                                            $total=$this->db->get();
                                                             $row = $total->row();
 
                                                           
                                                             
                                                    

        $client=$this->db->get("client")->num_rows();
        $user=$this->db->get("user")->num_rows();

		return (object) array(
            "cant_roduct"=>$product,
            "cant_sale"=>$row->ids,
            "cant_client"=>$client,
            "cant_user"=>$user,
            "total"=>$row->total
        );
    }
    
    public function getSalesYear($year){
        $this->db->select("MONTH(s.date) as month, SUM(s.total) as data");
		$this->db->from("sale s");
		$this->db->where("s.date >=",$year."-01-01");
		$this->db->where("s.date <=",$year."-12-31");
		$this->db->group_by("month");
		$this->db->order_by("month");
		$results = $this->db->get();
		return $results ->result();
    }

    public function getYears(){
		$this->db->select("YEAR(s.date) as year");
		$this->db->from("sale s");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$results = $this->db->get();
		return $results->result();
    }
    
    public function getSalesWeek(){
        $results = $this->db->query("SELECT DAYOFWEEK(sale.date) as day, SUM(sale.total) as data FROM `sale` WHERE YEARWEEK(sale.date) = YEARWEEK(CURDATE()) GROUP BY day ORDER BY day");
		return $results ->result();
    }

}