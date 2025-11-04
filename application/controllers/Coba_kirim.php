<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba_kirim extends CI_Controller {

public function index(){
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_port' => 'smtp.google.com',
            'smtp_user' => 'egov.diskominfo.pelalawan@gmail.com',
            'smtp_pass' => '**R4hasia',
            'smtp_crypto' => 'ssl',
            'smtp_port' => 465,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('egov.diskominfo.pelalawan@gmail.com', 'E-Gov Diskominfo Pelalawan');

        $this->email->to('hasan.suryaman@gmail.com');

        $this->email->attach();

        $this->email->subject('Test Kirim Email');

        $this->email->message('Ini adalah Isi <b>Pesan</b>');

        if($this->email->send()) {
            echo 'Sukses! email terkirim';
        } else {
            echo 'Gagal! email tidak dapat dikitim';
        }

    }
}
