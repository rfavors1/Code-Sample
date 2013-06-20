<?php
class Dashboard extends CI_Controller {

	public function index()
	{
		if($this->phpsessions->get('email')) {
		  $this->load->view('dashboard');
		} else {
			redirect('authenticate/login');
		}
	}
	
	public function save_page_content()
	{
		$post = $this->input->post();
		
		if (($post['PageName'] == '') OR ($post['PageContent'] == '')) {
		  $data = array(
               'title' => $post['PageName'],
               'content' => $post['PageContent'],
			   'error' => 'Please fill out all of the fields.'
          );
		  $this->load->view('pages_add_form', $data);
		} else {
		  $this->load->model('Page_model');
		  $this->Page_model->save_page_content($post);
		  $this->load->view('update');
		}
	}
	
	public function save_user()
	{
		$post = $this->input->post();
		
		if (($post['email'] == '') OR ($post['password'] == '')) {
		  $data = array(
               'email' => $post['email'],
			   'error' => 'Please fill out all of the fields.'
          );
		  $this->load->view('users_add_form', $data);
		} else {
		  $this->load->model('Page_model');
		  $this->Page_model->save_user($post);
		  $this->load->view('update');
		}
	}
	
	public function get_all_pages()
	{
		$data = array();
		$this->load->model('Page_model');
		$data['pages'] = $this->Page_model->get_all_pages();
		$this->load->view('Pages_list',$data);
	}
	
	public function get_all_users()
	{
		$data = array();
		$this->load->model('Page_model');
		$data['users'] = $this->Page_model->get_all_users();
		$this->load->view('Users_list',$data);
	}
	
	public function get_page()
	{
		$this->load->model('Page_model');
		$result = $this->Page_model->get_page( $this->uri->segment(3,0) );
		$data = array(
               'title' => $result[0]->pageName,
               'content' => $result[0]->pageContent,
			   'id' => $result[0]->pageID
          );

		$this->load->view('pages_edit_form', $data);
	}
	
	public function get_user()
	{
		$this->load->model('Page_model');
		$result = $this->Page_model->get_user( $this->uri->segment(3,0) );
		$data = array(
               'email' => $result[0]->email,
			   'password' => $result[0]->password,
			   'id' => $result[0]->userID
          );

		$this->load->view('users_edit_form', $data);
	}
	
	public function delete_page_content()
	{
		$this->load->model('Page_model');
		$this->Page_model->delete_page_content( $this->uri->segment(3,0) );
		$this->load->view('update');
	}
	
	public function delete_user()
	{
		$this->load->model('Page_model');
		$this->Page_model->delete_user( $this->uri->segment(3,0) );
		$this->load->view('update');
	}
	
	public function update_page_content()
	{
		$post = $this->input->post();
		$this->load->model('Page_model');
		$this->Page_model->update_page_content($post);
		$this->load->view('update');
	}
	
	public function update_user()
	{
		$post = $this->input->post();
		$this->load->model('Page_model');
		$this->Page_model->update_user($post);
		$this->load->view('update');
	}
	
	public function add_page()
	{
		$this->load->view('Pages_add_form');
	}
	
	public function add_user()
	{
		$this->load->view('Users_add_form');
	}
	
}
?>