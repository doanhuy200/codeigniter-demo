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

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$this->load->model('ProductsModel');
	}

	public function index()
	{
		$posts = new ProductsModel;
		$data['posts'] = $posts->get_posts();

		echo json_encode($data);
	}
}
