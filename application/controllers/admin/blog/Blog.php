<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("User_model");
        
    }


	public function index()
	{	
		$data['blogs']=$this->User_model->getBlogData();
		// print_r($data);die();
		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/blog/index',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function addCategory(){
		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/addcategory');
		$this->load->view('admin/blocks/footer');
		
	}
	public function addBlog(){
		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/blog/addBlog');
		$this->load->view('admin/blocks/footer');
		
	}

	public function insert(){
		
		$data = array(
			    'title' => $this->input->post('title'),
			    'date' => $this->input->post('date'),
			    'imgSrc' => $this->input->post('imgSrc'),
				);
		// print_r($data);die();
		$result=$this->User_model->addblog($data);
  		redirect('admin/blog/Blog');

	}
	public function editBlog(){

		$id=$this->uri->segment('5');
		// echo $id;die();
		$data['blogs']=$this->User_model->getSingleBlogData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/blog/editBlogData',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function update(){
		$id=$this->uri->segment('5');
		$data['categories']=$this->User_model->update_blog($id);
		redirect('admin/blog/Blog');
	}
	public function deleteBlog(){
		$id=$this->uri->segment('5');
		// echo $id;die();
		$data['blogs']=$this->User_model->delete_blog($id);
		redirect('admin/blog/Blog');
		
	}
	
}
