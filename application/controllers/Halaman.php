<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Halaman extends CI_Controller {
	public function detail(){
		$query = $this->model_utama->view_join_one('halamanstatis','users','username',array('judul_seo' => $this->uri->segment(3)),'id_halaman','DESC',0,1);
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$data['title'] = cetak($row['judul']);
			$data['description'] = cetak($row['isi_halaman']);
			$data['keywords'] = cetak(str_replace(' ',', ',$row['judul']));
			$data['rows'] = $row;

			$dataa = array('dibaca'=>$row['dibaca']+1);
			$where = array('id_halaman' => $row['id_halaman']);
			$this->model_utama->update('halamanstatis', $dataa, $where);
			$this->template->load(template().'/template',template().'/detailhalaman',$data);
		}
	}

	// public function whistle_blowing()
	// {
	// 	$data['title'] = " Halaman whistleblowing Kejari Pelalawan ";
	// 	$data['description'] = " Halaman whistleblowing Kejari Pelalawan ";
	// 	$data['keywords'] = " Halaman whistleblowing Kejari Pelalawan ";
	// 	$data['page'] = " Halaman whistleblowing ";

	// 	$this->template->load(template().'/template',template().'/whistleblowing',$data);
	// }

	// public function simpan_whistleblowing()
	// {
	// 	if (isset($_POST['simpan_data'])) {

	// 		$nama   = $this->input->post('nama_lengkap');
	// 		$alamat = $this->input->post('alamat');
	// 		$email  = $this->input->post('email');
	// 		$no_hp  = $this->input->post('no_hp');
	// 		$jenis  = $this->input->post('jenis_pengaduan');
	// 		$pegawai  = $this->input->post('pegawai');
	// 		$subjek  = $this->input->post('subjek');
	// 		$isi  = $this->input->post('isi');

	// 		$mail_2 = 'email.kejati.riau@gmail.com';

	// 		$body = '<table> <tr> <td> '. $nama .' </td> </tr> <tr> <td> '. $alamat .' </td> </tr> <tr> <td> '. $email .' </td> </tr> <tr> <td> '. $no_hp .' </td> </tr> <tr> <td> '. $jenis .' </td> </tr> <tr> <td> '. $pegawai .' </td> </tr> <tr> <td> '. $subjek .' </td> </tr> <tr> <td> '. $isi .' </td> </tr> </table>';

	// 		require_once (APPPATH.'third_party/PHPMailer-Master/src/PHPMailer.php');
	// 		require_once (APPPATH.'third_party/PHPMailer-Master/src/SMTP.php');
	// 		require_once (APPPATH.'third_party/PHPMailer-Master/src/Exception.php');

	// 		$mail = new PHPMailer\PHPMailer\PHPMailer();          // Passing `true` enables exceptions

	// 		//Server settings
	// 	    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	// 	    $mail->isSMTP();                                      // Set mailer to use SMTP
	// 	    $mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
	// 	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	// 	    $mail->Username = 'email.kejati.riau@gmail.com';            // SMTP username
	// 	    $mail->Password = 'K3jati_ri4u';                    // SMTP password
	// 	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// 	    $mail->Port = 587;                                    // TCP port to connect to

	// 	    //Recipients
	// 	    $mail->setFrom($email);
	// 	    $mail->addAddress($mail_2);     // Add a recipient


	// 	    //Content
	// 	    $mail->isHTML(true);                                  // Set email format to HTML
	// 	    $mail->Subject = 'Pengaduan';
	// 	    $mail->Body    = $body . '<br>';
	// 	    // $mail->send();

	// 	    if ($mail->send())
	// 	    {
	// 	    	$this->session->set_flashdata('pesan','pengaduan berhasil');
	// 	    	redirect(site_url('Halaman/whistle_blowing'));
	// 	    } else {
	// 	    	$this->session->set_flashdata('pesan','pengaduan gagal');
	// 	    	redirect(site_url('Halaman/whistle_blowing'));
	// 	    }

	// 	}
	// }
}
