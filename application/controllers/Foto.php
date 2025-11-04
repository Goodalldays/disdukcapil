<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Foto extends CI_Controller {
	public function index(){

		$jumlah = $this->model_utama->view('galeri')->num_rows();
		// echo $jumlah;
		$config['base_url'] = base_url() . 'foto/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 15;

		if ($this->uri->segment(3) == '') {
			$dari = 0;
		} else {
			$dari = $this->uri->segment(3);
		}
		$this->pagination->initialize($config);
		if (is_numeric($dari)) {
				$data['title'] = "Foto";
				$data['description'] = description();
				$data['keywords'] = keywords();
				// $data['results'] = $this->model_utama->view_ordering_limit('berita', 'id_berita', 'DESC', 0, 10);
				$data['galeri'] = $this->model_utama->view_join_where('galeri','users','album','username', 'id_album', 'id_galeri','DESC', $dari, $config['per_page'],'terbit','Y');
				$this->pagination->initialize($config);
				$data['paging'] = $this->pagination->create_links();
		} else {
			redirect('main');
		}

		$this->template->load(template() . '/template', template() . '/foto', $data);
	}


	public function detail()
	{
		$query = $this->model_utama->view_join_two('galeri', 'users', 'album', 'username', 'id_album', array('seo_galeri' => $this->uri->segment(3)), 'id_galeri', 'DESC', 0, 1);

		$data['album'] = $this->model_utama->view('album');

		if ($query->num_rows() <= 0) {
			redirect('main');
		} else {
			$row = $query->row_array();
			$data['title'] = cetak($row['judul_galeri']);
			$data['description'] = cetak_meta($row['deskripsi'], 0, 500);
			$data['keywords'] = cetak($row['tag']);
			$data['rows'] = $row;

			$dataa = array('dilihat' => $row['dilihat'] + 1);
			$where = array('id_galeri' => $row['id_galeri']);
			$this->model_utama->update('galeri', $dataa, $where);

			// $this->load->helper('captcha');
			// $vals = array(
			// 	'img_path'	 => './captcha/',
			// 	'img_url'	 => base_url() . 'captcha/',
			// 	'font_path' => base_url() . 'asset/Tahoma.ttf',
			// 	'font_size'     => 37,
			// 	'img_width'	 => '200',
			// 	'img_height' => 55,
			// 	'border' => 0,
			// 	'word_length'   => 5,
			// 	'expiration' => 7200
			// );
			// $cap = create_captcha($vals);
			// $data['image'] = $cap['image'];
			// $this->session->set_userdata('mycaptcha', $cap['word']);
			$this->template->load(template() . '/template', template() . '/detailfoto', $data);
		}
	}
}
