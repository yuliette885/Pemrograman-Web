<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mymodel');
		$this->load->helper('url','form');
		$this->load->library(array('form_validation','session','cart'));
	}
	
	public function index()
	{
	$data=array('title'=>'Web Catering');
	$this->load->view('layout/wrapper',$data);
	}
	
	// Register user
        public function register(){
            $username=$this->input->post('username');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$group=$this->input->post('group');
			$this->mymodel->tambah($username,$email,$password,$group);
			redirect('home/member');
        }
        
        public function member(){
			$this->load->view('home/register');
		}
		public function tambah(){
			$this->load->view('home/login');
		}

        // Log in user
        public function login(){
            $this->form_validation->set_rules('username','Username','required|alpha_numeric');
		    $this->form_validation->set_rules('password','Password','required|alpha_numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('home/login');
		} else {
			$this->load->model('mymodel');
			$valid_user = $this->mymodel->check_credential();
			
			if($valid_user == FALSE)
			{
				$this->session->set_flashdata('error','Wrong Username / Password!');
				redirect('home/login');
			} else {
				// if the username and password is a match
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('group', $valid_user->group);
				
				switch($valid_user->group){
					case 1 : //admin
								redirect('admin/products'); 
								break;
					case 2 : //member
								redirect(base_url());
								break;
					default: break; 
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/login');
	}
		
		function menu(){
            $data['products'] = $this->mymodel->all();
            $this->load->view('home/menu',$data);
        }
     
        public function add_to_cart($product_id)
	    {
		$product = $this->mymodel->find($product_id);
		$data = array(
					   'id'      => $product->id,
					   'qty'     => 1,
					   'price'   => $product->price,
					   'name'    => $product->name
					);

		$this->cart->insert($data);
		redirect(base_url('home/menu'));
	    }
     
        public function cart(){
            $this->load->view('home/show_cart');
        }
        
        public function clear_cart()
        {
            $this->cart->destroy();
            redirect(base_url('home/cart'));
		}
		
		public function kontak()
		{
		$this->load->view('home/kontak');
		}

		public function about()
		{
		$this->load->view('home/about');
		}
	
}