<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lowongan extends CI_Controller {
	public function index(){
			$jumlah= $this->model_utama->view('lowongan')->num_rows();
			$config['base_url'] = base_url().'lowongan/index/'.$this->uri->segment(3);
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 10;
			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}
			$data['title'] = "Lowongan Kerja";
			$data['description'] = description();
			$data['keywords'] = keywords();
			if (is_numeric($dari)) {
				$data['lowongan'] = $this->model_utama->view_where_ordering_limit('lowongan',array('terbit' => 'Y'),'id_lowongan','DESC',$dari,$config['per_page']);
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
            $data['paging'] = $this->pagination->create_links();
			$this->template->load(template().'/template',template().'/lowongan',$data);
	}

	public function detail(){

		$query = $this->model_utama->view_join_one('lowongan', 'users', 'username', array('seo_lowongan' => $this->uri->segment(3)), 'id_lowongan', 'DESC', 0, 1);

        $data['kategori'] = $this->model_utama->view('kategori');

        if ($query->num_rows() <= 0) {
            redirect('main');
        } else {
            $row = $query->row_array();
            $data['title'] = cetak($row['jdl_lowongan']);
            $data['description'] = cetak_meta($row['isi_lowongan'], 0, 500);
            $data['keywords'] = cetak($row['jdl_lowongan']);
            $data['rows'] = $row;

            $dataa = array('dibaca' => $row['dibaca'] + 1);
            $where = array('id_lowongan' => $row['id_lowongan']);
            $this->model_utama->update('lowongan', $dataa, $where);

            // $this->load->helper('captcha');
            // $vals = array(
            //     'img_path'     => './captcha/',
            //     'img_url'     => base_url() . 'captcha/',
            //     'font_path' => base_url() . 'asset/Tahoma.ttf',
            //     'font_size'     => 37,
            //     'img_width'     => '200',
            //     'img_height' => 55,
            //     'border' => 0,
            //     'word_length'   => 5,
            //     'expiration' => 7200
            // );
            // $cap = create_captcha($vals);
            // $data['image'] = $cap['image'];
            // $this->session->set_userdata('mycaptcha', $cap['word']);
            $this->template->load(template() . '/template', template() . '/detaillowongan', $data);
        }
	}
}
