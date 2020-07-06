<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (empty($this->session->userdata('epf'))) {
			$this->load->view('login');
		}else{
			redirect('dashboard','refresh');
		}
	}

	public function submit()
	{
		
		$epf = $this->input->post('epf');
		$password = md5($this->input->post('password'));

		$get = $this->db->get_where('user', array('epf' => $epf, 'password' => $password));
		if ($get->num_rows() > 0) {
			$row = $get->row();
			$array = array(
				'epf' => $row->epf,
				'password' => $row->password,
			);
			
			$this->session->set_userdata( $array );
			redirect('dashboard','refresh');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">
				<strong>Incorrect information !</strong>
			</div>');
			redirect('login','refresh');
		}			
	
	}

	public function logout()
	{
		session_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */