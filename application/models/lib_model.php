<?php 
class Lib_model extends CI_Model
{
	public function __construct()
	{
		$this->load->helper('url');
	}

	public function M_libLogin()
	{
		$data = array(
			'sdutnum' => $this->input->post('sdutnum'),
			'password' => $this->input->post('password')

			); 
		return $data;
	}
}



?>