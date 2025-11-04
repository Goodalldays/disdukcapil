<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Unduhan extends CI_Controller {
	public function index(){
		$jumlah= $this->model_utama->view('unduh')->num_rows();
		$config['base_url'] = base_url().'unduhan/index/';
		// $config['total_rows'] = $jumlah;
		// $config['per_page'] = 18;
		// if ($this->uri->segment('3')==''){
		// 	$dari = 0;
		// }else{
		// 	$dari = $this->uri->segment('3');
		// }

		// if (is_numeric($dari)) {
		// 	$data['title'] = "Unduhan";
		// 	$data['description'] = description();
		// 	$data['keywords'] = keywords();
		// 	if (is_numeric($dari)) {
		// 		$data['unduh'] = $this->model_utama->view_where_ordering_limit('unduh', array('terbit' => 'Y'),'id_unduh','DESC',$dari,$config['per_page']);
		// 	}else{
		// 		redirect('main');
		// 	}
		// 	$this->pagination->initialize($config);
		// 	$data['paging'] = $this->pagination->create_links();
		// } else {
		// 	redirect('main');
		// }

		$data['title'] = "Unduhan";
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['unduh'] = $this->model_utama->view_orderby('unduh', array('terbit' => 'Y'),'id_unduh','DESC');
		$this->template->load(template().'/template',template().'/unduhan',$data);
	}

	// direct download
	function file_download(){
		$cek = $this->model_utama->view_where('unduh',array('nama_file' => $this->uri->segment(3)));
		if ($cek->num_rows()<=0){
			redirect('unduh');
		}else{
			$row = $cek->row_array();
			$dataa = array('hits'=>$row['hits']+1);
			$where = array('id_unduh' => $row['id_unduh']);
			$this->model_utama->update('unduh', $dataa, $where);

			$name = $this->uri->segment(3);
			$data = file_get_contents("upload/files/".$name);
			force_download($name, $data);
		}
	}

	// view file still counting
	function file()
	{
		$cek = $this->model_utama->view_where('unduh', array('file' => $this->uri->segment(3)));
		if ($cek->num_rows() <= 0) {
			redirect('unduhan');
		} else {
			$row = $cek->row_array();
			$hits = array('hits' => $row['hits'] + 1);
			$where = array('id_unduh' => $row['id_unduh']);
			$this->model_utama->update('unduh', $hits, $where);

			$name = $this->uri->segment(3);
			redirect(base_url() . "upload/files/" . $name);

			// $data = file_get_contents("asset/files/" . $name);
			// force_download($name, $data);
		}
	}

}

