<?php
class ProductsModel extends CI_Model
{
	public function get_posts()
	{
		$query = $this->db->get("posts");

		return $query->result();
	}

	public function insert_post()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description')
		);

		return $this->db->insert('posts', $data);
	}

	public function update_post($id)
	{
		$data=array(
			'title' => $this->input->post('title'),
			'description'=> $this->input->post('description')
		);

		if($id==0){
			return $this->db->insert('posts', $data);
		}else{
			$this->db->where('id',$id);
			return $this->db->update('posts', $data);
		}
	}
}
?>
