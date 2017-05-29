<?php
defined('BASEPATH')OR exit("No direct script access allowed");

/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index(){
		$this->load->view('v_login');
	}

	public function autentikasi(){
		if(isset($_POST['btnLogin'])){
			$userName = $_POST['userName'];
			$userPassword = md5($_POST['userPassword']);
			$where = array(
				'VUSERNAME' => $userName,
				'VPASSWORD' => $userPassword
				);
			$res = $this->m_login->cekLogin('mst_users',$where)->num_rows();
			if($res>=1){
				$data_session = array(
					'userName' => $userName,
					'status' => "login"
					);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('pesan','Login berhasil');
				redirect('Login');
			}else{
				$this->session->set_flashdata('pesan','Login gagal');
				redirect('Login');
			}
		}else{
			redirect('Home');
		}
	}
}
?>