<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cekLogin($table,$where){
		$res = $this->db->get_where($table,$where);
		return $res;
	}
}
