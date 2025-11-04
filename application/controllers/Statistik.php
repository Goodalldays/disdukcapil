<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Statistik extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Statistik";
        $data['description'] = description();
        $data['keywords'] = keywords();

        $this->template->load(template() . '/template', template() . '/statistik', $data);
    }
}
