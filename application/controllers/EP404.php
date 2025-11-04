<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EP404 extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		
		$this->load->view('page_404');
	}
	
}
