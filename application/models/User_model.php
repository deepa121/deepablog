<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
	}
	
	public function getBlogData(){
		$this->db->select("*");
            $this->db->from("blogdata");
		$this->db->join("category", "category.category_id=blogdata.category_id");
		$q=$this->db->get();
		return $q->result_array();
	}
	public function getBlogData1($id){
		$this->db->select("*");
            $this->db->from("blogdata");
		$this->db->join("category", "category.category_id=blogdata.category_id");
		$this->db->where("id",$id);
		$q=$this->db->get();
		return $q->result_array();
	}
	public function getSliderAllData(){
		$q=$this->db->get('slider');
		return $q->result_array();

		// $this->db->select("*");
        //     $this->db->from("slider");
        //     $this->db->where("slider_id",$id);
		// 	// $this->db->join("category", "category.category_id=id");
		// 	// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
        //     $query = $this->db->get();
        //     return $query->result_array();
	}
	public function getSliderData1(){
		$this->db->select("*");
            $this->db->from("slider");
            // $this->db->where("slider_id",$id);
			$this->db->join("category", "category.category_id=slider.category_id");
			// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSliderData($id){
		$this->db->select("*");
            $this->db->from("slider");
            $this->db->where("slider_id",$id);
			// $this->db->join("category", "category.category_id=id");
			// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
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
	public function getCategoryData1(){
		$this->db->select("*");
            $this->db->from("category");
			$this->db->where("category.status",1);
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getCommentData(){
		$this->db->select("*");
            $this->db->from("comment");
			$this->db->where("comment_status",1);
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getAllCommentData(){
		$this->db->select("*");
            $this->db->from("comment");
			// $this->db->where("comment_status",1);
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getCategoryDatainBlog(){
		$this->db->select("*");
            $this->db->from("category");
			$this->db->join("subcategory", "subcategory.category_id=category.category_id");
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
	public function addcomment($name){

		// print_r($name);die();
		
		return $this->db->insert('comment', $name);
	}
	public function addblog($name){
		
		return $this->db->insert('blogdata', $name);
	}
	public function addslider($name){
		
		return $this->db->insert('slider', $name);
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
			// $this->db->join("category", "category.category_id=id");
			// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
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
	public function update_status_inactive_blog($id)
	{
	
		$data = array(
			'status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_blog($id)
	{
	
		$data = array(
			'status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive_comment($id)
	{
	
		$data = array(
			'comment_status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('comment',$data,['comment_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_comment($id)
	{
	
		$data = array(
			'comment_status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('comment',$data,['comment_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive_slider($id)
	{
	
		$data = array(
			'slider_status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_slider($id)
	{
	
		$data = array(
			'slider_status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive_blog_post($id)
	{
	
		$data = array(
			'popular_post' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_blog_post($id)
	{
	
		$data = array(
			'popular_post' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
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
	public function update_blog_data($id)
	{
	
		$data = array(
			'category_id' => $this->input->post('Categoryid'),
			'subcategory_id' => $this->input->post('SubCategoryid'),
			'title' => $this->input->post('title'),
			'blog_description' => $this->input->post('Description'),
			'popular_post' => $this->input->post('popular_post'),
			'created_at' => $this->input->post('date'),
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_blog_data1($id, $new_name)
	{
	
		$data = array(
			'category_id' => $this->input->post('Categoryid'),
			'subcategory_id' => $this->input->post('SubCategoryid'),
			'title' => $this->input->post('title'),
			'blog_description' => $this->input->post('Description'),
			'popular_post' => $this->input->post('popular_post'),
			'created_at' => $this->input->post('date'),
			// 'imgSrc' => $new_name;
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_slider_data($id)
	{
	
		$data = array(
			'category_id' => $this->input->post('Categoryid'),
			'subcategory_id' => $this->input->post('SubCategoryid'),
			'slider_title' => $this->input->post('title'),
			'created_at' => $this->input->post('date'),
		);
		// print_r($id);die();
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
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
	public function delete_slider($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('slider_id', $id);
    	$this -> db -> delete('slider');
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