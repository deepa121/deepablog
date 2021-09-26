<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
	}
	
	public function getBlogData(){
		$q=$this->db->get('blogData');
		return $q->result_array();
	}
	public function getSliderData(){
		$this->db->select("*");
            $this->db->from("slider");
			$this->db->join("blogdata", "slider.blog_id=blogdata.id");
            $this->db->where("slider.slider_status", 1);
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getCategoryData(){
		$this->db->select("*");
            $this->db->from("category");
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getCategoryDatainBlog(){
		$this->db->select("*");
            $this->db->from("category");
			$this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}

	public function getSubcategoryData(){
		$this->db->select("subcategory.*,category.category_name,category.category_id");
            $this->db->from("subcategory");
			$this->db->join("category", "category.category_id=subcategory.category_id");
            $query = $this->db->get();
            return $query->result_array();
	}
	


	public function addcategory($name){
		
		return $this->db->insert('category', $name);
	}
	public function addblog($name){
		
		return $this->db->insert('blogdata', $name);
	}
	public function addsubcategory($name){
		// print_r($name);die();
		return $this->db->insert('subcategory', $name);
	}
	public function getSingleCategoryData($id){
			$this->db->select("*");
            $this->db->from("category");
            $this->db->where("category_id",$id);
			// $this->db->join("blogdata", "category.blog_id=blogdata.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSingleBlogData($id){
			$this->db->select("*");
            $this->db->from("blogdata");
            $this->db->where("id",$id);
			// $this->db->join("blogdata", "category.blog_id=blogdata.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSingleSubCategoryData($id){
			// echo $id;die();
			$this->db->select("*");
            $this->db->from("subcategory");
            $this->db->where("subcategory_id",$id);
			// $this->db->join("blogdata", "category.blog_id=blogdata.id");
            $query = $this->db->get();
            return $query->result_array();
	}


	public function update_category($id)
	{
	
		$data = array(
			'category_name' => $this->input->post('Categoryname'),
		);
		// print_r($id);die();
		$query = $this->db->update('category',$data,['category_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive($id)
	{
	
		$data = array(
			'status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('category',$data,['category_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active($id)
	{
	
		$data = array(
			'status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('category',$data,['category_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_subcat_status_inactive($id)
	{
	
		$data = array(
			'status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('subcategory',$data,['subcategory_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_subcat_status_active($id)
	{
	
		$data = array(
			'status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('subcategory',$data,['subcategory_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_blog($id)
	{
	
		$data = array(
			'imgSrc' => $this->input->post('Imgname'),
			'title' => $this->input->post('title'),
			'date' => $this->input->post('date'),
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_subcategory($id)
	{
	
		$data = array(
			'name' => $this->input->post('SubCategoryname'),
			'category_id' => $this->input->post('Categoryid'),
		);
		// print_r($id);die();
		// print_r($data);die();
		$query = $this->db->update('subcategory',$data,['subcategory_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function delete_category($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('category_id', $id);
    	$this -> db -> delete('category');
		$this -> db -> where('category_id', $id);
    	$this -> db -> delete('subcategory');
		return $this->db->affected_rows();
	}
	public function delete_blog($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('id', $id);
    	$this -> db -> delete('blogdata');
		return $this->db->affected_rows();
	}
	public function delete_subcategory($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('subcategory_id', $id);
    	$this -> db -> delete('subcategory');
		return $this->db->affected_rows();
	}
    
}