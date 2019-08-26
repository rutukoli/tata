<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class master_device extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

		$this->load->helper('form');
		
		$this->load->model('Common_model');

	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			
					$data['user_id']	= $this->tank_auth->get_user_id();
					$data['username']	= $this->tank_auth->get_username();
					$data['name']		= $this->session->userdata("name");
					$data['insertdata']   =base_url().'index.php/Master_device/insertdata';

				//	$data['add_registration'] = base_url().'Welcome/add';
				//	$data['get_data'] = $this->Register_model->get_data();
			$this->load->view('common/header');
			$this->load->view('common/nav',$data);
			$this->load->view('master_device',$data);
			$this->load->view('common/footer');
				
		}
    }
    
    function insertdata(){
		$data=$this->input->post();
		$insert=$this->Common_model->insert("master_device",$data);
		
		redirect(base_url('index.php/master_device'));
}
}