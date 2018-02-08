<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('id_jabatan') == 1){
		$data['main_view'] = 'surat_keluar';
		$this->load->view('template_view', $data);		
		}else{
		redirect('dashboard_lain');
		}
	}

}

/* End of file surat_keluar.php */
/* Location: ./application/controllers/surat_keluar.php */