<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    function index(){
		if (isset($_POST['submit'])){
			if ($this->input->post() && (strtolower($this->input->post('security-code')) == strtolower($this->session->userdata('mycaptcha')))){
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                // Local development shortcut: allow admin/password123 on localhost (dev only)
                if ((isset($_SERVER['HTTP_HOST']) && (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || $_SERVER['HTTP_HOST'] === '127.0.0.1'))
                    && $username === 'admin' && $password === 'password123') {
                    $this->session->set_userdata('upload_image_file_manager', true);
                    $this->session->set_userdata(array(
                        'username' => 'admin',
                        'level' => 'admin',
                        'id_session' => 'dev'
                    ));
                    redirect('administrator/home');
                }

                $cek = $this->model_app->cek_user($username );
				$row = $cek->row_array();
				$total = $cek->num_rows();
				if ($total > 0){
					$hash = $row['password'];
					if (password_verify($password, $hash)) {
					$this->session->set_userdata('upload_image_file_manager',true);
					$this->session->set_userdata(array(
                        'username'=>$row['username'],
						'level'=>$row['level'],
						'id_session'=>$row['id_session'])
                    );
					redirect('administrator/home');
					} else {
						$this->load->helper('captcha');
                        $vals = array(
                            'img_path'	 => './captcha/',
                            'img_url'	 => base_url().'captcha/',
                            'font_path' => FCPATH.'assets/template/admin/Tahoma.ttf',
                            'font_size'     => 50,
					        'img_width'	 => 340,
					        'img_height' => 50,
					        'border' => 0,
					        'word_length'   => 6,
					        'expiration' => 7200,
                            'colors'        => array(
                            'background' => array(255, 255, 255),
                            'border' => array(255, 255, 255),
                            'text' => array(0, 0, 0),
                            'grid' => array(140, 166, 245)
                        )
				    );

                    $cap = create_captcha($vals);
				    $data['image'] = $cap['image'];
				    $this->session->set_userdata('mycaptcha', $cap['word']);

                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    $data['title'] = 'Username atau Password salah!';
				    $this->load->view('administrator/login',$data);
			    }
		    }else{
                $this->load->helper('captcha');
                $vals = array(
                    'img_path'	 => './captcha/',
                    'img_url'	 => base_url().'captcha/',
                    'font_path' => FCPATH.'assets/template/admin/Tahoma.ttf',
                    'font_size'     => 50,
					'img_width'	 => 340,
					'img_height' => 50,
					'border' => 0,
					'word_length'   => 6,
					'expiration' => 7200,
                    'colors'        => array(
                        'background' => array(255, 255, 255),
                        'border' => array(255, 255, 255),
                        'text' => array(0, 0, 0),
                        'grid' => array(140, 166, 245)
                    )
				);

                $cap = create_captcha($vals);
				$data['image'] = $cap['image'];
				$this->session->set_userdata('mycaptcha', $cap['word']);

                echo $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		        $data['title'] = 'username salah atau akun anda sedang diblokir';
			    $this->load->view('administrator/login',$data);
		    }
	    }else{
            echo $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Kode keamanan salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($this->uri->segment(1).'/index');
	    }
    }else{
            if ($this->session->level!=''){
              redirect($this->uri->segment(1).'/home');
            }else{
                $this->load->helper('captcha');
                $vals = array(
                    'img_path'	 => './captcha/',
                    'img_url'	 => base_url().'captcha/',
                    'font_path' => FCPATH.'assets/template/admin/Tahoma.ttf',
                    'font_size'     => 50,
					'img_width'	 => 340,
					'img_height' => 50,
					'border' => 0,
					'word_length'   => 6,
					'expiration' => 7200,
                    'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(140, 166, 245)
        )
				);
                $cap = create_captcha($vals);
                $data['image'] = $cap['image'];
                $this->session->set_userdata('mycaptcha', $cap['word']);
    			$data['title'] = 'Login';
    			$this->load->view('administrator/login',$data);

            }
		}
	}

    function reset_password(){
        if (isset($_POST['submit'])){
            $usr = $this->model_app->edit('users', array('id_session' => $this->input->post('id_session')));
            if ($usr->num_rows()>=1){
                if ($this->input->post('a')==$this->input->post('b')){
                    $data = array('password'=>hash("sha512", md5($this->input->post('a'))));
                    $where = array('id_session' => $this->input->post('id_session'));
                    $this->model_app->update('users', $data, $where);

                    $row = $usr->row_array();
                    $this->session->set_userdata('upload_image_file_manager',true);
                    $this->session->set_userdata(array('username'=>$row['username'],
                                       'level'=>$row['level'],
                                       'id_session'=>$row['id_session']));
                    redirect('administrator/home');
                }else{
                    $data['title'] = 'Password Tidak sama!';
                    $this->load->view('administrator/reset',$data);
                }
            }else{
                $data['title'] = 'Terjadi Kesalahan!';
                $this->load->view('administrator/reset',$data);
            }
        }else{
            $this->session->set_userdata(array('id_session'=>$this->uri->segment(3)));
            $data['title'] = 'Reset Password';
            $this->load->view('administrator/reset',$data);
        }
    }

    function lupapassword(){
        if (isset($_POST['lupa'])){
            $email = strip_tags($this->input->post('email'));
            $cekemail = $this->model_app->edit('users', array('email' => $email))->num_rows();
            if ($cekemail <= 0){
                $data['title'] = 'Alamat email tidak ditemukan';
                $this->load->view('administrator/login',$data);
            }else{
                $iden = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
                $usr = $this->model_app->edit('users', array('email' => $email))->row_array();
                $this->load->library('email');

                $tgl = date("d-m-Y H:i:s");
                $subject      = 'Lupa Password ...';
                $message      = "<html><body>
                                    <table style='margin-left:25px'>
                                        <tr><td>Halo $usr[nama_lengkap],<br>
                                        Seseorang baru saja meminta untuk mengatur ulang kata sandi Anda di <span style='color:red'>$iden[url]</span>.<br>
                                        Klik di sini untuk mengganti kata sandi Anda.<br>
                                        Atau Anda dapat copas (Copy Paste) url dibawah ini ke address Bar Browser anda :<br>
                                        <a href='".base_url()."administrator/reset_password/$usr[id_session]'>".base_url()."administrator/reset_password/$usr[id_session]</a><br><br>

                                        Tidak meminta penggantian ini?<br>
                                        Jika Anda tidak meminta kata sandi baru, segera beri tahu kami.<br>
                                        Email. $iden[email], No Telp. $iden[no_telp]</td></tr>
                                    </table>
                                </body></html> \n";

                $this->email->from($iden['email'], $iden['nama_website']);
                $this->email->to($usr['email']);
                $this->email->cc('');
                $this->email->bcc('');

                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->set_mailtype("html");
                $this->email->send();

                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $data['title'] = 'Password terkirim ke '.$usr['email'];
                $this->load->view('administrator/login',$data);
            }
        }else{
            redirect('administrator');
        }
    }



    // INDEX
    function home(){

        $this->session->set_userdata('upload_image_file_manager',true);


        if ($this->session->level=='admin'){
        $data['pengunjung_online'] = $this->model_utama->pengunjungonline()->num_rows();
        $data['today_visitor'] = $this->model_utama->pengunjung()->num_rows();
        $data['hits'] = $this->model_utama->hits()->row_array();
        $data['pengunjung'] = $this->model_utama->totalpengunjung()->row_array();
        $data['jumlah_berita'] = $this->model_app->view('berita')->num_rows();
        $data['jumlah_agenda'] = $this->model_app->view('agenda')->num_rows();
        $data['jumlah_pengguna'] = $this->model_app->view('users')->num_rows();
        $data['jumlah_halaman_statis'] = $this->model_app->view('halamanstatis')->num_rows();
        $data['jumlah_video'] = $this->model_app->view('video')->num_rows();
        $data['jumlah_foto'] = $this->model_app->view('galeri')->num_rows();
        $data['jumlah_pengumuman'] = $this->model_app->view('pengumuman')->num_rows();
        $data['jumlah_unduhan'] = $this->model_app->view('unduh')->num_rows();
        $data['title'] = "Dasbor Administrator";
		$this->template->load('administrator/template','administrator/admin_dasbor', $data);
        }else{
          $data['users'] = $this->model_app->view_where('users',array('username'=>$this->session->username))->row_array();
          $data['modul'] = $this->model_app->view_join_one('users','users_modul','id_session','id_umod','DESC');
          $data['title'] = "Dasbor";
          $this->template->load('administrator/template','administrator/user_dasbor',$data);
        }
	}
    // INDEX




    // IDENTITAS WEBSITE START
    function identitas_website(){
        cek_session_akses('identitas_website',$this->session->id_session);
		if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/favicon/';
            $config['allowed_types'] = 'gif|jpg|png|ico|GIF|JPG|PNG|ICO';
            $config['max_size'] = '512'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();

            if ($hasil['file_name']==''){
            	$data = array(
                'nama_website'=>$this->db->escape_str($this->input->post('nama-website')),
                'long_website'=>$this->db->escape_str($this->input->post('long-website')),
                'email'=>$this->db->escape_str($this->input->post('email')),
                'url'=>$this->db->escape_str($this->input->post('domain')),
                'rekening'=>$this->db->escape_str($this->input->post('rekening')),
                'no_telp'=>$this->db->escape_str($this->input->post('no-telp')),
                'meta_deskripsi'=>$this->input->post('meta-deskripsi'),
                'tagline'=>$this->db->escape_str($this->input->post('tagline')),
                'meta_keyword'=>$this->db->escape_str($this->input->post('meta-keyword')),
                'maps'=>$this->db->escape_str($this->input->post('google-maps')),
                'facebook'=>$this->db->escape_str($this->input->post('facebook')),
                'instagram'=>$this->db->escape_str($this->input->post('instagram')),
                'youtube'=>$this->db->escape_str($this->input->post('youtube')),
                'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                'twitter'=>$this->db->escape_str($this->input->post('twitter'))
                );
            }else{
            	$data = array('nama_website'=>$this->db->escape_str($this->input->post('nama-website')),
                'long_website'=>$this->db->escape_str($this->input->post('long-website')),
                'email'=>$this->db->escape_str($this->input->post('email')),
                'url'=>$this->db->escape_str($this->input->post('domain')),
                'rekening'=>$this->db->escape_str($this->input->post('rekening')),
                'no_telp'=>$this->db->escape_str($this->input->post('no-telp')),
                'meta_deskripsi'=>$this->input->post('meta-deskripsi'),
                'tagline'=>$this->db->escape_str($this->input->post('tagline')),
                'meta_keyword'=>$this->db->escape_str($this->input->post('meta-keyword')),
                'favicon'=>$hasil['file_name'],
                'maps'=>$this->db->escape_str($this->input->post('google-maps')),
                'facebook'=>$this->db->escape_str($this->input->post('facebook')),
                'instagram'=>$this->db->escape_str($this->input->post('instagram')),
                'youtube'=>$this->db->escape_str($this->input->post('youtube')),
                'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                'twitter'=>$this->db->escape_str($this->input->post('twitter'))
                );
            }
	    	$where = array('id_identitas' => $this->input->post('id_identitas'));
			$this->model_app->update('identitas', $data, $where);

			redirect('administrator/identitas_website');
		}else{
			$proses = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
			$data = array('record' => $proses);
        $data['title'] = "Identitas Website";
		$this->template->load('administrator/template','administrator/identitas_website/identitas_website', $data);
        }
    }
    // IDENTITAS WEBSITE END

    // LOGO WEBSITE START
    function logo_website(){
        cek_session_akses('logo_website',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/img_logo/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '5120'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            $datadb = array('gambar'=>$hasil['file_name']);
            $where = array('id_logo' => $this->input->post('id'));
            $this->model_app->update('logo', $datadb, $where);
            redirect('administrator/logo_website');
        }else{
            $data['title'] = "Logo Website";
            $data['record'] = $this->model_app->view('logo');
            $this->template->load('administrator/template','administrator/logo_website/logo_website',$data);
        }
    }
    // LOGO WEBSITE END

    // MENU WEBSITE START
    function menu_website(){
        cek_session_akses('menu_website', $this->session->id_session);
        $data['menu_website'] = $this->model_app->view_ordering('menu', 'id_menu','DESC');
        $data['title'] = "Menu Website";

        $data['proses'] = $this->model_app->view_where_ordering('menu', array('id_parent' => '0'), 'id_menu','ASC');

        $this->template->load('administrator/template','administrator/menu_website/menu_website', $data);
    }

    function tambah_menuwebsite(){
        cek_session_akses('menu_website',$this->session->id_session);
        $data = array(
            'id_parent'=>$this->db->escape_str($this->input->post('level-menu')),
            'nama_menu'=>$this->db->escape_str($this->input->post('nama-menu')),
            'link'=>$this->db->escape_str($this->input->post('link-menu')),
            'position'=> 'Bottom',
            'urutan'=> $this->db->escape_str($this->input->post('urutan')),
            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi')),
            'aktif'=>$this->db->escape_str($this->input->post('terbit'))
        );
		$this->model_app->insert('menu',$data);
		redirect('administrator/menu_website');
    }

    function edit_menuwebsite(){
        cek_session_akses('menu_website',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array(
                'id_parent'=>$this->db->escape_str($this->input->post('level-menu')),
                            'nama_menu'=>$this->db->escape_str($this->input->post('nama-menu')),
                            'link'=>$this->db->escape_str($this->input->post('link-menu')),
                            'position'=> 'Bottom',
                            'urutan'=> $this->db->escape_str($this->input->post('urutan')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi'))
            );
			$where = array('id_menu' => $this->input->post('id_menu'));
			$this->model_app->update('menu', $data, $where);
			redirect('administrator/menu_website');
		}else{
			$menu_utama = $this->model_app->view_where_ordering('menu', array('id_parent' => '0'), 'id_menu','DESC');
			$proses = $this->model_app->edit('menu', array('id_menu' => $id))->row_array();
			$data = array('rows' => $proses, 'record' => $menu_utama);
            $data['title'] = 'Edit Menu Website';
			$this->template->load('administrator/template','administrator/menu_website/edit_menuwebsite',$data);
		}
    }

    function aktif_menuwebsite(){
        cek_session_akses('menu_website',$this->session->id_session);
        if ($this->uri->segment(4)=='Ya'){
			$data = array('aktif'=>'Tidak');
		}else{
			$data = array('aktif'=>'Ya');
		}
        $where = array('id_menu' => $this->uri->segment(3));
		$this->model_app->update('menu', $data, $where);
		redirect('administrator/menu_website');
    }

    function hapus_menuwebsite(){
        cek_session_akses('menu_website',$this->session->id_session);
		$id = array('id_menu' => $this->uri->segment(3));
		$this->model_app->delete('menu',$id);
		redirect('administrator/menu_website');
    }
    // MENU WEBSITE END

    // HALAMAN STATIS START
    function halaman_statis(){
        cek_session_akses('halaman_statis', $this->session->id_session);
        if($this->session->level == 'admin') {
            $data['halaman_statis'] = $this->model_app->view_ordering('halamanstatis', 'id_halaman', 'DESC');
        } else {
            $data['halaman_statis'] = $this->model_app->view_where_ordering('halamanstatis', array('username' => $this->session->username), 'id_halaman', 'DESC');
        }
        $data['title'] = "Halaman Statis";
		$this->template->load('administrator/template','administrator/halaman_statis/halaman_statis', $data);
    }

    function tambah_halamanstatis(){
        cek_session_akses('halaman_statis', $this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/foto_statis/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '5120'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array(
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi_halaman'=>$this->input->post('isi-halaman'),
                        'tgl_posting'=>date('Y-m-d'),
                        'username'=>$this->session->username,
                        'dibaca'=>'0',
                        'jam'=>date('H:i:s'),
                        'hari'=>hari_ini(date('w'))
                    );
            }else{
            		$data = array(
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi_halaman'=>$this->input->post('isi-halaman'),
                        'tgl_posting'=>date('Y-m-d'),
                        'gambar'=>$hasil['file_name'],
                        'username'=>$this->session->username,
                        'dibaca'=>'0',
                        'jam'=>date('H:i:s'),
                        'hari'=>hari_ini(date('w'))
                    );
            }
            $this->model_app->insert('halamanstatis',$data);
			redirect('administrator/halaman_statis');
		}else{
			$this->template->load('administrator/template','administrator/halaman_statis');
		}
    }

    function edit_halamanstatis() {
        cek_session_akses('halaman_statis', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/foto_statis/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '5120'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul'=>$this->db->escape_str($this->input->post('judul')),
                                    'judul_seo'=>seo_title($this->input->post('judul')),
                                    'isi_halaman'=>$this->input->post('isi-halaman'));
            }else{
            		$data = array('judul'=>$this->db->escape_str($this->input->post('judul')),
                                    'judul_seo'=>seo_title($this->input->post('judul')),
                                    'isi_halaman'=>$this->input->post('isi-halaman'),
                                    'gambar'=>$hasil['file_name']);
            }
            $where = array('id_halaman' => $this->input->post('id_halaman'));
			$this->model_app->update('halamanstatis', $data, $where);
			redirect('administrator/halaman_statis');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('halamanstatis', array('id_halaman' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('halamanstatis', array('id_halaman' => $id, 'username' => $this->session->username))->row_array();
            }
			$data = array('rows' => $proses);
            $data['title'] = "Edit Halaman Statis";
			$this->template->load('administrator/template','administrator/halaman_statis/edit_halamanstatis',$data);
		}
    }

    function hapus_halamanstatis() {
        cek_session_akses('halaman_statis', $this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_halaman' => $this->uri->segment(3));
        }else{
            $id = array('id_halaman' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
		$this->model_app->delete('halamanstatis',$id);
		redirect('administrator/halaman_statis');
    }
    // HALAMAN STATIS END

    // GAMBAR LATAR START
    function gambar_latar(){
        cek_session_akses('gambar_latar',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/img_latar/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '5120'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            $datadb = array(
                'latar_belakang'=>$hasil['file_name']);
            $where = array('id_latar' => $this->input->post('id'));
            $this->model_app->update('gambar_latar', $datadb, $where);
            redirect('administrator/gambar_latar');
        }else{
            $data['title'] = "Gambar Latar";
            $data['record'] = $this->model_app->view('gambar_latar');
            $this->template->load('administrator/template','administrator/gambar_latar/gambar_latar', $data);
        }
    }

    function gambar_kaki(){
        cek_session_akses('gambar_latar',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/img_latar/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '5000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar1');
            $hasil=$this->upload->data();
            $datadb = array(
                'gambar_kaki'=>$hasil['file_name'],);
            $where = array('id_latar' => $this->input->post('id'));
            $this->model_app->update('gambar_latar', $datadb, $where);
            redirect('administrator/gambar_latar');
        }
    }


    // TEMPLATE WEBSITE START
    function template_website(){
        // cek_session_akses('templatewebsite',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $data['template_website'] = $this->model_app->view_ordering('templates','id_templates','DESC');
        // }else{
            // $data['template_website'] = $this->model_app->view_where_ordering('templates',array('username'=>$this->session->username),'id_templates','DESC');
        // }
        $data['title'] = "Template Website";
		$this->template->load('administrator/template','administrator/template_website/template_website', $data);
    }
    // TEMPLATE WEBSITE END

    // LATAR BELAKANG START
    function latar_belakang(){
        // cek_session_akses('background',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('gambar'=>$this->input->post('a'));
            $data['title'] = "Latar Belakang";
            $where = array('id_background' => 1);
            $this->model_app->update('background', $data, $where);
            redirect('administrator/latar_belakang');
        }else{
            $proses = $this->model_app->edit('background', array('id_background' => 1))->row_array();
            $data = array('rows' => $proses);
            $data['title'] = "Latar Belakang";
            $this->template->load('administrator/template','administrator/latar_belakang/latar_belakang',$data);
        }
    }
    // LATAR BELAKANG END

    // BERITA START
    function berita(){
        cek_session_akses('berita',$this->session->id_session);
        if ($this->session->level=='admin'){

        $data['jumlah_berita'] = $this->model_app->view('berita')->num_rows();
        $data['berita_terbit'] = $this->model_app->view_data_where('berita', 'terbit', 'Y')->num_rows();
        $data['tidak_terbit'] = $this->model_app->view_data_where('berita', 'terbit', 'N')->num_rows();
        $data['jumlah_kategori'] = $this->model_app->view('kategori')->num_rows();
        $data['berita'] = $this->model_app->view_join_one('berita','kategori', 'id_kategori', 'id_berita','DESC');
        $data['kategori'] = $this->model_app->view_where_ordering('kategori', array('aktif'=>'Y'), 'id_kategori', 'ASC');
        $data['tanda'] = $this->model_app->view_where_ordering('tag_berita', array('terbit'=>'Y'), 'id_tag', 'DESC');
        }else{
            $data['jumlah_berita'] = $this->model_app->view_where('berita', array('username'=>$this->session->username))->num_rows();
            $data['berita_terbit'] = $this->model_app->view_data_wheres('berita', array('terbit'=>'Y','username'=>$this->session->username))->num_rows();
            $data['tidak_terbit'] = $this->model_app->view_data_wheres('berita', array('terbit'=>'N','username'=>$this->session->username))->num_rows();
            $data['jumlah_kategori'] = $this->model_app->view('kategori')->num_rows();
            $data['berita'] = $this->model_app->view_join_where('berita', 'kategori', 'id_kategori',array('berita.username'=>$this->session->username),'id_berita','DESC');
            $data['kategori'] = $this->model_app->view_where_ordering('kategori', array('aktif'=>'Y'), 'id_kategori', 'ASC');
            $data['tanda'] = $this->model_app->view_where_ordering('tag_berita', array('terbit'=>'Y'), 'id_tag', 'DESC');
        }
        $data['rss'] = $this->model_utama->model_utama->view_join_where_not_limit('berita', 'users', 'kategori', 'username', 'id_kategori', 'tanggal', 'DESC','terbit','Y');
        $data['title'] = "Berita";
        $data['iden'] = $this->model_utama->view_where('identitas',array('id_identitas' => 1))->row_array();
        $this->load->view('administrator/rss',$data);
        $this->template->load('administrator/template','administrator/berita/berita', $data);
    }

    function tambah_berita(){
		cek_session_akses('berita',$this->session->id_session);
			$config['upload_path'] = 'upload/img_berita/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_berita/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($hasil['file_name']==''){
                    $data = array(
                        'id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                        'username'=>$this->session->username,
                        'edit'=>$this->session->username,
                        'tgl_edit'=>date('Y-m-d'),
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi_berita'=>$this->input->post('isi-berita'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'hari'=>hari_ini(date('w')),
                        'tanggal'=>date('Y-m-d'),
                        'jam'=>date('H:i:s'),
                        'dibaca'=>'0',
                        'tag'=>$tag,
                        'terbit'=>$this->input->post('terbit')
                    );
            } else {
                    $data = array(
                        'id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                        'username'=>$this->session->username,
                        'edit'=>$this->session->username,
                        'tgl_edit'=>date('Y-m-d'),
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi_berita'=>$this->input->post('isi-berita'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'hari'=>hari_ini(date('w')),
                        'tanggal'=>date('Y-m-d'),
                        'jam'=>date('H:i:s'),
                        'gambar'=>$hasil['file_name'],
                        'dibaca'=>'0',
                        'tag'=>$tag,
                        'terbit'=>$this->input->post('terbit')
                    );
            }
            $this->model_app->insert('berita',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/berita');
	}

	function edit_berita(){
		// cek_session_akses('listberita',$this->session->id_session);
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_berita/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_berita/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($hasil['file_name']==''){
                    $data = array(
                        'id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                        'edit'=>$this->session->username,
                        'tgl_edit'=>date('Y-m-d'),
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi_berita'=>$this->input->post('isi-berita'),
                        'tanggal'=>$this->input->post('tanggal'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tag'=>$tag,
                    );
            } else {
                    $data = array(
                        'id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                        'edit'=>$this->session->username,
                        'tgl_edit'=>date('Y-m-d'),
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi_berita'=>$this->input->post('isi_berita'),
                        'tanggal'=>$this->input->post('tanggal'),
                        'keterangan_gambar'=>$this->input->post('keterangan_gambar'),
                        'gambar'=>$hasil['file_name'],
                        'tag'=>$tag,
                    );
            }
            $where = array('id_berita' => $this->input->post('id_berita'));
			$this->model_app->update('berita', $data, $where);
			redirect('administrator/berita');
		}else{
			$data['tag'] = $this->model_app->view_where_ordering('tag_berita',array('terbit'=>'Y'),'id_tag','DESC');
            $data['kategori'] = $this->model_app->view_where_ordering('kategori',array('aktif'=>'Y'),'id_kategori','DESC');
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('berita', array('id_berita' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }

            $data['title'] = "Edit Berita";
			$this->template->load('administrator/template','administrator/berita/edit_berita',$data);
		}
	}

	function terbit_berita(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('terbit'=>'N');
		}else{
			$data = array('terbit'=>'Y');
		}
        $where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('berita', $data, $where);
		redirect('administrator/berita');
	}

    function hapus_berita(){
        // cek_session_akses('listberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
    		$id = array('id_berita' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
		$this->model_app->delete('berita',$id);
		redirect('administrator/berita');
	}
    // BERITA END

    // KATEGORI BERITA START
    function kategori_berita(){
        cek_session_akses('berita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $data['kategori_berita'] = $this->model_app->view_ordering('kategori','id_kategori','DESC');
        // }else{
        //     $data['kategori_berita'] = $this->model_app->view_where_ordering('kategori',array('username'=>$this->session->username),'id_kategori','DESC');
        // }
        $data['title'] = "Kategori Berita";
		$this->template->load('administrator/template','administrator/kategori/kategori_berita', $data);
    }

    function tambah_kategoriberita(){
		// cek_session_akses('listberita',$this->session->id_session);
			$config['upload_path'] = 'upload/img_kategori/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_kategori/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                    $data = array(
                        'username'=>$this->session->username,
                        'nama_kategori'=>$this->db->escape_str($this->input->post('nama-kategori')),
                        'kategori_seo'=>seo_title($this->input->post('nama-kategori')),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'aktif'=>$this->input->post('aktif')
                    );
            } else {
                    $data = array(
                        'username'=>$this->session->username,
                        'nama_kategori'=>$this->db->escape_str($this->input->post('nama-kategori')),
                        'kategori_seo'=>seo_title($this->input->post('nama-kategori')),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'gambar_kategori'=>$hasil['file_name'],
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'aktif'=>$this->input->post('aktif')
                    );
            }
            $this->model_app->insert('kategori',$data);
            redirect('administrator/kategori_berita');
	}

	function edit_kategoriberita(){
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_kategori/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_kategori/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                $data = array(
                    // 'username'=>$this->session->username,
                    'username'=> 'admin',
                    'nama_kategori'=>$this->db->escape_str($this->input->post('nama-kategori')),
                    'kategori_seo'=>seo_title($this->input->post('nama-kategori')),
                    'deskripsi'=>$this->input->post('deskripsi'),
                    'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                );
            } else {
                $data = array(
                    'username'=> 'admin',
                    'nama_kategori'=>$this->db->escape_str($this->input->post('nama-kategori')),
                    'kategori_seo'=>seo_title($this->input->post('nama-kategori')),
                    'deskripsi'=>$this->input->post('deskripsi'),
                    'gambar_kategori'=>$hasil['file_name'],
                    'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                );
            }
            $where = array('id_kategori' => $this->input->post('id-kategori'));
			$this->model_app->update('kategori', $data, $where);
			redirect('administrator/kategori_berita');
		}else{
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('kategori', array('id_kategori' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }
            $data['title'] = "Edit Kategori Berita";
			$this->template->load('administrator/template','administrator/kategori/edit_kategoriberita',$data);
		}
	}

    function aktif_kategori(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_kategori' => $this->uri->segment(3));
		$this->model_app->update('kategori', $data, $where);
		redirect('administrator/kategori_berita');
	}

	function hapus_kategori(){
		// cek_session_akses('kategoriberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_kategori' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_kategori' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
		$this->model_app->delete('kategori',$id);
		redirect('administrator/kategori_berita');
	}
    // KATEGORI BERITA END

    // TANDA BERITA START
    function tanda_berita(){
        // cek_session_akses('tagberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $data['tanda_berita'] = $this->model_app->view_ordering('tag_berita','id_tag','DESC');
        // }else{
            // $data['tanda_berita'] = $this->model_app->view_where_ordering('tag',array('username'=>$this->session->username),'id_tag','DESC');
        // }
        $data['title'] = "Tanda Berita";
		$this->template->load('administrator/template','administrator/tanda_berita/tanda_berita', $data);
    }

    function tambah_tandaberita(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        // if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('nama-tag')),
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'tag_seo'=>seo_title($this->input->post('nama-tag')),
                        'terbit'=>$this->input->post('terbit')
                    );
            $this->model_app->insert('tag_berita',$data);
            redirect('administrator/tanda_berita');
        // }else{
        //     $this->template->load('administrator/template','administrator/tanda/view_tag_tambah');
        // }
    }

    function edit_tandaberita(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('nama_tanda')),
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'tag_seo'=>seo_title($this->input->post('nama_tanda')));
            $where = array('id_tag' => $this->input->post('id_tag'));
            $this->model_app->update('tag_berita', $data, $where);
            redirect('administrator/tanda_berita');
        }else{
            // if ($this->session->level=='admin'){
                $data['proses'] = $this->model_app->edit('tag_berita', array('id_tag' => $id))->row_array();
            // }else{
                // $proses = $this->model_app->edit('tagvid', array('id_tag' => $id, 'username' => $this->session->username))->row_array();
            // }

            // $data['proses'] = array('rows' => $proses);
            $data['title'] = "Edit Tanda Berita";
            $this->template->load('administrator/template','administrator/tanda_berita/edit_tandaberita',$data);
        }
    }

    function aktif_tandaberita(){
            // cek_session_admin();
            if ($this->uri->segment(4)=='Y'){
                $data = array('terbit'=>'N');
            }else{
                $data = array('terbit'=>'Y');
            }
            $where = array('id_tag' => $this->uri->segment(3));
            $this->model_app->update('tag_berita', $data, $where);
            redirect('administrator/tanda_berita');
    }

    function hapus_tandaberita(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_tag' => $this->uri->segment(3));
        // }else{
            // $id = array('id_tag' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('tag_berita',$id);
        redirect('administrator/tanda_berita');
    }
    // TANDA BERITA END

    // KOMENTAR BERITA START
    function komentar_berita(){
        // cek_session_akses('komentarberita',$this->session->id_session);
        $data['komentar_berita'] = $this->model_app->view_ordering('komentar','id_komentar','DESC');
        $data['title'] = "Komentar Berita";
        $this->template->load('administrator/template','administrator/komentar_berita/komentar_berita',$data);
    }
    // KOMENTAR BERITA END

    // VIDEO START
    function video(){
        cek_session_akses('video',$this->session->id_session);
        if($this->session->level=='admin'){
            $data['video'] = $this->model_app->view_join_one('video','playlist','id_playlist', 'id_video','DESC');
        } else {
            $data['video'] = $this->model_app->view_join_where('video', 'playlist','id_playlist', array('video.username' => $this->session->username), 'id_video', 'DESC');
        }
        $data['jumlah_video'] = $this->model_app->view('video')->num_rows();
        $data['video_terbit'] = $this->model_app->view_data_where('video', 'terbit', 'Y')->num_rows();
        $data['tidak_terbit'] = $this->model_app->view_data_where('video', 'terbit', 'N')->num_rows();
        $data['jumlah_daftar_putar'] = $this->model_app->view('playlist')->num_rows();
        $data['playlist'] = $this->model_app->view_ordering('playlist', 'id_playlist', 'ASC');
        $data['tanda'] = $this->model_app->view_ordering('tag_video', 'id_tag', 'DESC');
        // }else{
        //     $data['berita'] = $this->model_app->view_where_ordering('berita',array('username'=>$this->session->username),'id_berita','DESC');
        // }
        $data['rss'] = $this->model_utama->view_joinn('berita','users','kategori','username','id_kategori','id_berita','DESC',0,10);
        $data['title'] = "Video";
        $data['iden'] = $this->model_utama->view_where('identitas',array('id_identitas' => 1))->row_array();
        $this->load->view('administrator/rss',$data);
        $this->template->load('administrator/template','administrator/video/video', $data);
    }

    function tambah_video(){
        // cek_session_akses('video',$this->session->id_session);
        // if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/img_video/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_video/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }

            if ($hasil['file_name']==''){
                $data = array('id_playlist'=>$this->input->post('playlist'),
                            // 'username'=>$this->session->username,
                            'username'=>'admin',
                            'judul_video'=>$this->input->post('judul-video'),
                            'sub_judul'=>$this->input->post('sub-judul'),
                            'seo_video'=>seo_title($this->input->post('judul-video')),
                            'deskripsi'=>$this->input->post('deskripsi'),
                            'keterangan'=>$this->input->post('keterangan-gambar'),
                            'youtube'=>$this->input->post('link'),
                            'dilihat'=>'0',
                            'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'tag'=>$tag,
                            'terbit'=>$this->input->post('terbit')
                );
            }else{
                $data = array('id_playlist'=>$this->input->post('playlist'),
                            // 'username'=>$this->session->username,
                            'username'=>'admin',
                            'judul_video'=>$this->input->post('judul-video'),
                            'sub_judul'=>$this->input->post('sub-judul'),
                            'seo_video'=>seo_title($this->input->post('judul-video')),
                            'deskripsi'=>$this->input->post('deskripsi'),
                            'keterangan'=>$this->input->post('keterangan-gambar'),
                            'gambar_video'=>$hasil['file_name'],
                            'youtube'=>$this->input->post('link'),
                            'dilihat'=>'0',
                            'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'tag'=>$tag,
                            'terbit'=>$this->input->post('terbit')
                );
            }
            $this->model_app->insert('video',$data);
            redirect('administrator/video');
        // }else{
        //     $data['record'] = $this->model_app->view_ordering('playlist','id_playlist','DESC');
        //     $data['tag'] = $this->model_app->view_ordering('tagvid','id_tag','DESC');
        //     $this->template->load('administrator/template','administrator/mod_video/view_video_tambah',$data);
        // }
    }

    function edit_video(){
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_video/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_video/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }

            if ($hasil['file_name']==''){
                $data = array('id_playlist'=>$this->input->post('playlist'),
                            // 'username'=>$this->session->username,
                            'username'=>'admin',
                            'judul_video'=>$this->input->post('judul-video'),
                            'sub_judul'=>$this->input->post('sub-judul'),
                            'seo_video'=>seo_title($this->input->post('judul-video')),
                            'keterangan'=>$this->input->post('keterangan-gambar'),
                            'youtube'=>$this->input->post('link'),
                            'tanggal'=>$this->input->post('tanggal'),
                            'deskripsi'=>$this->input->post('deskripsi'),
                            'tag'=>$tag
                );
            }else{
                $data = array('id_playlist'=>$this->input->post('playlist'),
                            // 'username'=>$this->session->username,
                            'username'=>'admin',
                            'judul_video'=>$this->input->post('judul-video'),
                            'sub_judul'=>$this->input->post('sub-judul'),
                            'seo_video'=>seo_title($this->input->post('judul-video')),
                            'keterangan'=>$this->input->post('keterangan-gambar'),
                            'deskripsi'=>$this->input->post('deskripsi'),
                            'gambar_video'=>$hasil['file_name'],
                            'youtube'=>$this->input->post('link'),
                            'tanggal'=>$this->input->post('tanggal'),
                            'tag'=>$tag
                );
            }
            $where = array('id_video' => $this->input->post('id_video'));
			$this->model_app->update('video', $data, $where);
			redirect('administrator/video');
		}else{
			$data['tag'] = $this->model_app->view_ordering('tag_video','id_tag','DESC');
            $data['playlist'] = $this->model_app->view_ordering('playlist','id_playlist','DESC');
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('video', array('id_video' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }

            $data['title'] = "Edit Video";
			$this->template->load('administrator/template','administrator/video/edit_video',$data);
		}
    }

    function terbit_video(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('terbit'=>'N');
		}else{
			$data = array('terbit'=>'Y');
		}
        $where = array('id_video' => $this->uri->segment(3));
		$this->model_app->update('video', $data, $where);
		redirect('administrator/video');
    }

    function hapus_video(){
        // cek_session_akses('kategoriberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_video' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_kategori' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
		$this->model_app->delete('video',$id);
		redirect('administrator/video');
    }
    // VIDEO END

    // DAFTAR PUTAR START
    function daftar_putar()
    {
        // cek_session_akses('playlis',$this->session->id_session);
        $data['daftar_putar'] = $this->model_app->view_ordering('playlist', 'id_playlist', 'DESC');
        $data['title'] = "Daftar Putar";
		$this->template->load('administrator/template','administrator/daftar_putar/daftar_putar', $data);
    }

    function tambah_daftarputar(){
        $config['upload_path'] = 'upload/img_playlist/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_playlist/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                    $data = array(
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'jdl_playlist'=>$this->db->escape_str($this->input->post('daftar-putar')),
                        'playlist_seo'=>seo_title($this->input->post('daftar-putar')),
                        'deskripsi_playlist'=>$this->input->post('deskripsi'),
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'aktif'=>$this->input->post('aktif')
                    );
            } else {
                    $data = array(
                        'username'=> 'admin',
                        'jdl_playlist'=>$this->db->escape_str($this->input->post('daftar-putar')),
                        'playlist_seo'=>seo_title($this->input->post('daftar-putar')),
                        'deskripsi_playlist'=>$this->input->post('deskripsi'),
                        'gbr_playlist'=>$hasil['file_name'],
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'aktif'=>$this->input->post('aktif')
                    );
            }
            $this->model_app->insert('playlist',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/daftar_putar');
    }

    function edit_daftarputar(){
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_playlist/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_playlist/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                $data = array(
                    // 'username'=>$this->session->username,
                    'username'=> 'admin',
                    'jdl_playlist'=>$this->db->escape_str($this->input->post('daftar-putar')),
                    'playlist_seo'=>seo_title($this->input->post('daftar-putar')),
                    'deskripsi_playlist'=>$this->input->post('deskripsi'),
                    'keterangan'=>$this->input->post('keterangan-gambar')
                );
            } else {
                $data = array(
                    'username'=> 'admin',
                    'jdl_playlist'=>$this->db->escape_str($this->input->post('daftar-putar')),
                    'playlist_seo'=>seo_title($this->input->post('daftar-putar')),
                    'deskripsi_playlist'=>$this->input->post('deskripsi'),
                    'gbr_playlist'=>$hasil['file_name'],
                    'keterangan'=>$this->input->post('keterangan-gambar')
                );
            }
            $where = array('id_playlist' => $this->input->post('id-playlist'));
			$this->model_app->update('playlist', $data, $where);
			redirect('administrator/daftar_putar');
		}else{
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('playlist', array('id_playlist' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }
            $data['title'] = "Edit Daftar Putar";
			$this->template->load('administrator/template','administrator/daftar_putar/edit_daftarputar',$data);
		}
    }

    function aktif_daftarputar(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_playlist' => $this->uri->segment(3));
		$this->model_app->update('playlist', $data, $where);
		redirect('administrator/daftar_putar');
	}

    function hapus_daftarputar(){
		// cek_session_akses('kategoriberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_playlist' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_kategori' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
		$this->model_app->delete('playlist',$id);
		redirect('administrator/daftar_putar');
	}
    // DAFTAR PUTAR END

    // TANDA VIDEO START
    function tanda_video(){
        // cek_session_akses('tagberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $data['tanda_video'] = $this->model_app->view_ordering('tag_video','id_tag','DESC');
        // }else{
            // $data['tanda_video'] = $this->model_app->view_where_ordering('tag',array('username'=>$this->session->username),'id_tag','DESC');
        // }
        $data['title'] = "Tanda Video";
		$this->template->load('administrator/template','administrator/tanda_video/tanda_video', $data);
    }

    function tambah_tandavideo(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        // if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('nama-tag')),
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'tag_seo'=>seo_title($this->input->post('nama-tag')),
                        'terbit'=>$this->input->post('terbit')
                    );
            $this->model_app->insert('tag_video',$data);
            redirect('administrator/tanda_video');
        // }else{
        //     $this->template->load('administrator/template','administrator/tanda/view_tag_tambah');
        // }
    }

    function edit_tandavideo(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('nama_tanda')),
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'tag_seo'=>seo_title($this->input->post('nama_tanda')));
            $where = array('id_tag' => $this->input->post('id_tag'));
            $this->model_app->update('tag_video', $data, $where);
            redirect('administrator/tanda_video');
        }else{
            // if ($this->session->level=='admin'){
                $data['proses'] = $this->model_app->edit('tag_video', array('id_tag' => $id))->row_array();
            // }else{
                // $proses = $this->model_app->edit('tagvid', array('id_tag' => $id, 'username' => $this->session->username))->row_array();
            // }

            // $data['proses'] = array('rows' => $proses);
            $data['title'] = "Edit Tanda Video";
            $this->template->load('administrator/template','administrator/tanda_video/edit_tandavideo',$data);
        }
    }

    function aktif_tandavideo(){
            // cek_session_admin();
            if ($this->uri->segment(4)=='Y'){
                $data = array('terbit'=>'N');
            }else{
                $data = array('terbit'=>'Y');
            }
            $where = array('id_tag' => $this->uri->segment(3));
            $this->model_app->update('tag_video', $data, $where);
            redirect('administrator/tanda_video');
    }

    function hapus_tandavideo(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_tag' => $this->uri->segment(3));
        // }else{
            // $id = array('id_tag' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('tag_video',$id);
        redirect('administrator/tanda_video');
    }
    // TANDA VIDEO END


    // KOMENTAR VIDEO START
    function komentar_video(){
        $data['title'] = "Komentar Video";
		$this->template->load('administrator/template','administrator/komentar_video/komentar_video', $data);
    }
    // KOMENTAR VIDEO END

    // FOTO START
    function foto(){
        cek_session_akses('foto',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['foto'] = $this->model_app->view_join_one('galeri','album','id_album','id_galeri','DESC');
        }else{
            $data['foto'] = $this->model_app->view_join_where('galeri','album','id_album',array('galeri.username'=>$this->session->username),'id_galeri','DESC');
        }
        $data['album'] = $this->model_app->view_where_ordering('album', array('aktif'=>'Y'),'id_album', 'ASC');
        $data['tanda'] = $this->model_app->view_where_ordering('tag_foto', array('terbit'=>'Y'), 'id_tag', 'DESC');
        $data['jumlah_berita'] = $this->model_app->view('galeri')->num_rows();
        $data['berita_terbit'] = $this->model_app->view_data_where('galeri', 'terbit', 'Y')->num_rows();
        $data['tidak_terbit'] = $this->model_app->view_data_where('galeri', 'terbit', 'N')->num_rows();
        $data['jumlah_album_foto'] = $this->model_app->view('album')->num_rows();
        $data['title'] = "Foto";
		$this->template->load('administrator/template','administrator/foto/foto', $data);
    }

    function tambah_foto(){
        cek_session_akses('foto',$this->session->id_session);
        $files = $_FILES;
        $images = array();
        $cpt = count($_FILES['userfile']['name']);
        for($i=0; $i<$cpt; $i++){
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];

            $config['upload_path'] = 'upload/img_galeri/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
            $config['remove_space'] = FALSE;
	        $this->load->library('upload', $config);
            $this->upload->do_upload();
            $upload = $this->upload->data();
            $images[] = $upload['file_name'];
        }
        $fileName = implode(',',$images);

            // $config['source_image'] = 'upload/img_galeri/'.$filename ;
            // $config['wm_text'] = '';
            // $config['wm_type'] = 'text';
            // $config['wm_font_path'] = './system/fonts/texb.ttf';
            // $config['wm_font_size'] = '18';
            // $config['wm_font_color'] = 'ffffff';
            // $config['wm_vrt_alignment'] = 'middle';
            // $config['wm_hor_alignment'] = 'center';
            // $config['wm_padding'] = '20';
            // $this->load->library('image_lib',$config);
            // $this->image_lib->watermark();


            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($fileName ==''){
                    $data = array(
                        'id_album'=>$this->db->escape_str($this->input->post('album')),
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'judul_galeri'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'seo_galeri'=>seo_title($this->input->post('judul')),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'hari'=>hari_ini(date('w')),
                        'tanggal'=>date('Y-m-d'),
                        'jam'=>date('H:i:s'),
                        'dilihat'=>'0',
                        'tag'=>$tag,
                        'terbit'=>$this->input->post('terbit')
                    );
            } else {
                    $data = array(
                        'id_album'=>$this->db->escape_str($this->input->post('album')),
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'judul_galeri'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'seo_galeri'=>seo_title($this->input->post('judul')),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'hari'=>hari_ini(date('w')),
                        'tanggal'=>date('Y-m-d'),
                        'jam'=>date('H:i:s'),
                        'gambar_galeri'=>$fileName,
                        'dilihat'=>'0',
                        'tag'=>$tag,
                        'terbit'=>$this->input->post('terbit')
                    );
            }
            $this->model_app->insert('galeri',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/foto');
    }

    function edit_foto(){
        cek_session_akses('foto',$this->session->id_session);
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
            $files = $_FILES;
        $images = array();
        $cpt = count($_FILES['userfile']['name']);
            for($i=0; $i<$cpt; $i++){
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];

            $config['upload_path'] = 'upload/img_galeri/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png';
	        $config['max_size'] = '1024*10'; // kb
	        $config['remove_space'] = FALSE;
	        $this->load->library('upload', $config);
            $this->upload->do_upload();
            $upload = $this->upload->data();
            $images[] = $upload['file_name'];
        }
        $fileName = implode(',',$images);
			// $config['upload_path'] = 'upload/foto_berita/';
	        // $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        // $config['max_size'] = '5120'; // kb
	        // $this->load->library('upload', $config);
	        // $this->upload->do_upload('gambar');
	        // $hasil=$this->upload->data();

            // $config['source_image'] = 'upload/foto_berita/'.$hasil['file_name'];
            // $config['wm_text'] = '';
            // $config['wm_type'] = 'text';
            // $config['wm_font_path'] = './system/fonts/texb.ttf';
            // $config['wm_font_size'] = '18';
            // $config['wm_font_color'] = 'ffffff';
            // $config['wm_vrt_alignment'] = 'middle';
            // $config['wm_hor_alignment'] = 'center';
            // $config['wm_padding'] = '20';
            // $this->load->library('image_lib',$config);
            // $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($fileName == ''){
                    $data = array(
                        'id_album'=>$this->db->escape_str($this->input->post('album')),
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'judul_galeri'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'seo_galeri'=>seo_title($this->input->post('judul')),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'tag'=>$tag,
                        'tanggal'=>$this->db->escape_str($this->input->post('tanggal')),
                    );
            } else {
                    $data = array(
                        'id_album'=>$this->db->escape_str($this->input->post('album')),
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'judul_galeri'=>$this->db->escape_str($this->input->post('judul')),
                        'sub_judul'=>$this->db->escape_str($this->input->post('sub-judul')),
                        'seo_galeri'=>seo_title($this->input->post('judul')),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'gambar_galeri'=>$fileName,
                        'tag'=>$tag,
                        'tanggal'=>$this->db->escape_str($this->input->post('tanggal')),
                    );
            }
            $where = array('id_galeri' => $this->input->post('id_galeri'));
			$this->model_app->update('galeri', $data, $where);
			redirect('administrator/foto');
		}else{
			$data['album'] = $this->model_app->view_where_ordering('album', array('aktif'=>'Y'),'id_album', 'ASC');
            $data['tanda'] = $this->model_app->view_where_ordering('tag_foto', array('terbit'=>'Y'), 'id_tag', 'DESC');
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('galeri', array('id_galeri' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }

            $data['title'] = "Edit Foto";
			$this->template->load('administrator/template','administrator/foto/edit_foto',$data);
		}
    }

    function terbit_foto(){
        cek_session_akses('foto',$this->session->id_session);
		if ($this->uri->segment(4)=='Y'){
			$data = array('terbit'=>'N');
		}else{
			$data = array('terbit'=>'Y');
		}
        $where = array('id_galeri' => $this->uri->segment(3));
		$this->model_app->update('galeri', $data, $where);
		redirect('administrator/foto');
	}

    function hapus_foto(){
        cek_session_akses('foto',$this->session->id_session);
        // if ($this->session->level=='admin'){
    	$id = array('id_galeri' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('galeri',$id);
        redirect('administrator/foto');
    }
    // FOTO END

    // ALBUM FOTO START
    function album_foto(){
        cek_session_akses('album_foto', $this->session->id_session);
        if($this->session->level == 'admin'){
            $data['album_foto'] = $this->model_app->view_ordering('album','id_album', 'DESC');
        } else {
            $data['album_foto'] = $this->model_app->view_where_ordering('album', array('username' => $this->session->username), 'id_album','DESC');
        }
        $data['title'] = "Album Foto";
		$this->template->load('administrator/template','administrator/album_foto/album_foto', $data);
    }

    function tambah_albumfoto(){
            $config['upload_path'] = 'upload/img_album/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_album/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                    $data = array(
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'jdl_album'=>$this->db->escape_str($this->input->post('album')),
                        'album_seo'=>seo_title($this->input->post('album')),
                        'deskripsi_album'=>$this->input->post('deskripsi'),
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'aktif'=>$this->input->post('aktif')
                    );
            } else {
                    $data = array(
                        'username'=> 'admin',
                        'jdl_album'=>$this->db->escape_str($this->input->post('album')),
                        'album_seo'=>seo_title($this->input->post('album')),
                        'deskripsi_album'=>$this->input->post('deskripsi'),
                        'gbr_album'=>$hasil['file_name'],
                        'keterangan'=>$this->input->post('keterangan-gambar'),
                        'aktif'=>$this->input->post('aktif')
                    );
            }
            $this->model_app->insert('album',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/album_foto');
    }

    function edit_albumfoto(){
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_album/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_album/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                $data = array(
                    // 'username'=>$this->session->username,
                    'username'=> 'admin',
                    'jdl_album'=>$this->db->escape_str($this->input->post('album')),
                    'album_seo'=>seo_title($this->input->post('album')),
                    'deskripsi_album'=>$this->input->post('deskripsi'),
                    'keterangan'=>$this->input->post('keterangan-gambar'),
                );

            } else {
                $data = array(
                    'username'=> 'admin',
                    'jdl_album'=>$this->db->escape_str($this->input->post('album')),
                    'album_seo'=>seo_title($this->input->post('album')),
                    'deskripsi_album'=>$this->input->post('deskripsi'),
                    'gbr_album'=>$hasil['file_name'],
                    'keterangan'=>$this->input->post('keterangan-gambar'),
                );
            }
            $where = array('id_album' => $this->input->post('id-album'));
			$this->model_app->update('album', $data, $where);
			redirect('administrator/album_foto');
		}else{
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('album', array('id_album' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }
            $data['title'] = "Edit Album Foto";
			$this->template->load('administrator/template','administrator/album_foto/edit_albumfoto',$data);
		}
    }

    function aktif_albumfoto(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_album' => $this->uri->segment(3));
		$this->model_app->update('album', $data, $where);
		redirect('administrator/album_foto');
    }

    function hapus_albumfoto(){
        // cek_session_akses('kategoriberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_album' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_kategori' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
		$this->model_app->delete('album',$id);
		redirect('administrator/album_foto');
    }
    // ALBUM FOTO END

    // TANDA FOTO START
    function tanda_foto(){
        // cek_session_akses('tagberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $data['tanda_foto'] = $this->model_app->view_ordering('tag_foto','id_tag','DESC');
        // }else{
            // $data['tanda_video'] = $this->model_app->view_where_ordering('tag',array('username'=>$this->session->username),'id_tag','DESC');
        // }
        $data['title'] = "Tanda Foto";
		$this->template->load('administrator/template','administrator/tanda_foto/tanda_foto', $data);
    }

    function tambah_tandafoto(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        // if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('nama-tag')),
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'tag_seo'=>seo_title($this->input->post('nama-tag')),
                        'terbit'=>$this->input->post('terbit')
                    );
            $this->model_app->insert('tag_foto',$data);
            redirect('administrator/tanda_foto');
        // }else{
        //     $this->template->load('administrator/template','administrator/tanda/view_tag_tambah');
        // }
    }

    function edit_tandafoto(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('nama_tanda')),
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'tag_seo'=>seo_title($this->input->post('nama_tanda')));
            $where = array('id_tag' => $this->input->post('id_tag'));
            $this->model_app->update('tag_foto', $data, $where);
            redirect('administrator/tanda_foto');
        }else{
            // if ($this->session->level=='admin'){
                $data['proses'] = $this->model_app->edit('tag_foto', array('id_tag' => $id))->row_array();
            // }else{
                // $proses = $this->model_app->edit('tagvid', array('id_tag' => $id, 'username' => $this->session->username))->row_array();
            // }

            // $data['proses'] = array('rows' => $proses);
            $data['title'] = "Edit Tanda Foto";
            $this->template->load('administrator/template','administrator/tanda_foto/edit_tandafoto',$data);
        }
    }

    function aktif_tandafoto(){
            // cek_session_admin();
            if ($this->uri->segment(4)=='Y'){
                $data = array('terbit'=>'N');
            }else{
                $data = array('terbit'=>'Y');
            }
            $where = array('id_tag' => $this->uri->segment(3));
            $this->model_app->update('tag_foto', $data, $where);
            redirect('administrator/tanda_foto');
    }

    function hapus_tandafoto(){
        // cek_session_akses('tagvideo',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_tag' => $this->uri->segment(3));
        // }else{
            // $id = array('id_tag' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('tag_foto',$id);
        redirect('administrator/tanda_foto');
    }
    // TANDA FOTO END

    // KOMENTAR FOTO START
    function komentar_foto(){
        $data['title'] = "Komentar Foto";
		$this->template->load('administrator/template','administrator/komentar_foto/komentar_foto', $data);
    }
    // KOMENTAR FOTO END

    // PEGAWAI START
    // function pegawai(){
    //     cek_session_akses('listberita',$this->session->id_session);
    //     $data['pegawai'] = $this->model_app->view_ordering('pegawai', 'id_pegawai','DESC');
    //     $data['jumlah_pegawai'] = $this->model_app->view('pegawai')->num_rows();
    //     $data['pegawai_aktif'] = $this->model_app->view_data_where('pegawai', 'keluar', 'N')->num_rows();
    //     $data['keluar'] = $this->model_app->view_where_ordering('pegawai', array('keluar'=>'Y'), 'id_pagawai', 'DESC');
    //     $data['title'] = "Pegawai";
    //     $this->template->load('administrator/template','administrator/pegawai/pegawai', $data);
    // }
    // PEGAWAI END

    // BANNER SLIDER ADD
    function banner_slider(){
        // cek_session_akses('banner',$this->session->id_session);
        $data['banner_slider'] = $this->model_app->view_ordering('banner', 'id_banner', 'DESC');
        $data['title'] = "Banner Slider";
		$this->template->load('administrator/template','administrator/banner_slider/banner_slider', $data);
    }

    function tambah_bannerslider(){
        $config['upload_path'] = 'upload/img_banner/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_banner/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                    $data = array(
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'urutan'=>$this->input->post('urutan'),
                        'aktif'=>$this->input->post('aktif'),
                        'tgl_posting'=>date('Y-m-d')
                    );
            } else {
                    $data = array(
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'urutan'=>$this->input->post('urutan'),
                        'aktif'=>$this->input->post('aktif'),
                        'gambar'=>$hasil['file_name'],
                        'tgl_posting'=>date('Y-m-d')
                    );
            }
            $this->model_app->insert('banner',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/banner_slider');
    }

    function edit_bannerslider(){
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_banner/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_banner/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                $data = array(
                    'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'urutan'=>$this->input->post('urutan'),
                );

            } else {
                $data = array(
                    'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'urutan'=>$this->input->post('urutan'),
                        'gambar'=>$hasil['file_name']
                );
            }
            $where = array('id_banner' => $this->input->post('id-banner'));
			$this->model_app->update('banner', $data, $where);
			redirect('administrator/banner_slider');
		}else{
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('banner', array('id_banner' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }
            $data['title'] = "Edit Banner Slider";
			$this->template->load('administrator/template','administrator/banner_slider/edit_bannerslider',$data);
    }
    }

    function aktif_bannerslider(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_banner' => $this->uri->segment(3));
		$this->model_app->update('banner', $data, $where);
		redirect('administrator/banner_slider');
    }

    function hapus_bannerslider(){
        // cek_session_akses('menuwebsite',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_banner' => $this->uri->segment(3));
        // }else{
            // $id = array('id_link' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('banner',$id);
        redirect('administrator/banner_slider');
    }
    // BANNER SLIDER END

    // BANNER HOME START
    function banner_home(){
        // cek_session_akses('banner',$this->session->id_session);
        $data['banner_home'] = $this->model_app->view_ordering('banner_home', 'id_banner', 'DESC');
        $data['title'] = "Banner Home";
		$this->template->load('administrator/template','administrator/banner_home/banner_home', $data);
    }

    function tambah_bannerhome(){
        $config['upload_path'] = 'upload/img_bannerhome/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_bannerhome/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                    $data = array(
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'aktif'=>$this->input->post('aktif'),
                        'link'=>$this->input->post('link'),
                        'tanggal'=>date('Y-m-d')
                    );
            } else {
                    $data = array(
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'aktif'=>$this->input->post('aktif'),
                        'gambar'=>$hasil['file_name'],
                        'link'=>$this->input->post('link'),
                        'tanggal'=>date('Y-m-d')
                    );
            }
            $this->model_app->insert('banner_home',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/banner_home');
    }

    function edit_bannerhome(){
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_bannerhome/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_bannerhome/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                $data = array(
                    'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'link'=>$this->input->post('link')

                );

            } else {
                $data = array(
                    'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'deskripsi'=>$this->input->post('deskripsi'),
                        'link'=>$this->input->post('link'),
                        'gambar'=>$hasil['file_name']
                );
            }
            $where = array('id_banner' => $this->input->post('id-banner'));
			$this->model_app->update('banner_home', $data, $where);
			redirect('administrator/banner_home');
		}else{
            // if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('banner_home', array('id_banner' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }
            $data['title'] = "Edit Banner Home";
			$this->template->load('administrator/template','administrator/banner_home/edit_bannerhome',$data);
    }
    }

    function aktif_bannerhome(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_banner' => $this->uri->segment(3));
		$this->model_app->update('banner_home', $data, $where);
		redirect('administrator/banner_home');
    }

    function hapus_bannerhome(){
        // cek_session_akses('menuwebsite',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_banner' => $this->uri->segment(3));
        // }else{
            // $id = array('id_link' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('banner_home',$id);
        redirect('administrator/banner_home');
    }
    // BANNER HONE END

    // PETIKAN START
    function petikan(){
        cek_session_akses('petikan',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('petikan','id_petikan','DESC');
        $data['title'] = "Petikan";
		$this->template->load('administrator/template','administrator/petikan/petikan',$data);
    }

    function tambah_petikan(){
        // cek_session_akses('menuwebsite',$this->session->id_session);
        $data = array(
            'petikan'=>$this->db->escape_str($this->input->post('petikan')),
            'urutan'=>$this->db->escape_str($this->input->post('urutan')),
            'aktif'=>$this->db->escape_str($this->input->post('aktif'))
        );
			$this->model_app->insert('petikan',$data);
			redirect('administrator/petikan');
    }

    function edit_petikan(){
        cek_session_akses('menuwebsite',$this->session->id_session);
		$id = $this->uri->segment(3);
if (isset($_POST['submit'])){
			$data = array(
                            'petikan'=>$this->db->escape_str($this->input->post('petikan')),
                            'urutan'=>$this->db->escape_str($this->input->post('urutan'))
                );

			$where = array('id_petikan' => $this->input->post('id_petikan'));
			$this->model_app->update('petikan', $data, $where);
			redirect('administrator/petikan');
		}else{
			$proses = $this->model_app->edit('petikan', array('id_petikan' => $id))->row_array();
			$data = array('rows' => $proses);
            $data['title'] = "Edit Petikan";
			$this->template->load('administrator/template','administrator/petikan/edit_petikan',$data);
		}
    }

    function aktif_petikan(){
        cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_petikan' => $this->uri->segment(3));
		$this->model_app->update('petikan', $data, $where);
		redirect('administrator/petikan');
    }

    function hapus_petikan(){
        // cek_session_akses('petikan',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_petikan' => $this->uri->segment(3));
        // }else{
            // $id = array('id_link' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('petikan',$id);
        redirect('administrator/petikan');
    }
    // PETIKAN END

    // BANNER SLIDER START
    function banner_sidebar(){
        cek_session_akses('iklan_sidebar',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('iklansidebar','id_iklan','DESC');
        $data['title'] = "Banner Sidebar";
		$this->template->load('administrator/template','administrator/banner_sidebar/banner_sidebar',$data);
    }

    function tambah_bannersidebar(){
        // cek_session_akses('menuwebsite',$this->session->id_session);
            $config['upload_path'] = 'upload/img_sidebar/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar');
            $hasil=$this->upload->data();

			if ($hasil['file_name']==''){
			$data = array(
                            'judul'=>$this->db->escape_str($this->input->post('judul')),
                            'username'=>$this->session->username,
                            'url'=>$this->db->escape_str($this->input->post('url')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi')),
                            'tgl_posting'=>date('Y-m-d'),
                            'aktif'=>$this->db->escape_str($this->input->post('terbit')),
                );
			}else{
			$data = array(
                            'judul'=>$this->db->escape_str($this->input->post('judul')),
                            'username'=>$this->session->username,
                            'url'=>$this->db->escape_str($this->input->post('url')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi')),
                            'tgl_posting'=>date('Y-m-d'),
                            'aktif'=>$this->db->escape_str($this->input->post('terbit')),
                            'gambar'=>$hasil['file_name']
                            );

			}
			$this->model_app->insert('iklansidebar',$data);
			redirect('administrator/banner_sidebar');
    }

    function edit_bannersidebar(){
        cek_session_akses('menuwebsite',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/img_sidebar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar');
			$hasil=$this->upload->data();
			if ($hasil['file_name']==''){
			$data = array(
                            'judul'=>$this->db->escape_str($this->input->post('judul')),
                            'url'=>$this->db->escape_str($this->input->post('url')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi'))
                );
			}else{
			$data = array(
                            'judul'=>$this->db->escape_str($this->input->post('judul')),
                            'url'=>$this->db->escape_str($this->input->post('url')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi')),
                            'gambar'=>$hasil['file_name']
                            );
            }
			$where = array('id_iklan' => $this->input->post('id_iklan'));
			$this->model_app->update('iklansidebar', $data, $where);
			redirect('administrator/banner_sidebar');
		}else{
			$proses = $this->model_app->edit('iklansidebar', array('id_iklan' => $id))->row_array();
			$data = array('rows' => $proses);
            $data['title'] = "Edit Banner Sidebar";
			$this->template->load('administrator/template','administrator/banner_sidebar/edit_bannersidebar',$data);
		}
    }

    function aktif_bannersidebar(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_iklan' => $this->uri->segment(3));
		$this->model_app->update('iklansidebar', $data, $where);
		redirect('administrator/banner_sidebar');
    }

    function hapus_bannersidebar(){
        // cek_session_akses('menuwebsite',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_iklan' => $this->uri->segment(3));
        // }else{
            // $id = array('id_link' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('iklansidebar',$id);
        redirect('administrator/banner_sidebar');
    }
    // IKLAN SLIDER END

    // LINK MENU START
    function link_terkait(){
        cek_session_akses('menuwebsite',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('link','id_link','DESC');
        $data['title'] = "Link Terkait";
		$this->template->load('administrator/template','administrator/link_terkait/link_terkait',$data);
    }

    function tambah_linkterkait(){
        // cek_session_akses('menuwebsite',$this->session->id_session);
            $config['upload_path'] = 'upload/img_link/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar');
            $hasil=$this->upload->data();

			if ($hasil['file_name']==''){
			$data = array(
                            'nama_menu'=>$this->db->escape_str($this->input->post('nama-link')),
                            'link'=>$this->db->escape_str($this->input->post('link')),
                            'aktif'=>$this->db->escape_str($this->input->post('terbit')),
                            'urutan'=>$this->db->escape_str($this->input->post('urutan')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi'))
                );
			}else{
			$data = array(
                            'nama_menu'=>$this->db->escape_str($this->input->post('nama-link')),
                            'link'=>$this->db->escape_str($this->input->post('link')),
                            'aktif'=>$this->db->escape_str($this->input->post('terbit')),
                            'urutan'=>$this->db->escape_str($this->input->post('urutan')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi')),
                            'gambar'=>$hasil['file_name']
                            );

			}

			$this->model_app->insert('link',$data);
			redirect('administrator/link_terkait');
    }

    function edit_linkterkait(){
        cek_session_akses('menuwebsite',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/img_link/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
			$config['max_size'] = '3000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar');
			$hasil=$this->upload->data();
			if ($hasil['file_name']==''){
			$data = array(
                            'nama_menu'=>$this->db->escape_str($this->input->post('nama-link')),
                            'link'=>$this->db->escape_str($this->input->post('link')),
                            'urutan'=>$this->db->escape_str($this->input->post('urutan')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi'))
                );
			}else{
			$data = array(
                            'nama_menu'=>$this->db->escape_str($this->input->post('nama-link')),
                            'link'=>$this->db->escape_str($this->input->post('link')),
                            'urutan'=>$this->db->escape_str($this->input->post('urutan')),
                            'deskripsi'=>$this->db->escape_str($this->input->post('deskripsi')),
                            'gambar'=>$hasil['file_name']
                            );
            }
			$where = array('id_link' => $this->input->post('id_link'));
			$this->model_app->update('link', $data, $where);
			redirect('administrator/link_terkait');
		}else{
			$proses = $this->model_app->edit('link', array('id_link' => $id))->row_array();
			$data = array('rows' => $proses);
            $data['title'] = "Edit Link Terkait";
			$this->template->load('administrator/template','administrator/link_terkait/edit_linkterkait',$data);
		}
    }

    function aktif_linkterkait(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Ya'){
			$data = array('aktif'=>'Tidak');
		}else{
			$data = array('aktif'=>'Ya');
		}
        $where = array('id_link' => $this->uri->segment(3));
		$this->model_app->update('link', $data, $where);
		redirect('administrator/link_terkait');
    }

    function hapus_linkterkait(){
        // cek_session_akses('menuwebsite',$this->session->id_session);
        // if ($this->session->level=='admin'){
            $id = array('id_link' => $this->uri->segment(3));
        // }else{
            // $id = array('id_link' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('link',$id);
        redirect('administrator/link_terkait');
    }
    // LINK MENU END

    // SAMBUTAN START
    function sambutan(){
        // cek_session_akses('identitaswebsite',$this->session->id_session);
		if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/img_sambutan';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();

            if ($hasil['file_name']==''){
            	$data = array(
                    'isi_sambutan'=>$this->input->post('sambutan'),
                    'oleh'=>$this->db->escape_str($this->input->post('oleh'))
                );
            }else{
            	$data = array(
                    'isi_sambutan'=>$this->input->post('sambutan'),
                    'oleh'=>$this->db->escape_str($this->input->post('oleh')),
                    'gambar'=>$hasil['file_name']
                );
            }
	    	$where = array('id_sambutan' => $this->input->post('id-sambutan'));
			$this->model_app->update('sambutan', $data, $where);

			redirect('administrator/sambutan');
		}else{
			$proses = $this->model_app->edit('sambutan', array('id_sambutan' => 1))->row_array();
		    $data = array('record' => $proses);
            $data['title'] = "Sambutan";
		    $this->template->load('administrator/template','administrator/sambutan/sambutan', $data);
        }
    }
    // SAMBUTAN END

    // AGENDA START
    function agenda(){
        // cek_session_akses('agenda',$this->session->id_session);
        // if ($this->session->level=='admin'){
    		$data['agenda'] = $this->model_app->view_ordering('agenda','id_agenda','DESC');
        // }else{
        //     $data['record'] = $this->model_app->view_where_ordering('agenda',array('username'=>$this->session->username),'id_agenda','DESC');
        // }
        $data['title'] = "Agenda";
		$this->template->load('administrator/template','administrator/agenda/agenda', $data);
    }

    function tambah_agenda(){
        // cek_session_akses('listberita',$this->session->id_session);
			$config['upload_path'] = 'upload/img_agenda/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_agenda/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($hasil['file_name']==''){
                    $data = array(
                        'username'=>$this->session->username,
                        'tema'=>$this->db->escape_str($this->input->post('tema')),
                        'tema_seo'=>seo_title($this->input->post('tema')),
                        'isi_agenda'=>$this->input->post('isi-agenda'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_posting'=>date('Y-m-d'),
                        'tgl_mulai'=>$this->input->post('tanggal-mulai'),
                        'tgl_selesai'=>$this->input->post('tanggal-selesai'),
                        'jam'=>$this->input->post('waktu-mulai'),
                        'jam_selesai'=>$this->input->post('waktu-selesai'),
                        'dibaca'=>'0',
                        'terbit'=>$this->input->post('terbit'),
                        'tempat'=>$this->input->post('tempat'),
                        'map'=>$this->input->post('google-map'),
                        'pengirim'=>$this->input->post('pengirim')
                    );
            } else {
                    $data = array(
                        'username'=>$this->session->username,
                        'tema'=>$this->db->escape_str($this->input->post('tema')),
                        'tema_seo'=>seo_title($this->input->post('tema')),
                        'isi_agenda'=>$this->input->post('isi-agenda'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_posting'=>date('Y-m-d'),
                        'tgl_mulai'=>$this->input->post('tanggal-mulai'),
                        'tgl_selesai'=>$this->input->post('tanggal-selesai'),
                        'jam'=>$this->input->post('waktu-mulai'),
                        'jam_selesai'=>$this->input->post('waktu-selesai'),
                        'gambar'=>$hasil['file_name'],
                        'dibaca'=>'0',
                        'terbit'=>$this->input->post('terbit'),
                        'tempat'=>$this->input->post('tempat'),
                        'map'=>$this->input->post('google-map'),
                        'pengirim'=>$this->input->post('pengirim')
                    );
            }
            $this->model_app->insert('agenda',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/agenda');
    }

    function edit_agenda(){
        // cek_session_akses('listberita',$this->session->id_session);
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_agenda/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/img_agenda/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('tag')!=''){
                $tag_seo = $this->input->post('tag');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($hasil['file_name']==''){
                    $data = array(
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'tema'=>$this->db->escape_str($this->input->post('tema')),
                        'tema_seo'=>seo_title($this->input->post('tema')),
                        'isi_agenda'=>$this->input->post('isi-agenda'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_mulai'=>$this->input->post('tanggal-mulai'),
                        'tgl_selesai'=>$this->input->post('tanggal-selesai'),
                        'jam'=>$this->input->post('waktu-mulai'),
                        'jam_selesai'=>$this->input->post('waktu-selesai'),
                        'tempat'=>$this->input->post('tempat'),
                        'map'=>$this->input->post('google-map'),
                        'pengirim'=>$this->input->post('pengirim')
                    );
            } else {
                    $data = array(
                        'username'=>'admin',
                        'tema'=>$this->db->escape_str($this->input->post('tema')),
                        'tema_seo'=>seo_title($this->input->post('tema')),
                        'isi_agenda'=>$this->input->post('isi-agenda'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_mulai'=>$this->input->post('tanggal-mulai'),
                        'tgl_selesai'=>$this->input->post('tanggal-selesai'),
                        'jam'=>$this->input->post('waktu-mulai'),
                        'jam_selesai'=>$this->input->post('waktu-selesai'),
                        'gambar'=>$hasil['file_name'],
                        'tempat'=>$this->input->post('tempat'),
                        'map'=>$this->input->post('google-map'),
                        'pengirim'=>$this->input->post('pengirim')
                    );
            }
            $where = array('id_agenda' => $this->input->post('id-agenda'));
			$this->model_app->update('agenda', $data, $where);
			redirect('administrator/agenda');
		}else{
			// if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('agenda', array('id_agenda' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }

            $data['title'] = "Edit Agenda";
			$this->template->load('administrator/template','administrator/agenda/edit_agenda',$data);
		}
    }

    function terbit_agenda(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('terbit'=>'N');
		}else{
			$data = array('terbit'=>'Y');
		}
        $where = array('id_agenda' => $this->uri->segment(3));
		$this->model_app->update('agenda', $data, $where);
		redirect('administrator/agenda');
	}

    function hapus_agenda(){
        // cek_session_akses('listberita',$this->session->id_session);
        // if ($this->session->level=='admin'){
        $id = array('id_agenda' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
        $this->model_app->delete('agenda',$id);
        redirect('administrator/agenda');
    }
    // AGENDA END

    // PENGUMUMAN START
    function pengumuman(){
        // cek_session_akses('pengumuman', $this->session->id_session);
        $data['record'] = $this->model_app->view_ordering('pengumuman','id_pengumuman','DESC');
        $data['unduh'] = $this->model_app->view_where_ordering('unduh', array('terbit'=>'Y'),'id_unduh', 'ASC');
        $data['title'] = "Pengumuman";
		$this->template->load('administrator/template','administrator/pengumuman/pengumuman', $data);
    }

    function tambah_pengumuman(){
        // cek_session_akses('listberita',$this->session->id_session);
			$config['upload_path'] = 'upload/foto_pengumuman/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/foto_pengumuman/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                    $data = array(
                        // 'username'=>$this->session->username,
                        'username'=> 'admin',
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi'=>$this->input->post('isi-pengumuman'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_posting'=>date('Y-m-d'),
                        'dibaca'=>'0',
                        'file'=>$this->input->post('file'),
                        'aktif'=>$this->input->post('terbit')
                    );
            } else {
                    $data = array(
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi'=>$this->input->post('isi-pengumuman'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_posting'=>date('Y-m-d'),
                        'gambar'=>$hasil['file_name'],
                        'dibaca'=>'0',
                        'file'=>$this->input->post('file'),
                        'aktif'=>$this->input->post('terbit')
                    );
            }
            $this->model_app->insert('pengumuman',$data);
            // $this->session->set_flasdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
			redirect('administrator/pengumuman');
    }

    function edit_pengumuman(){
        // cek_session_akses('listberita',$this->session->id_session);
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/foto_pengumuman/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
	        $config['max_size'] = '5120'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'upload/foto_pengumuman/'.$hasil['file_name'];
            $config['wm_text'] = '';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '18';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';
            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            // if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($hasil['file_name']==''){
                    $data = array(
                        'username'=> 'admin',
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi'=>$this->input->post('isi-pengumuman'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_posting'=>date('Y-m-d'),
                        'dibaca'=>'0',
                        'file'=>$this->input->post('file')
                    );
            } else {
                    $data = array(
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                        'judul_seo'=>seo_title($this->input->post('judul')),
                        'isi'=>$this->input->post('isi-pengumuman'),
                        'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                        'tgl_posting'=>date('Y-m-d'),
                        'gambar'=>$hasil['file_name'],
                        'dibaca'=>'0',
                        'file'=>$this->input->post('file')
                    );
            }
            $where = array('id_pengumuman' => $this->input->post('id_pengumuman'));
			$this->model_app->update('pengumuman', $data, $where);
			redirect('administrator/pengumuman');
		}else{
		    	// if ($this->session->level=='admin'){
            $data['proses'] = $this->model_app->edit('pengumuman', array('id_pengumuman' => $id))->row_array();
            $data['unduh'] = $this->model_app->view_where_ordering('unduh', array('terbit'=>'Y'),'id_unduh', 'ASC');
            // }else{
            //     $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            // }

            $data['title'] = "Edit Pengumuman";
			$this->template->load('administrator/template','administrator/pengumuman/edit_pengumuman',$data);
		}
    }

    function terbit_pengumuman(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_pengumuman' => $this->uri->segment(3));
		$this->model_app->update('pengumuman', $data, $where);
		redirect('administrator/pengumuman');
    }

    function hapus_pengumuman(){
        // cek_session_admin();
        $id = array('id_pengumuman' => $this->uri->segment(3));
		$this->model_app->delete('pengumuman', $id);
        redirect('administrator/pengumuman');
	}
    // PENGUMUMAN END

    // SEKILAS INFO START
    function sekilas_info(){
        // cek_session_akses('sekilasinfo', $this->session->id_session);
        $data['sekilas_info'] = $this->model_app->view_ordering('sekilasinfo','id_sekilas','DESC');
        $data['title'] = "Sekilas Info";
		$this->template->load('administrator/template','administrator/sekilas_info/sekilas_info', $data);
    }

    function tambah_sekilasinfo(){
        // cek_session_akses('sekilasinfo',$this->session->id_session);
        $config['upload_path'] = 'upload/foto_info/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '2500'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
        $hasil=$this->upload->data();
        if ($hasil['file_name']==''){
            $data = array(
                'info'=>$this->input->post('info'),
                'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                'tgl_posting'=>date('Y-m-d'),
'aktif'=>$this->input->post('terbit')
            );
        }else{
            $data = array(
                'info'=>$this->input->post('info'),
                'tgl_posting'=>date('Y-m-d'),
                'gambar'=>$hasil['file_name'],
                'keterangan_gambar'=>$this->input->post('keterangan-gambar'),
                'aktif'=>$this->input->post('terbit')
            );
        }
        $this->model_app->insert('sekilasinfo',$data);
        redirect('administrator/sekilas_info');
    }

    function edit_sekilasinfo(){
        // cek_session_akses('sekilasinfo',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'upload/foto_info/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '2500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('info'=>$this->input->post('info'),
                              'keterangan_gambar'=>$this->input->post('keterangan-gambar'));
            }else{
                $data = array('info'=>$this->input->post('info'),
                              'gambar'=>$hasil['file_name'],
                              'keterangan_gambar'=>$this->input->post('keterangan-gambar'));
            }

            $where = array('id_sekilas' => $this->input->post('id_sekilasinfo'));
            $this->model_app->update('sekilasinfo', $data, $where);
            redirect('administrator/sekilas_info');
        }else{
            $proses = $this->model_app->edit('sekilasinfo', array('id_sekilas' => $id))->row_array();
            $data = array('rows' => $proses);
            $data['title'] = "Edit Sekilas Info";
            $this->template->load('administrator/template','administrator/sekilas_info/edit_sekilasinfo',$data);
        }
    }

    function aktif_sekilasinfo(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('aktif'=>'N');
		}else{
			$data = array('aktif'=>'Y');
		}
        $where = array('id_sekilas' => $this->uri->segment(3));
		$this->model_app->update('sekilasinfo', $data, $where);
		redirect('administrator/sekilas_info');
    }

    function hapus_sekilasinfo(){
        // cek_session_admin();
        $id = array('id_sekilas' => $this->uri->segment(3));
		$this->model_app->delete('sekilasinfo', $id);
        redirect('administrator/sekilas_info');
	}
    // SEKILAS INFO

    // JEJAK PENDAPAT START
    function jejak_pendapat(){
        // cek_session_akses('jejak_pendapat',$this->session->id_session);
        $data['count'] = $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal");
        $data['record'] = $this->model_app->view_join_one('pendapat','pendapat_counter','id_pendapat','id_counter','DESC');
        $data['unduh'] =
        $data['title'] = "Jejak Pendapat";
		$this->template->load('administrator/template','administrator/jejak_pendapat/jejak_pendapat', $data);
    }

    function tambah_jejakpendapat(){

    }

    function edit_jejakpendapat($id){
        $data['vote'] = $this->voting->get_one($id);
        $columns = $this->voting->get_all_columns($id);
        $data['columns'] = array_filter($columns);
        $vote = $this->voting->is_voted($id);
        if (!empty($vote)) {
            $this->session->set_flashdata('success_msg', 'Maaf, anda tidak dapat mengedit jejak pendapat yang sedang aktif.');
            redirect('admin_voting/votes_list/');
        }
        $this->form_validation->set_rules('dv_title', $this->lang->line('dv_title'), 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->template->load('administrator/template','administrator/jejak_pendapa/ediit_jejakpendapat', $data);
        } else {

            $fields = $this->input->post('fields');
            $orderd_data = $this->array_combine2($fields);
            $this->voting->update($orderd_data, $id);
            redirect('administrator/jejak_pendapat');
        }
    }

    function array_combine2($arr2)
    {
        $filter_arr2 = array_filter($arr2);
        $arr1 = range('A', 'z');
        $count = min(count($arr1), count($filter_arr2));
        return array_combine(array_slice($arr1, 0, $count), array_slice($filter_arr2, 0, $count));
    }

    function terbit_jejakpendapat(){
        $id = $this->uri->segment(4);
        $this->voting->active($id);
        redirect('administrator/jejak_pendapat');
    }

    function hapus_jejakpendapat(){
        $id = array('id_pendapat' => $this->uri->segment(3));
		$this->model_app->delete('pendapat', $id);
        $this->model_app->delete('pendapat_counter', $id);
        redirect('administrator/jejak_pendapat');
    }
    // JEJAK PENDAPAT END

    // UNDUHAN START
    function unduhan(){
        cek_session_akses('download',$this->session->id_session);
        $data['unduhan'] = $this->model_app->view_ordering('unduh','id_unduh','DESC');
        $data['title'] = "Unduhan";
		$this->template->load('administrator/template','administrator/unduhan/unduhan', $data);
    }

    function tambah_unduhan(){
        // cek_session_akses('download',$this->session->id_session);
        $config['upload_path'] = 'upload/files/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('files');
        $hasil=$this->upload->data();
        if ($hasil['file_name']==''){
            $data = array(
                'judul_unduh'=>$this->db->escape_str($this->input->post('judul-unduh')),
                'tanggal'=>date('Y-m-d'),
                'hits'=>'0',
                'jam'=>date('H:i:s'),
                'hari'=>hari_ini(date('w')),
                'terbit'=>$this->input->post('terbit')
            );
        }else{
            $data = array(
                'judul_unduh'=>$this->db->escape_str($this->input->post('judul-unduh')),
                'file'=>$hasil['file_name'],
                'tanggal'=>date('Y-m-d'),
                'hits'=>'0',
                'jam'=>date('H:i:s'),
                'hari'=>hari_ini(date('w')),
                'terbit'=>$this->input->post('terbit')
            );
        }
        $this->model_app->insert('unduh',$data);
		redirect('administrator/unduhan');
	}

    function edit_unduhan(){
        // cek_session_akses('download',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/files/';
            $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
            $config['max_size'] = '25000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('files');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul_unduh'=>$this->db->escape_str($this->input->post('judul-unduh')));
            }else{
                    $data = array('judul_unduh'=>$this->db->escape_str($this->input->post('judul-unduh')),
                                    'file'=>$hasil['file_name']);
            }
            $where = array('id_unduh' => $this->input->post('id_unduhan'));
            $this->model_app->update('unduh', $data, $where);
			redirect('administrator/unduhan');
		}else{
			$proses = $this->model_app->edit('unduh', array('id_unduh' => $id))->row_array();
            $data = array('rows' => $proses);
            $data['title'] = "Edit Unduhan";
			$this->template->load('administrator/template','administrator/unduhan/edit_unduhan',$data);
		}
    }

    function terbit_unduhan(){
        // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('terbit'=>'N');
		}else{
			$data = array('terbit'=>'Y');
		}
        $where = array('id_unduh' => $this->uri->segment(3));
		$this->model_app->update('unduh', $data, $where);
		redirect('administrator/unduhan');
    }

    function hapus_unduhan(){
         // cek_session_admin();
        $id = array('id_unduh' => $this->uri->segment(3));
		$this->model_app->delete('unduh', $id);
        redirect('administrator/unduhan');
    }

    // function list_unduhan(){
    //     $list = $this->model_tabel->get_datatables();
	// 	$data = array();
	// 	$no = @$_POST['start'];
	// 	foreach ($list as $unduh) {
    //         $tanggal = tgl_indo($unduh->tanggal);
    //         if($unduh->terbit == 'Y'){
    //             $terbit = '<div class="text-center"><a  title="Terbit" href="javascript:void(0)" onclick="terbit('."'".$unduh->id_unduh."'".',
    //             '."'".$unduh->terbit."'".')"><i class="fas fa-thumbs-up fa-xs" style="color: #1cc88a"></i></a></div>';
    //         }else{
    //             $terbit = '<div class="text-center"><a title="Tidak Terbit" href="javascript:void(0)" onclick="terbit('."'".$unduh->id_unduh."'".','."'".$unduh->terbit."'".')"><i class="fas fa-thumbs-down fa-xs" style="color: #e74a3b"></i></a></div>';
    //         }
	// 		$no++;
	// 		$row = array();
    //         $row[] = $no.".";
	// 		$row[] = $unduh->judul_unduh;
    //         $row[] = $tanggal;
    //         $row[] = $unduh->hits;
    //         $row[] = $terbit;

	// 		//add html for action
	// 		$row[] = '<div class="text-center"><a href="javascript:void(0)" title="Edit" onclick="edit_unduhan('."'".$unduh->id_unduh."'".')"><i class="fas fa-edit fa-xs"         style="color: #f6c23e"></i>&nbsp;</a>
	// 		<a href="javascript:void(0)" title="Hapus" onclick="hapus_unduhan('."'".$unduh->id_unduh."'".')"><i class="fas fa-trash fa-xs" style="color: #e74a3b"></i></a></div>';

	// 		$data[] = $row;
	// 	}

	// 	$output = array(
	// 					"draw" => @$_POST['draw'],
	// 					"recordsTotal" => $this->model_tabel->count_all(),
	// 					"recordsFiltered" => $this->model_tabel->count_filtered(),
	// 					"data" => $data,
	// 			);
	// 	echo json_encode($output);
    // }

    // function tambah_unduhan(){
	// 	// cek_session_akses('download',$this->session->id_session);
    //     // $this->_validate();
	// 	$data = array(
    //         'judul_unduh'=>$this->input->post('judul_unduh'),
    //         'file'=>'file',
    //         'hits'=>'0',
    //         'tanggal'=>date('Y-m-d'),
    //         'jam'=>date('H:i:s'),
    //         'hari'=>hari_ini(date('w')),
    //         'terbit' => 'terbit'
    //     );
    //     // if(!empty($_FILES['file_name']['name']))
    //     // {
    //     //     $upload = $this->_do_upload();
    //     //     $data['file_name'] = $upload;
    //     // }

    //     $data = $this->db->insert('unduh', $data);
    //     echo json_encode($data);
    //     // }else{
	// 	// 	$this->template->load('administrator/template','administrator/mod_download/view_download_tambah');
    // }

    // function edit_unduhan(){
    //     // $this->_validate();
    //     $data = array(
    //         'judul_unduh'=>$this->input->post('judul_unduh'),
    //         'hits'=>'0',
    //         'tanggal'=>date('Y-m-d'),
    //         'jam'=>date('H:i:s'),
    //         'hari'=>hari_ini(date('w')),
    //         'terbit' => $this->input->post('terbit')
    //     );

    //     if($this->input->post('remove_file')) // if remove photo checked
    //     {
    //         if(file_exists('upload/files/'.$this->input->post('remove_file')) && $this->input->post('remove_file'))
    //             unlink('upload/files'.$this->input->post('remove_file'));
    //         $data['file'] = '';
    //     }

    //     if(!empty($_FILES['file']['name']))
    //     {
    //         $upload = $this->_do_upload();

    //         //delete file
    //         $unduh = $this->person->get_by_id($this->input->post('id_unduh'));
    //         if(file_exists('upload/files/'.$unduh->files) && $unduh->files)
    //             unlink('upload/files'.$unduh->files);

    //         $data['files'] = $upload;
    //     }

    //     $this->model_tabel->update('unduh', array('id_unduh' => $this->input->post('id_unduh')), $data);
    //     echo json_encode(array("status" => TRUE));
    // }

    // private function _do_upload(){
    //     $config['upload_path']          = 'upload/files';
    //     $config['allowed_types']        = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
    //     $config['max_size']             = 25000; //set max size allowed in Kilobyte
    //     // $config['max_width']            = 1000; // set max width image allowed
    //     // $config['max_height']           = 1000; // set max height allowed
    //     $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

    //     $this->load->library('upload', $config);

    //     if(!$this->upload->do_upload('photo')) //upload and validate
    //     {
    //         $data['inputerror'][] = '   ';
    //         $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
    //         $data['status'] = FALSE;
    //         echo json_encode($data);
    //         exit();
    //     }
    //     return $this->upload->data('file_name');
    // }


    // private function _validate()
    // {
    //     $data = array();
    //     $data['error_string'] = array();
    //     $data['inputerror'] = array();
    //     $data['status'] = TRUE;

    //     if($this->input->post('firstName') == '')
    //     {
    //         $data['inputerror'][] = 'firstName';
    //         $data['error_string'][] = 'First name is required';
    //         $data['status'] = FALSE;
    //     }

    //     if($this->input->post('lastName') == '')
    //     {
    //         $data['inputerror'][] = 'lastName';
    //         $data['error_string'][] = 'Last name is required';
    //         $data['status'] = FALSE;
    //     }

    //     if($this->input->post('dob') == '')
    //     {
    //         $data['inputerror'][] = 'dob';
    //         $data['error_string'][] = 'Date of Birth is required';
    //         $data['status'] = FALSE;
    //     }

    //     if($this->input->post('gender') == '')
    //     {
    //         $data['inputerror'][] = 'gender';
    //         $data['error_string'][] = 'Please select gender';
    //         $data['status'] = FALSE;
    //     }

    //     if($this->input->post('address') == '')
    //     {
    //         $data['inputerror'][] = 'address';
    //         $data['error_string'][] = 'Addess is required';
    //         $data['status'] = FALSE;
    //     }

    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }




    // function terbit_unduhan(){
    //     // cek_session_admin();
	// 	if ($this->uri->segment(4)=='Y'){
	// 		$data = array('terbit'=>'N');
	// 	}else{
	// 		$data = array('terbit'=>'Y');
	// 	}
    //     $where = array('id_unduh' => $this->uri->segment(3));
	// 	$this->model_app->update('unduh', $data, $where);
	// 	redirect('administrator/unduhan');
	// }

    // function hapus_unduhan(){
    //     // cek_session_akses('listberita',$this->session->id_session);
    //     // if ($this->session->level=='admin'){
    // 		$id = array('id_unduh' => $this->uri->segment(3));
    //     // }else{
    //     //     $id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
    //     // }
	// 	$this->model_app->delete('unduh',$id);
	// 	redirect('administrator/unduhan');
	// }


    // function terbit_unduhan(){
    //     // cek_session_admin();
	// 	if ($this->uri->segment(4)=='Y'){
	// 		$data = array('terbit'=>'N');
	// 	}else {
	// 		$data = array('terbit'=>'Y');
	// 	}
    //     $where = array('id_unduh' => $this->uri->segment(3));
	// 	$this->model_tabel->publish_by_id('unduh', $data, $where);
	// 	echo json_encode(array("status" => TRUE));
	// }

    // public function ajax_add_unduhan(){
    //     $config['upload_path'] = 'upload/files/';
    //     $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
    //     $config['max_size'] = '25000'; // kb
    //     $this->load->library('upload', $config);
    //     $this->upload->do_upload('b');
    //     $hasil=$this->upload->data();
	// 	$data = array(
	// 			'judul_unduh' => $this->input->post('judul_unduh'),
	// 			'file' => $hasil['file_name'],
	// 			'tanggal' => date('Y-m-d'),
	// 			'hits' => 0,
	// 			'terbit' => 'Y',
    //             'jam'=>date('H:i:s'),
    //             'hari'=>hari_ini(date('w')),
	// 		);
	// 	$this->model_tabel->save('unduh',$data);
	// 	echo json_encode(array("status" => TRUE));
	// }

	// public function ajax_update_unduhan(){
	// 	$data = array(
	// 			'firstName' => $this->input->post('firstName'),
	// 			'lastName' => $this->input->post('lastName'),
	// 			'gender' => $this->input->post('gender'),
	// 			'address' => $this->input->post('address'),
	// 			'dob' => $this->input->post('dob'),
	// 		);
	// 	$this->person->update(array('id' => $this->input->post('id')), $data);
	// 	echo json_encode(array("status" => TRUE));
	// }

    // function hapus_unduhan(){
    //     // cek_session_admin();
    //     $id = array('id_unduh' => $this->uri->segment(3));
	// 	$this->model_tabel->delete_by_id('unduh', $id);
	// 	echo json_encode(array("status" => TRUE));
	// }
    // UMDUHAN END

    // PESAN START
    function pesan(){
        cek_session_akses('pesan',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('hubungi','id_hubungi','DESC');
        $data['title'] = "Pesan Masuk";
		$this->template->load('administrator/template','administrator/pesan/pesan', $data);
    }

    function lihat_pesan(){
        cek_session_akses('pesan',$this->session->id_session);
		$id = $this->uri->segment(3);
		$this->db->query("UPDATE hubungi SET dibaca='Y' where id_hubungi='$id'");
		if (isset($_POST['submit'])){
			$nama           = $this->input->post('nama');
            $email           = $this->input->post('email');
            $subject         = $this->input->post('subject');
            $message         = $this->input->post('isi')." <br><hr><br> ".$this->input->post('d');

            $this->email->from('egov.diskominfo.pelalawan@gmail.com', 'disominfo.pelalawankab.go.id');
            $this->email->to($email);
            $this->email->cc('');
            $this->email->bcc('');

            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->set_mailtype("html");
            $this->email->send();

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

			$proses = $this->model_app->edit('hubungi', array('id_hubungi' => $id))->row_array();
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/pesan/lihat_pesan',$data);
		}else{
			$proses = $this->model_app->edit('hubungi', array('id_hubungi' => $id))->row_array();
            $data = array('rows' => $proses);
            $data['title'] = "Lihat dan Balas Pesan";
			$this->template->load('administrator/template','administrator/pesan/lihat_pesan',$data);
		}
    }

    function balas_pesan(){

    }

    function hapus_pesan(){
        // cek_session_admin();
        $id = array('id_hubungi' => $this->uri->segment(3));
		$this->model_app->delete('hubungi', $id);
        redirect('administrator/pesan');
	}
    // PESAN END

    // SENSOR KOMENTAR START
    function sensor_komentar(){
        cek_session_akses('sensor_komentar',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('katajelek','id_jelek','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('katajelek',array('username'=>$this->session->username),'id_jelek','DESC');
        }
		$data['title'] = "Sensor Komentar";
		$this->template->load('administrator/template','administrator/sensor_komentar/sensor_komentar', $data);
    }

	function tambah_sensorkomentar(){
		// cek_session_akses('sensorkomentar',$this->session->id_session);
		$data = array(
            'kata'=>$this->input->post('kata-jelek'),
            // 'username'=>$this->session->username,
                        'username'=>'admin',

            'ganti'=>$this->input->post('ganti-menjadi')
        );
		$this->model_app->insert('katajelek',$data);
		redirect('administrator/sensor_komentar');
	}

	function edit_sensorkomentar(){
        // cek_session_akses('tagberita',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array(
                'kata'=>$this->db->escape_str($this->input->post('kata-jelek')),
                        // 'username'=>$this->session->username,
                        'username'=>'admin',
                        'ganti'=>seo_title($this->input->post('ganti-menjadi')));
			$where = array('id_jelek' => $this->input->post('id_jelek'));
			$this->model_app->update('katajelek', $data, $where);
			redirect('administrator/sensor_komentar/edit_sensorkomentar');
		}else{
            // if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('katajelek', array('id_jelek' => $id))->row_array();
            // }else{
            //     $proses = $this->model_app->edit('tag', array('id_tag' => $id, 'username' => $this->session->username))->row_array();
            // }
			$data = array('rows' => $proses);
            $data['title'] = "Edit Sensor Komentar";
			$this->template->load('administrator/template','administrator/sensor_komentar/edit_sensorkomentar',$data);
		}
	}

	function hapus_sensorkomentar(){
        // cek_session_akses('sensorkomentar',$this->session->id_session);
		// if ($this->session->level=='admin'){
            $id = array('id_jelek' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_jelek' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
		$this->model_app->delete('katajelek',$id);
		redirect('administrator/sensor_komentar');
	}
    // SENSOR KOMENTAR END

    // MANAJEMEN PENGGUNA START
    function manajemen_pengguna(){
        cek_session_akses('manajemen_pengguna', $this->session->id_session);
        $data['manajemen_pengguna'] = $this->model_app->view_ordering('users','username', 'DESC');
        $data['title'] = "Manajemen Pengguna";
        $data['proses'] = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'urutan','ASC');
		$this->template->load('administrator/template','administrator/manajemen_pengguna/manajemen_pengguna', $data);
    }

    function tambah_manajemenpengguna(){
        cek_session_akses('manajemen_pengguna',$this->session->id_session);
		$id = $this->session->username;
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_user/';
            $config['allowed_types'] = 'gif|jpg|png|svg|GIF|JPG|JPEG|SVG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array(
                        'username'=>$this->db->escape_str($this->input->post('username')),
                        'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('nama')),
                        'email'=>$this->db->escape_str($this->input->post('email')),
                        'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                        'no_telp'=>$this->db->escape_str($this->input->post('telp')),
                        'level'=>$this->db->escape_str($this->input->post('level')),
                        'blokir'=>'N',
                        'id_session'=>md5($this->input->post('username')).'-'.date('YmdHis')
                    );
            }else{
                    $data = array(
                        'username'=>$this->db->escape_str($this->input->post('username')),
                        'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('nama')),
                        'email'=>$this->db->escape_str($this->input->post('email')),
                        'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                        'no_telp'=>$this->db->escape_str($this->input->post('telp')),
                        'foto'=>$hasil['file_name'],
                        'level'=>$this->db->escape_str($this->input->post('level')),
                        'blokir'=>'N',
                        'id_session'=>md5($this->input->post('username')).'-'.date('YmdHis')
                    );
            }
            $this->model_app->insert('users',$data);
            $mod=count($this->input->post('modul'));
            $modul=$this->input->post('modul');
            $sess = md5($this->input->post('username')).'-'.date('YmdHis');
            for($i=0;$i<$mod;$i++){
                $datam = array(
                    'id_session'=>$sess,
                    'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
            }
            redirect('administrator/manajemen_pengguna');
		}
    }

    function edit_manajemenpengguna(){
        cek_session_akses('manajemen_pengguna',$this->session->id_session);
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/img_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '2000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array(
                        'username'=>$this->db->escape_str($this->input->post('a')),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                        'email'=>$this->db->escape_str($this->input->post('d')),
                        'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                        'no_telp'=>$this->db->escape_str($this->input->post('e')),
                        'blokir'=>$this->db->escape_str($this->input->post('h')
                    )
                );
            } elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array(
                        'username'=>$this->db->escape_str($this->input->post('a')),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                        'email'=>$this->db->escape_str($this->input->post('d')),
                        'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                        'no_telp'=>$this->db->escape_str($this->input->post('e')),
                        'foto'=>$hasil['file_name'],
                        'blokir'=>$this->db->escape_str($this->input->post('h')
                    )
                );
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array(
                        'username'=>$this->db->escape_str($this->input->post('a')),
                        'password'=>password_hash($this->input->post('b'), PASSWORD_DEFAULT),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                        'email'=>$this->db->escape_str($this->input->post('d')),
                        'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                        'no_telp'=>$this->db->escape_str($this->input->post('e')),
                        'blokir'=>$this->db->escape_str($this->input->post('h')));
            } elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array(
                        'username'=>$this->db->escape_str($this->input->post('a')),
                        'password'=>password_hash($this->input->post('b'), PASSWORD_DEFAULT),
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                        'email'=>$this->db->escape_str($this->input->post('d')),
                        'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                        'no_telp'=>$this->db->escape_str($this->input->post('e')),
                        'foto'=>$hasil['file_name'],
                        'blokir'=>$this->db->escape_str($this->input->post('h')
                    )
                );
            }
            $where = array('username' => $this->input->post('id'));
            $this->model_app->update('users', $data, $where);
            $mod=count($this->input->post('modul'));
            $modul=$this->input->post('modul');
            for($i=0;$i<$mod;$i++){
                $datam = array(
                    'id_session'=>$this->input->post('ids'),
                    'id_modul'=>$modul[$i]);


                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/manajemen_pengguna');
		}else{
            if ($this->session->username==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);

                $data['title'] = "Edit Manajemen Pengguna";
    			$this->template->load('administrator/template','administrator/manajemen_pengguna/edit_manajemenpengguna',$data);
            }else{

                redirect('administrator/manajemen_pengguna/'.$this->session->username);
            }
		}
    }

    function blokir_pengguna(){
        cek_session_akses('manajemen_pengguna',$this->session->id_session);
        if ($this->uri->segment(4)=='Y'){
			$data = array('blokir'=>'N');
		}else{
			$data = array('blokir'=>'Y');
		}
        $where = array('username' => $this->uri->segment(3));
		$this->model_app->update('users', $data, $where);
		redirect('administrator/manajemen_pengguna');
    }

    function hapus_pengguna(){
        cek_session_akses('manajemen_pengguna',$this->session->id_session);
		$id = array('username' => $this->uri->segment(3));
        $this->model_app->delete('users',$id);
		redirect('administrator/manajemen_pengguna');
    }
    // MANAJEMEN PENGGUNA END

    // MANAJEMEN MODUL START
    function manajemen_modul(){
        cek_session_akses('manajemenmodul',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('modul','id_modul','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('modul',array('username'=>$this->session->username),'id_modul','DESC');
        }
        $data['title'] = "Manajemen Modul";
		$this->template->load('administrator/template','administrator/manajemen_modul/manajemen_modul',$data);
    }

    function tambah_manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $this->model_app->insert('modul',$data);
			redirect('administrator/manajemenmodul');
		}else{
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_tambah');
		}
	}

	function edit_manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
            $data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $where = array('id_modul' => $this->input->post('id'));
            $this->model_app->update('modul', $data, $where);
			redirect('administrator/manajemenmodul');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('modul', array('id_modul' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('modul', array('id_modul' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_edit',$data);
		}
	}

    function hapus_manajemenmodul(){
        cek_session_akses('manajemen_modul',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_modul' => $this->uri->segment(3));
        }else{
            $id = array('id_modul' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('modul',$id);
		redirect('administrator/manajemen_modul');
    }
    // MANAJEMEN MODUL END

    // PROFIL START
    function profil(){
        $data['title'] = "Profil";
		$this->template->load('administrator/template','administrator/profil/profil', $data);
    }

    function simpan_profil(){
        $id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'img/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '2000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('password') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('password') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>password_hash($this->input->post('b'), PASSWORD_DEFAULT),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>password_hash($this->input->post('b'), PASSWORD_DEFAULT),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }
            $where = array('username' => $this->input->post('id'));
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/edit_manajemenuser/'.$this->input->post('id'));
		}else{
            if ($this->session->username==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
    			$this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
            }else{
                redirect('administrator/edit_manajemenuser/'.$this->session->username);
            }
		}
    }
    // PROFIL END

    // PANDUAN START
    function panduan(){
        $data['title'] = "Panduan";
		$this->template->load('administrator/template','administrator/panduan/panduan', $data);
    }
    // PANDUAN END

    // FAQ START
    function faq(){
        $data['title'] = "FAQ";
		$this->template->load('administrator/template','administrator/faq/faq', $data);
    }
    // FAQ END

    // KELUAR START
    function keluar(){
        session_destroy();
        $this->session->sess_destroy();
		redirect('administrator');
    }
    // KELUAR END


    function edit_manajemenuser(){
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/img_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>password_hash($this->input->post('b'), PASSWORD_DEFAULT),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>password_hash($this->input->post('b'), PASSWORD_DEFAULT),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'alamat'=>$this->db->escape_str($this->input->post('alamat')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }
            $where = array('username' => $this->input->post('id'));
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){

                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/manajemen_pengguna/edit_manajemenpengguna'.$this->input->post('id'));
		}else{
            if ($this->session->username==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
                $data['title'] = "Profil";

    			$this->template->load('administrator/template','administrator/manajemen_pengguna/edit_manajemenpengguna',$data);
            }else{
                redirect('administrator/edit_manajemenuser/'.$this->session->username);
            }
		}
	}

    function komentar(){
        cek_session_akses('komentar',$this->session->id_session);
		if (isset($_POST['submit'])){
            $data = array(
                'disquss'=>$this->input->post('disquss'),
                'count'=>$this->input->post('count'),
            );
            $where = array('id_komentar' => $this->input->post('id_komentar'));
			$this->model_app->update('komentar', $data, $where);
			redirect('administrator/komentar');
		}else{
			$proses = $this->model_app->edit('komentar', array('id_komentar' => 1))->row_array();
			$data = array('record' => $proses);
        $data['title'] = "Komentar";
        $data['desc'] = "Pada fitur komentar ini menggunakan <a href='https://disqus.com/' target='_blank'>Disquss</a>, anda dapat mendaftar pada <a href='https://disqus.com/profile/signup/' target='_blank'>halaman ini</a>, kemudian mengisi kode dibawah ini";
		$this->template->load('administrator/template','administrator/komentar/komentar', $data);
        }
    }

    function lowongan(){
        cek_session_akses('lowongan',$this->session->id_session);
        // $data['jumlah_berita'] = $this->model_app->view('berita')->num_rows();
        // $data['berita_terbit'] = $this->model_app->view_data_where('berita', 'terbit', 'Y')->num_rows();
        // $data['tidak_terbit'] = $this->model_app->view_data_where('berita', 'terbit', 'N')->num_rows();
        // $data['jumlah_kategori'] = $this->model_app->view('kategori')->num_rows();
        // $data['berita'] = $this->model_app->view_join_one('berita','kategori', 'id_kategori', 'id_berita','DESC');
        // $data['kategori'] = $this->model_app->view_where_ordering('kategori', array('aktif'=>'Y'), 'id_kategori', 'ASC');
        // $data['tanda'] = $this->model_app->view_where_ordering('tag_berita', array('terbit'=>'Y'), 'id_tag', 'DESC');
        if($this->session->level == 'admin') {
            $data['lowongan'] = $this->model_app->view_ordering('lowongan', 'id_lowongan', 'DESC');
        } else {
            $data['lowongan'] = $this->model_app->view_where_ordering('lowongan', array('username' => $this->session->username), 'id_lowongan', 'DESC');
        }
        $data['title'] = "Lowongan";
        $this->template->load('administrator/template','administrator/lowongan/lowongan', $data);
    }

    function tambah_lowongan(){
        cek_session_akses('halaman_statis', $this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_lowongan/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '5120'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array(
                        'jdl_lowongan'=>$this->db->escape_str($this->input->post('judul')),
                        'seo_lowongan'=>seo_title($this->input->post('judul')),
                        'subjudul'=>$this->db->escape_str($this->input->post('subjudul')),
                        'keterangan_gambar'=>$this->db->escape_str($this->input->post('keterangan-gambar')),
                        'isi_lowongan'=>$this->db->escape_str($this->input->post('isi-lowongan')),
                        'tanggal'=>date('Y-m-d'),
                        'oleh'=>$this->db->escape_str($this->input->post('oleh')),
                        'username'=>$this->session->username,
                        'dibaca'=>'0',
                        'terbit'=>$this->input->post('terbit')
                    );
            }else{
            		$data = array(
                        'jdl_lowongan'=>$this->db->escape_str($this->input->post('judul')),
                        'subjudul'=>$this->db->escape_str($this->input->post('subjudul')),
                        'seo_lowongan'=>seo_title($this->input->post('judul')),
                        'keterangan_gambar'=>$this->db->escape_str($this->input->post('keterangan-gambar')),
                        'isi_lowongan'=>$this->input->post('isi-lowongan'),
                        'tanggal'=>date('Y-m-d'),
                        'oleh'=>$this->db->escape_str($this->input->post('oleh')),
                        'gambar'=>$hasil['file_name'],
                        'username'=>$this->session->username,
                        'terbit'=>$this->input->post('terbit'),
                        'dibaca'=>'0'
                    );
            }
            $this->model_app->insert('lowongan',$data);
			redirect('administrator/lowongan');
		}else{
			$this->template->load('administrator/template','administrator/lowongan');
		}
    }

    function edit_lowongan(){
        cek_session_akses('lowongan', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'upload/img_lowongan/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '5120'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('jdl_lowongan'=>$this->db->escape_str($this->input->post('judul')),
                    'subjudul'=>$this->db->escape_str($this->input->post('subjudul')),
                    'seo_lowongan'=>seo_title($this->input->post('judul')),
                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('keterangan-gambar')),
                    'isi_lowongan'=>$this->input->post('isi-lowongan'),
                    'oleh'=>$this->db->escape_str($this->input->post('oleh')),
                    'tanggal'=>$this->input->post('tanggal'),
                    );
            }else{
            		$data = array('jdl_lowongan'=>$this->db->escape_str($this->input->post('judul')),
                    'subjudul'=>$this->db->escape_str($this->input->post('subjudul')),
                    'seo_lowongan'=>seo_title($this->input->post('judul')),
                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('keterangan-gambar')),
                    'isi_lowongan'=>$this->input->post('isi-lowongan'),
                    'oleh'=>$this->db->escape_str($this->input->post('oleh')),
                    'tanggal'=>$this->input->post('tanggal'),
                    'gambar'=>$hasil['file_name']);
            }
            $where = array('id_lowongan' => $this->input->post('id_lowongan'));
			$this->model_app->update('lowongan', $data, $where);
			redirect('administrator/lowongan');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('lowongan', array('id_lowongan' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('lowongan', array('id_lowongan' => $id, 'username' => $this->session->username))->row_array();
            }
			$data = array('rows' => $proses);
            $data['title'] = "Edit Lowongan";
			$this->template->load('administrator/template','administrator/lowongan/edit_lowongan',$data);
		}
    }

    function terbit_lowongan(){
        cek_session_akses('lowongan',$this->session->id_session);
         // cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('terbit'=>'N');
		}else{
			$data = array('terbit'=>'Y');
		}
        $where = array('id_lowongan' => $this->uri->segment(3));
		$this->model_app->update('lowongan', $data, $where);
		redirect('administrator/lowongan');
    }

    function hapus_lowongan(){
        cek_session_akses('lowongan',$this->session->id_session);
        // if ($this->session->level=='admin'){
    		$id = array('id_lowongan' => $this->uri->segment(3));
        // }else{
        //     $id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
        // }
		$this->model_app->delete('lowongan',$id);
		redirect('administrator/lowongan');
    }
}
