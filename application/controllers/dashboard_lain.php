<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_lain extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		//if($this->session->userdata('id_jabatan') != 'TRUE')
		if($this->session->userdata('logged_in') == TRUE){
		$data['main_view'] = 'dashboard_lain';
		$data['data_disposisi']	= $this->admin_model->get_all_disposisi_masuk($this->session->userdata('id_pegawai'));
		
 		$this->load->view('template_view', $data);
		
		
	}else{
		redirect('login');
		}
	}


	public function disposisi_keluar($id_surat)
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['data_disposisi']	= $this->admin_model->get_all_disposisi_keluar($this->session->userdata('id_pegawai'));
			$data['data_surat']	= $this->admin_model->get_surat_masuk_by_id($id_surat);
			$data['drop_down_jabatan']	= $this->admin_model->get_jabatan();
			$data['main_view'] = 'pegawai/disposisi_keluar';
			$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

	public function tambah_disposisi($id_surat)
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$this->form_validation->set_rules('tujuan_pegawai', 'tujuan', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->admin_model->tambah_disposisi($this->uri->segment(3)) == TRUE)
				{ 
                 $this->session->set_flashdata('notif', 'berhasil');
				redirect('dashboard_lain/disposisi_keluar/'.$this->uri->segment(3));
				}
				else
				{
					$this->session->set_flashdata('notif', 'gagal');
				redirect('dashboard_lain/disposisi_keluar/'.$this->uri->segment(3));
				}
			} else {
				$this->session->set_flashdata('notif', 'kosong');
				redirect('dashboard_lain/disposisi_keluar/'.$this->uri->segment(3));
			}
		}
	}

	public function get_pegawai_by_jabatan($id_jabatan)
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data_pegawai = $this->admin_model->get_pegawai_by_jabatan($id_jabatan);

			echo json_encode($data_pegawai);

		} else {
			redirect('login');
		}
	}
    
    public function v_disposisi_keluar()
    {
    	$id_surat = $this->uri->segment(3);
    	$data['data_disposisi']	= $this->admin_model->get_all_disposisi_keluar($this->session->userdata('id_pegawai'));
		$data['data_surat']	= $this->admin_model->get_surat_masuk_by_id($id_surat);
		$data['drop_down_jabatan']	= $this->admin_model->get_jabatan();
    	$data['main_view'] = 'v_disposisi_keluar';
    	$this->load->view('template_view', $data);
    }

    public function tambah_v_disposisi_keluar($id_surat)
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$this->form_validation->set_rules('tujuan_pegawai', 'tujuan', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->admin_model->tambah_disposisi($this->uri->segment(3)) == TRUE)
				{ 
                 $this->session->set_flashdata('notif', 'berhasil');
				redirect('dashboard_lain/disposisi_keluar/'.$this->uri->segment(3));
				}
				else
				{
					$this->session->set_flashdata('notif', 'gagal');
				redirect('dashboard_lain/disposisi_keluar/'.$this->uri->segment(3));
				}
			} else {
				$this->session->set_flashdata('notif', 'kosong');
				redirect('dashboard_lain/disposisi_keluar/'.$this->uri->segment(3));
			}
		}
	}



}

/* End of file dashboard_lain.php */
/* Location: ./application/controllers/dashboard_lain.php */