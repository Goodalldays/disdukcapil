<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Unit_kerja extends CI_Controller
{
    public function index()
    {

        
        $data['title'] = "Unit Kerja";
        $data['description'] = description();
        $data['keywords'] = keywords();
        $data['jabatan1']  = $this->db->query('SELECT * FROM jabatan WHERE id_parent=0 ORDER BY id_jabatan ASC');
        $data['jabatan2'] = $this->db->query('SELECT * FROM jabatan WHERE id_parent="$jabatan1[id_jabatan]" ORDER BY id_jabatan ASC');
        
       
        
        $this->template->load(template() . '/template', template() . '/unit_kerja', $data);
    }
}
