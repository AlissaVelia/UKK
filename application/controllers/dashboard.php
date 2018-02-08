<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class 	Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
       //if($this->session->userdata('id_jabatan') == '1')
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data['main_view'] = 'dashboard';

		$data['jml_masuk'] = $this->admin_model->jml_s_masuk();
		$this->load->view('template_view', $data);
	}
	else
	{
			redirect('login');
	}
	}

	public function surat()
	{
		$data['main_view'] = 't_surat';
		$this->load->view('template_view', $data);
	}

	public function tambah_surat()
	{
		if($this->input->post('submit'))
		{
				$this->form_validation->set_rules('no_surat', 'No.Surat', 'trim|required');
				$this->form_validation->set_rules('tgl_kirim', 'Tgl.Kirim', 'trim|required|date');
				$this->form_validation->set_rules('tgl_terima', 'Tgl.Kirim', 'trim|required|date');
				$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
				$this->form_validation->set_rules('penerima', 'Penerima', 'trim|required');
				$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

				if ($this->form_validation->run() == TRUE ) {
					$config['upload_path'] = './assets/uploads/';
					$config['allowed_types'] = 'pdf';
					$config['max_size']  = '2000';
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('file_surat')){
						if($this->admin_model->tambah_surat_masuk($this->upload->data()) == TRUE)
						{
							$this->session->set_flashdata('notif', 'berhasil');
							redirect('dashboard/surat');
						}
						else{
							$this->session->set_flashdata('notif', 'gagal');
							redirect('dashboard/surat');
						}
						
					}
					else{
						$this->session->set_flashdata('notif', $this->upload->display_errors());
						redirect('dashboard/surat');
						
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('dashboard/tambah_surat');
				}
		}
	}
		
	

	
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */