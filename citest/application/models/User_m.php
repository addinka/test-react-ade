<?php

	class User_m extends CI_Model {

		

		public function InsertData($table,$data){
			 return $this->db->insert($table,$data);
		}

	

		public function UpdateData($table,$data,$where){

			return $this->db->update($table,$data,$where);

		}

	

		public function DeleteData($table,$where){

			return $this->db->delete($table,$where);

		}

		public function getdata($table){

			return $this->db->get($table);

		}

		public function getwhere($table,$where){

			return $this->db->get_where($table,$where);

		}

		function idcat($data){

			$this->db->insert('cat_web',$data);

			$insert_id = $this->db->insert_id();

			return $insert_id;

		}

		function idprod($data){

			$this->db->insert('prod_web',$data);

			$insert_id = $this->db->insert_id();

			return $insert_id;

		}

		public function getprod(){

			$this->db->select('*');

			$this->db->from('prod_web');

			$this->db->join('cat_web', 'prod_web.category_prod = cat_web.no_cat');

			$query = $this->db->get();

			return $query;

		}

		

		

	}
