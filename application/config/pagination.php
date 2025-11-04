<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');

/* This Application Must Be Used With BootStrap 3 *  */
// $config['full_tag_open'] = "";
// $config['full_tag_close'] ="";
// $config['num_tag_open'] = '';
// $config['num_tag_close'] = '';
// $config['cur_tag_open'] = "<span class='current'>";
// $config['cur_tag_close'] = "</span>";
// $config['next_tag_open'] = "";
// $config['next_tagl_close'] = "";
// $config['prev_tag_open'] = "";
// $config['prev_tagl_close'] = "";
// $config['first_tag_open'] = "";
// $config['first_tagl_close'] = "";
// $config['last_tag_open'] = "";
// $config['last_tagl_close'] = "<";

// end of file Pagination.php 
// Location config/pagination.php 
// By @emanisof 


$config['full_tag_open'] 	= '<br><div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
$config['full_tag_close'] 	= '</ul></nav></div>';
$config['num_tag_open'] 	= '<li class="page-item">';
$config['num_tag_close'] 	= '</li>';
$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
$config['next_tag_open'] 	= '<li class="page-item">';
$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></li>';
$config['prev_tag_open'] 	= '<li class="page-item">';
$config['prev_tagl_close'] 	= '</li>';
$config['first_tag_open'] 	= '<li class="page-item">';
$config['first_tagl_close'] = '</li>';
$config['last_tag_open'] 	= '<li class="page-item">';
$config['last_tagl_close'] 	= '</li>';
$config['attributes'] = array('class' => 'page-link');