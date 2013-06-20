<?php
class Page_model extends CI_Model {
	
	public function get_page($value)
	{
		$this->db->where('pageID', $value);
		$query = $this->db->get('pages');
		return $query->result();
	}
	
	public function get_user($value)
	{
		$this->db->where('userID', $value);
		$query = $this->db->get('users');
		return $query->result();
	}
	
	public function save_page_content($post)
	{
		$this->db->insert('pages',$post);
	}
	
	public function save_user($post)
	{
		$this->db->insert('users',$post);
	}
	
	public function get_all_pages()
	{
		$query = $this->db->get('pages');
		return $query->result();
	}
	
	public function get_all_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}
	
	public function update_page_content($data)
	{
	    $this->db->where('pageID', $data['pageID']);
		$this->db->update('pages',$data);
	}
	
	public function update_user($data)
	{
	    $this->db->where('userID', $data['userID']);
		$this->db->update('users',$data);
	}
	
	public function delete_page_content($value)
	{
	    $this->db->where('pageID', $value);
		$this->db->delete('pages');
	}
	
	public function delete_user($value)
	{
	    $this->db->where('userID', $value);
		$this->db->delete('users');
	}
}
?>

