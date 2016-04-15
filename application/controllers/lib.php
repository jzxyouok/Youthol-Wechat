<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library('form_validation','curl');
        $this->load->model('lib_model');
    }
    
	 public function login()
    {
        
        $this->form_validation->set_rules('sdutnum', 'sdutnum', 'required',
            array('required' => '学号不能为空'));
        $this->form_validation->set_rules('password', 'password', 'required',
            array('required' => '密码不能为空'));
  
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('lib/index');
        }else{
            //判断登录信息是否正确

            $sdutnum = $this->input->post('sdutnum');
            $password = $this->input->post('password');
            $html = $this->imitateLogin($sdutnum,$password);

            $loginReg = "/logout/";
            $BookReg = "/<td.*/";
            $buttonReg = "/<div\sid=\"\w\"><input.*\/>/";
            $nameReg = '/height="11" \/>.*logout/';
            $numReg = '/<p>.*<b/';//书籍数量
            preg_match_all($loginReg, $html, $isLogin); //用以判断是否登录
            preg_match_all($BookReg, $html, $bookArray);
            preg_match_all($buttonReg, $html, $buttonArray);
            preg_match_all($nameReg, $html, $nameArray);//用户名
            preg_match_all($numReg, $html, $numArray);
            $bookNum = substr($numArray[0][0],45,-25);
            $bookData['isLogin'] = $isLogin[0][0];
            $bookData['bookArray'] = $bookArray;
            $bookData['buttonArray'] = $buttonArray;
            $bookData['nameArray'] = $nameArray;
            $bookData['numArray'] = $numArray;
            $bookData['bookNum'] = $bookNum;


            if(empty($isLogin[0][0])||$isLogin[0][0]==null)
            {
               $this->load->view('lib/failure'); 
            }else{
               $this->load->view('lib/book',$bookData); 
            }
            
            //redirect(site_url());
        }
    }

    public function imitateLogin($username,$password)
    {
          //模拟登录
          $cookie_jar = dirname(__FILE__)."/cookie";
          $urlLogin = "http://222.206.65.12/reader/redr_verify.php";
          $post = "number=$username&passwd=$password&select=cert_no&returnUrl=";
          $this->curl->login_post($urlLogin,$cookie_jar,$post);

          //抓取内容
          $urlBook = "http://222.206.65.12/reader/book_lst.php";
          $html = $this->curl->get_content($urlBook,$cookie_jar); 

          return $html;
    }
    

}
