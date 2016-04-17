<?php 
class Lib_model extends CI_Model
{
	public function __construct()
	{
		$this ->load->database();
		$this->load->helper('url');
	}

	public function M_addLibUser($sdutnum,$password,$name)
	{
		$data = array(
			'sdutnum' => $sdutnum,
			'lib_pwd' => $password,
			'username' => $name
			);

       return $this->db->insert('library_user', $data);
	}

	 public function M_getlibUser($sdutnum)
    {
        if($sdutnum=='')
        {
              $query = $this->db->get('library_user');
              return $query->result_array();
        }else{
              $query = $this->db->get_where('library_user', array('sdutnum' => $sdutnum));
              return $query->row_array();
        }
    }

	public function M_addEmail()
	{
		$data = array(
			'email' => $this->input->post('email'),
			'sdutnum' => $this->input->post('sdutnum'),
			); 
		return $this->db->insert('library_email', $data);
	}
	public function M_getlibEmail($sdutnum)
    {
        if($sdutnum=='')
        {
              $query = $this->db->get('library_email');
              return $query->result_array();
        }else{
              $query = $this->db->get_where('library_email', array('sdutnum' => $sdutnum));
              return $query->row_array();
        }
    }
     public function M_updateEmail($sdutnum)
    {
        $data = array(
             'email' => $this->input->post('email'),
			 'sdutnum' => $this->input->post('sdutnum'),
        );
        $this->db->where('sdutnum', $sdutnum);
        return $this->db->update('library_email', $data);
    }
}



?>