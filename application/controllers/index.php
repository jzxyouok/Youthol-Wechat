<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library('form_validation');
    }
    
    //加载 首页 视图
    public function index()
	{
		$this->load->view('index');
	}
}
