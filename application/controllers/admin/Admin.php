<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();

        
    }


	public function index()
	{	
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/blocks/footer');
	}
}
