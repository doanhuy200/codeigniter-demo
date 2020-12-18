<?php

class PostsModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_posts()
	{
		$query = $this->db->get("products");
		return $query->result();
	}
}
