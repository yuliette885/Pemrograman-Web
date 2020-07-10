<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('products/index');
		}
		
		//load model -> model_products
		$this->load->model('model_products');
	}
	
	public function index()
	{
		$data['products'] = $this->model_products->all();
		$this->load->view('backend/lihat_produk', $data);
    }
    
    public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');
		//$this->form_validation->set_rules('userfile', 'Product Image', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('backend/tambah_produk');
		} else {
			//load uploading file library
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '300'; //KB
			$config['max_width']  = '2000'; //pixels
			$config['max_height']  = '2000'; //pixels

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				//file gagal diupload -> kembali ke form tambah
				$this->load->view('backend/tambah_produk');
			} else {
				//file berhasil diupload -> lanjutkan ke query INSERT
				// eksekusi query INSERT
				$gambar = $this->upload->data();
				$data_product =	array(
					'name'			=> set_value('name'),
					'description'	=> set_value('description'),
					'price'			=> set_value('price'),
					'image'			=> $gambar['file_name']
				);
				$this->model_products->create($data_product);
				redirect('admin/products');
			}
			
		}
	}
	
    public function update($id){
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');

		if ($this->form_validation->run() == FALSE)
		{
			$data['product'] = $this->model_products->find($id);
			$this->load->view('backend/edit_produk', $data);
		} else {
			if($_FILES['userfile']['name'] != ''){
				//form submit dengan gambar diisi
				//load uploading file library
				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '300'; //KB
				$config['max_width']  = '2000'; //pixels
				$config['max_height']  = '2000'; //pixels

				$this->load->library('upload', $config);
			
			
				if ( ! $this->upload->do_upload())
				{
					$data['product'] = $this->model_products->find($id);
					$this->load->view('backend/edit_produk', $data);
				} else {
					$gambar = $this->upload->data();
					$data_product =	array(
						'name'			=> set_value('name'),
						'description'	=> set_value('description'),
						'price'			=> set_value('price'),
						'image'			=> $gambar['file_name']
					);
					$this->model_products->update($id, $data_product);
					redirect('admin/products');
				}
			} else {
				//form submit dengan gambar dikosongkan
				$data_product =	array(
					'name'			=> set_value('name'),
					'description'	=> set_value('description'),
					'price'			=> set_value('price')
				);
				$this->model_products->update($id, $data_product);
				redirect('admin/products');
			}
		}
    }
    
    public function delete($id){
		$this->model_products->delete($id);
		redirect('admin/products');
    }
}