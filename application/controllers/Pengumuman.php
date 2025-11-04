<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengumuman extends CI_Controller
{
    public function index()
    {

        $jumlah = $this->model_utama->view('pengumuman')->num_rows();
        // echo $jumlah;
        $config['base_url'] = base_url() . 'pengumuman/index/';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 10;

        if ($this->uri->segment(3) == '') {
            $dari = 0;
        } else {
            $dari = $this->uri->segment(3);
        }
        $this->pagination->initialize($config);
        if (is_numeric($dari)) {
            $data['title'] = "Pengumuman";
            $data['description'] = description();
            $data['keywords'] = keywords();
            // $data['results'] = $this->model_utama->view_ordering_limit('berita', 'id_berita', 'DESC', 0, 10);
            $data['pengumuman'] = $this->model_utama->select_where_limit('pengumuman', 'id_pengumuman', 'DESC', $dari, $config['per_page'], 'aktif', 'Y');
            $data['paging'] = $this->pagination->create_links();
        } else {
            redirect('main');
        }
        $this->template->load(template() . '/template', template() . '/pengumuman', $data);
    }


    public function detail()
    {
        $query = $this->model_utama->view_join_one('pengumuman', 'users', 'username', array('judul_seo' => $this->uri->segment(3)), 'id_pengumuman', 'DESC', 0, 1);

        $data['kategori'] = $this->model_utama->view('kategori');

        if ($query->num_rows() <= 0) {
            redirect('main');
        } else {
            $row = $query->row_array();
            $data['title'] = cetak($row['judul']);
            $data['description'] = cetak_meta($row['isi'], 0, 500);
            $data['keywords'] = cetak($row['judul']);
            $data['rows'] = $row;

            $dataa = array('dibaca' => $row['dibaca'] + 1);
            $where = array('id_pengumuman' => $row['id_pengumuman']);
            $this->model_utama->update('pengumuman', $dataa, $where);

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
            $this->template->load(template() . '/template', template() . '/detailpengumuman', $data);
        }
    }
}
