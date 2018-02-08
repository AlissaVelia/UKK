<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{		if($this->session->userdata('id_jabatan') == 1){
		$data['main_view'] = 'surat_masuk';
		$data['list'] = $this->admin_model->lihat_surat_masuk();
		$this->load->view('template_view', $data);
		
	}else{
		redirect('dashboard_lain');
		}
		
		
	}


	public function tambah_surat_masuk()
	{
		if($this->input->post('submit')){ 

				$this->form_validation->set_rules('no_surat', 'No.Surat', 'trim|required');
				$this->form_validation->set_rules('tgl_kirim', 'Tgl.Kirim', 'trim|required|date');
				$this->form_validation->set_rules('tgl_terima', 'Tgl.Kirim', 'trim|required|date');
				$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
				$this->form_validation->set_rules('penerima', 'Penerima', 'trim|required');
				$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					//konfigurasi upload file
					$config['upload_path'] 		= './assets/uploads/';
					$config['allowed_types']	= 'pdf';
					$config['max_size']			= 2000;
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('file_surat')){
						
						if($this->admin_model->tambah_surat_masuk($this->upload->data()) == TRUE ){
							$this->session->set_flashdata('notif', 'Tambah surat berhasil!');
							redirect('surat_masuk');			
						} else {
							$this->session->set_flashdata('notif', 'Tambah surat gagal!');
							redirect('surat_masuk');			
						}

					} else {
						$this->session->set_flashdata('notif', $this->upload->display_errors());
						redirect('surat_masuk');	
					}

				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('surat_masuk');			
				}
			}
		 else {
			redirect('login');
		}
	}
	public function get_surat_masuk_by_id($id_surat)
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->session->userdata('id_jabatan') == '1'){

				$data_surat_masuk_by_id = $this->admin_model->get_surat_masuk_by_id($id_surat);

				echo json_encode($data_surat_masuk_by_id);
			}
		} else {
			redirect('login');
		}
	}

	public function ubah_file_surat_masuk(){

		$id_surat = $this->input->get('ubah');
					if($this->session->userdata('id_jabatan') == '1'){

					//konfigurasi upload file
				$config['upload_path'] 		= './assets/uploads/';
				$config['allowed_types']	= 'pdf';
				$config['max_size']			= 2000;
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('edit_file_surat')){
					
					if($this->admin_model->ubah_file_surat_masuk($this->upload->data()) == TRUE ){
						$this->session->set_flashdata('notif', 'Ubah file surat berhasil!');
						redirect('surat_masuk');			
					} else {
						$this->session->set_flashdata('notif', 'Ubah file surat gagal!');
						redirect('surat_masuk');			
					}

				} else {
					$this->session->set_flashdata('notif', $this->upload->display_errors());
					redirect('surat_masuk');	
				}
			
		} else {
			redirect('surat_masuk/ubah_file_surat_masuk');
		}
	}
 
   public function hapus()
   {
   	 $id_surat = $this->input->get('del');

   	 if($this->admin_model->del_surat_masuk($id_surat) == TRUE){
   	    $this->session->set_flashdata('notif', 'Hapus data berhasil');
   	    redirect('surat_masuk');
   	 }
   	 else{
   	 	$this->session->set_flashdata('notif', 'gagal');
   	 	redirect('surat_masuk');
   	 }

   }
	
	
    public function lihat()
	{
		$data['main_view'] = 'ubah_surat_masuk';
		$id_surat = $this->uri->segment(3);
		$data['list'] = $this->admin_model->get_surat_masuk_by_id($id_surat);
		$this->load->view('template_view', $data);
	}
	public function edit_surat()
	{
		$id_surat = $this->uri->segment(3);
		$data['list'] = $this->admin_model->get_surat_masuk_by_id($id_surat);

		if($this->input->post('submit'))
		{
		$this->form_validation->set_rules('no_surat', 'No.Surat', 'trim|required');
		$this->form_validation->set_rules('tgl_kirim', 'Tgl.Kirim', 'trim|required|date');
		$this->form_validation->set_rules('tgl_terima', 'Tgl.Kirim', 'trim|required|date');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
		$this->form_validation->set_rules('penerima', 'Penerima', 'trim|required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

		if($this->form_validation->run() == TRUE){
			if($this->admin_model->ubah_surat_masuk($id_surat) == TRUE)
					{
						$this->session->set_flashdata('notif', 'Ubah file surat berhasil!');
						redirect('surat_masuk');
					}
					else
					{
						$this->session->set_flashdata('notif', 'Tambah surat gagal!');
							redirect('surat_masuk');
					}
				}
				else
				{
					$this->session->set_flashdata('notif', 'Tambah surat gagal!');
						redirect('surat_masuk');
				}
		}
	}
 
    public function ubah_file()
	{   
		$id_surat = $this->uri->segment(3);
		$data['main_view'] = 'ubah_file_masuk';
		$data['list'] = $this->admin_model->get_surat_masuk_by_id($id_surat);
		$this->load->view('template_view', $data);
	}

	public function ubah_file_masuk(){

					//konfigurasi upload file
				$config['upload_path'] 		= './assets/uploads/';
				$config['allowed_types']	= 'pdf';
				$config['max_size']			= 2000;
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('file_surat')){
					
					if($this->admin_model->ubah_file_surat_masuk($this->upload->data(), $this->uri->segment(3)) == TRUE ){
						$this->session->set_flashdata('notif', 'Ubah file surat berhasil!');
						redirect('surat_masuk');			
					} else {
						$this->session->set_flashdata('notif', 'Ubah file surat gagal!');
						redirect('surat_masuk/ubah_file/'.$this->uri->segment(3));		
					}

				} else {
				$this->session->set_flashdata('notif', validation_errors());
					redirect('surat_masuk/ubah_file/'.$this->uri->segment(3));
				}
			
		}


	public function disposisi($id_surat)
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->session->userdata('id_jabatan') == '1'){

				$data['main_view'] 			= 'disposisi_sekertaris';
				$data['data_surat']			= $this->admin_model->get_surat_masuk_by_id($this->uri->segment(3));
				$data['drop_down_jabatan']	= $this->admin_model->get_jabatan();
				$data['data_disposisi']		= $this->admin_model->get_all_disposisi($id_surat);

				$this->load->view('template_view', $data);

			} else {
				$data['main_view'] = 'dashboard_lain';

				$this->load->view('template_view', $data);
			}
		} else {
			redirect('login');
		}
	}

	//untuk nge read tujuan pegawai
 	public function get_pegawai_by_jabatan($id_jabatan)
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data_pegawai = $this->admin_model->get_pegawai_by_jabatan($id_jabatan);

			echo json_encode($data_pegawai);
			//untuk ngirim ke views

		} else {
			redirect('login');
		}
	}
	public function tambah_disposisi()
	{

		if($this->session->userdata('logged_in') == TRUE){
			$this->form_validation->set_rules('tujuan_pegawai', 'Tujuan Pegawai', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->admin_model->tambah_disposisi($this->uri->segment(3)) == TRUE ){
					$this->session->set_flashdata('notif', 'Tambah disposisi berhasil!');
					if($this->session->userdata('id_jabatan') == '1'){
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					} else {
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					}			
				} else {
					$this->session->set_flashdata('notif', 'Tambah disposisi gagal!');
					if($this->session->userdata('id_jabatan') == '1'){
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					} else {
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					}		
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				if($this->session->userdata('id_jabatan') == '1'){
					redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
				} else {
					redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
				}			
			}
		} else {
			redirect('login');
		}
	}

	public function hapus_disposisi($id_surat, $id_disposisi)
	{
		if($this->admin_model->hapus_disposisi($id_disposisi) == TRUE)
		{
			$this->session->set_flashdata('notif', 'berhasil');
			redirect('surat_masuk/disposisi/'.$id_surat);
		} 
		else{
			$this->session->set_flashdata('notif', 'gagal');
			redirect('surat_masuk/disposisi/'.$id_surat);
		}
	}

	public function v_disposisi()
	{
		$id_surat = $this->uri->segment(3);
		$data['data_surat']			= $this->admin_model->get_surat_masuk_by_id($this->uri->segment(3));
		$data['drop_down_jabatan']	= $this->admin_model->get_jabatan();
		$data['data_disposisi']		= $this->admin_model->get_all_disposisi($id_surat);
		$data['main_view'] = 'view_disposisi';
		$this->load->view('template_view', $data);
	}

	public function tambah_v_disposisi()
	{
			$this->form_validation->set_rules('tujuan_pegawai', 'Tujuan Pegawai', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->admin_model->tambah_disposisi($this->uri->segment(3)) == TRUE ){
					$this->session->set_flashdata('notif', 'Tambah disposisi berhasil!');
					if($this->session->userdata('id_jabatan') == '1'){
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					} else {
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					}			
				} else {
					$this->session->set_flashdata('notif', 'Tambah disposisi gagal!');
					if($this->session->userdata('id_jabatan') == '1'){
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					} else {
						redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
					}		
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				if($this->session->userdata('id_jabatan') == '1'){
					redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
				} else {
					redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
				}			
			}
	}

}

/* End of file surat_masuk.php */
/* Location: ./application/controllers/surat_masuk.php */