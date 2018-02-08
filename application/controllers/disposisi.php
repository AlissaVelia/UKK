<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function index()
	{
		$data['main_view'] = 'disposisi_sekertaris';
		$this->load->view('template_sekertaris', $data);	
	}

}

/* End of file disposisi.php */
/* Location: ./application/controllers/disposisi.php */