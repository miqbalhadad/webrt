<?php 
 
class Akun extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('Akun_model');
	}
 
	function index(){
		$data['akun'] = $this->Akun_model->getAllAkun();
		$data['role'] = $this->session->userdata('role');
		$data['username'] = $this->session->userdata('username');
        $data['judul'] = 'Kelola Akun';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('akun/kelolaakun', $data);
		$this->load->view('templates/footer');
	}

	function tambah(){
		$data['nkk'] = '';
		$data['email'] = '';
		$data['password'] = '';
		$data['role'] = '';
		$data['aksi'] = 'submit_tambah';
		$data['judul'] = 'Tambah Akun';
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');		
		$data['data'] = $this->Akun_model->all();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('akun/tambaheditakun', $data);
		$this->load->view('templates/footer');
	}

	function submit_tambah(){
		$data['nkk'] = $this->input->post('nkk');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['role'] = $this->input->post('role');

		$this->Akun_model->input_data('user', $data);

		redirect('akun', 'refresh');

	}

	function hapus(){
		$nkk = $this->uri->segment('3');
		$this->Akun_model->hapus_data($nkk);
		redirect('akun', 'refresh');
	}

	function edit(){
		$nkk = $this->uri->segment('3');
		$data = $this->Akun_model->display_row($nkk);
		$data['data'] = $this->Akun_model->all();
		$data['aksi'] = 'submit_edit';
		$data['judul'] = 'Edit Akun';
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('akun/tambaheditakun', $data);
		$this->load->view('templates/footer');
	}

	function submit_edit(){
		$id 				= $this->input->post('nkkLama');
		$data['nkk']		= $this->input->post('nkk');
		$data['email'] 		= $this->input->post('email');
		$data['password'] 	= $this->input->post('password');
		$data['role'] 		= $this->input->post('role');

		$this->Akun_model->updateAkun($data,$id);

		redirect('akun', 'refresh'); 
	}
}