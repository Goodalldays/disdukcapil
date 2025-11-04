<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kontak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
	}

	public function index()
	{
		$data['title'] = "Kontak Kami";
		$data['description'] = description();
		$data['keywords'] = keywords();

		$data['iden'] = $this->model_utama->view_where('identitas', array('id_identitas' => 1));

		$this->template->load(template() . '/template', template() . '/kontak', $data);
	}

	function alpha_space_only($str)
	{
		if (!preg_match("/^[a-zA-Z ]+$/", $str)) {
			$this->form_validation->set_message('alpha_space_only', 'Form %s hanya dapat berisi huruf dan spasi');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function kirim_pesan()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[30]|callback_alpha_space_only');
		$this->form_validation->set_rules('no_telp', 'No. Telp', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subjek', 'Subjek', 'required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'required');

		// if ($this->form_validation->run() == FALSE) {
		// 	$this->load->view('/kontak_kami');
		// } else {

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$subjek = $this->input->post('subjek');
		$pesan = $this->input->post('pesan');
		$no_telp = $this->input->post('no_telp');
		$tanggal = date("Y/m/d");
		$jam = date("h:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];


		$data['raw'] = array(
			'nama' => $nama,
			'email' => $email,
			'subjek' => $subjek,
			'pesan' => $pesan,
			'tanggal' => $tanggal,
			'no_telp' => $no_telp,
			'jam' => $jam,
			'ip' => $ip
		);

		// use XSS filtering
		$data['xss_clean'] = $this->security->xss_clean($data['raw']);


		if ($this->model_utama->insert('hubungi', $data['xss_clean'])) {
			$this->session->set_flashdata('success', 'Pesan terkirim!.');
			redirect('/kontak');
		} else {
			$this->session->set_flashdata('error', 'Pesan gagal dikirim!.');
			redirect('/kontak');
		}


	}
}
