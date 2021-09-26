<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
        parent::__construct();

        
    }


	public function index()
	{	
		$this->load->model("User_model");
		$data['blogs']=$this->User_model->getBlogData();
		$data['sliders']=$this->User_model->getSliderData();
		$data['categories']=$this->User_model->getCategoryDatainBlog();
		// print_r($data);die();
		$this->load->view('blog/blocks/header',$data);
		$this->load->view('blog/index',$data);
		$this->load->view('blog/blocks/footer',$data);
	}
	
	public function blogDetails()
	{	
		$this->load->model("User_model");
		$data['blogs']=$this->User_model->getBlogData();
		$data['sliders']=$this->User_model->getSliderData();
		$data['categories']=$this->User_model->getCategoryDatainBlog();
		// print_r($data);die();
		$this->load->view('blog/blocks/header',$data);
		$this->load->view('blog/blogDetails',$data);
		$this->load->view('blog/blocks/footer',$data);
	}
	
}