<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib extends CI_Controller {

	public function __construct()
    {
        //init Destructor
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library('form_validation','curl');
        $this->load->model('lib_model');//load library model
    }
    
	 public function login()
    {
        
        $this->form_validation->set_rules('sdutnum', 'sdutnum', 'required',
            array('required' => '学号不能为空'));
        $this->form_validation->set_rules('password', 'password', 'required',
            array('required' => '密码不能为空'));
  
        if ($this->form_validation->run() === FALSE)
        {
            //$this->email();
            $this->load->view('lib/index');
        }else{

            $sdutnum = $this->input->post('sdutnum');
            $password = $this->input->post('password');
            $bookData = $this->imitateLogin($sdutnum,$password);


            if($bookData['isLogin'][0]) //judgment user whether login
            {
                 //echo $this->sendEmail();
               $isHasUser = $this->lib_model->M_getLibUser($sdutnum);
               if(!$isHasUser){
                 $this->lib_model->M_addLibUser($sdutnum,$password,$bookData['username']);
               }
               $this->load->view('lib/book',$bookData); 
               
               }else{
               $this->load->view('lib/failure'); 
            }
        }
    }

    public function imitateLogin($sdutnum,$password)
    {
        //模拟登录
        $cookie_jar = dirname(__FILE__)."/cookie";
        $urlLogin = "http://222.206.65.12/reader/redr_verify.php";
        $post = "number=$sdutnum&passwd=$password&select=cert_no&returnUrl=";
        $this->curl->login_post($urlLogin,$cookie_jar,$post);

        //抓取内容
        $urlBook = "http://222.206.65.12/reader/book_lst.php";
        $html = $this->curl->get_content($urlBook,$cookie_jar);

        $loginReg = "/logout/";
        $BookReg = "/<td.*/";
        $buttonReg = "/<div\sid=\"\w\"><input.*\/>/";
        $nameReg = '/height="11" \/>.*logout/';
        $numReg = '/<p>.*<b/';//book number
        preg_match_all($loginReg, $html, $isLogin); //to judgment whether login
        preg_match_all($BookReg, $html, $bookArray);
        preg_match_all($buttonReg, $html, $buttonArray);
        preg_match_all($nameReg, $html, $nameArray);//username
        preg_match_all($numReg, $html, $numArray);
        empty($nameArray[0])?$username = null:$username = substr($nameArray[0][0],14,-37);
        empty($numArray[0])?$bookNum = null:$bookNum = substr($numArray[0][0],45,-25);
        $bookData['sdutnum'] = $sdutnum;/* after changed session*/
        $bookData['isLogin'] = $isLogin;
        $bookData['bookArray'] = $bookArray;
        $bookData['buttonArray'] = $buttonArray;
        $bookData['username'] = $username;
        $bookData['numArray'] = $numArray;
        $bookData['bookNum'] = $bookNum; 

        return $bookData;
    }

    public function sendEmail()
    {
        
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.qq.com';
        $config['smtp_user'] = 'hufy3651@qq.com';
        $config['smtp_pass'] = 'zuuxdrnrspcebfcf';
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 30;
        $config['mailtype'] = 'text';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $config['crlf'] = "\r\n";
        $this->email->from('hufy3651@qq.com', 'BYKJ');
        $this->email->to('hi@hufangyun.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        return $this->email->print_debugger();

    }

    public function addemail()
    {
        $data['sdutnum'] = $this->uri->segment(3);//get url sdutnum
        $this->form_validation->set_rules('email', 'email', 'required',
            array('required' => '邮箱不能为空'));
  
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('lib/addemail',$data);
        }else{
             $isHasEmail = $this->lib_model->M_getLibEmail($data['sdutnum']);
            if(!$isHasEmail){
                 $this->lib_model->M_addEmail();
               }else{

                $this->lib_model->M_updateEmail($data['sdutnum']);
               }
            $this->load->view('lib/success');
        }
    }
    /**
    1、取得学号 -> 取得学号 密码 -> 获取
     */
    public function email()
    {
         $data = $this->lib_model->M_getLibEmail($sdutnum = null);
         print_r($data);
    }


}
