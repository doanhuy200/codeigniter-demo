<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Posts extends CI_Controller {
	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function __construct() {
		//load database in autoload libraries
		parent::__construct();
		$this->load->model('ProductsModel');
	}

	public function index()
	{
		$posts = new ProductsModel;
		$data['posts'] = $posts->get_posts();

		$this->load->view('includes/header');
		$this->load->view('posts/list', $data);
		$this->load->view('includes/footer');
	}

	public function create()
	{
		$this->load->view('includes/header');
		$this->load->view('posts/create');
		$this->load->view('includes/footer');
	}

	/**
	 * Store Data from this method.
	 *
	 * @return Response
	 */
	public function store()
	{
		$posts = new ProductsModel;
		$posts->insert_post();

		redirect(base_url('posts'));
	}

	/**
	 * Edit Data from this method.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->db->get_where('posts', array('id' => $id))->row();

		$this->load->view('includes/header');
		$this->load->view('posts/edit', array('post' => $post));
		$this->load->view('includes/footer');
	}

	/**
	 * Update Data from this method.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$posts = new ProductsModel;
		$posts->update_post($id);

		redirect(base_url('posts'));
	}

	/**
	 * Delete Data from this method.
	 *
	 * @return Response
	 */
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('posts');

		redirect(base_url('posts'));
	}
}
