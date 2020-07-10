<?php
 class Mymodel extends CI_Model{
    public function tambah($username, $email, $password, $group){
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'group' => $group,
            );
        $this->db->insert('user',$data);
    }

    public function check_credential()
	{
		$username = set_value('username');
		$password = set_value('password');
		
		$hasil = $this->db->where('username', $username)
						  ->where('password', $password)
						  ->limit(1)
						  ->get('user');
		
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

  public function all(){
		$hasil = $this->db->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}	
 }