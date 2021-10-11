<?php 
 
class SuratKeluar extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	}
 
	function index(){
        $data['judul'] = 'Surat Keluar';
		$data['role'] = $this->session->userdata('role');
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('surat/suratkeluar');
		$this->load->view('templates/footer');
	}
}