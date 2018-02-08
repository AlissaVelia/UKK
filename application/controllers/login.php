<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_login');
		
	}

	public function index()
	{
	
        $this->load->view('login');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if($this->form_validation->run() == TRUE)
				{ 
					if($this->admin_login->hak_login() == TRUE)
					
					{
							if ($this->session->userdata('id_jabatan') == '1') {

							redirect('dashboard');
							} else {
								redirect('dashboard_lain');
							}
						} 	
				}
				 else {
					$this->session->set_flashdata('notif', validation_errors());
					$this->load->view('login');
					}
		}
	}



	public function logout()
	{
		$data = array(
				'nama'	=> '',
				'logged_in' => FALSE
			);

		$this->session->sess_destroy();
		redirect('login');
	}

}




/* End of file login.php */
/* Location: ./application/controllers/login.php */