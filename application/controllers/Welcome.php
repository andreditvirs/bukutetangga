<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template'));
	}

	public function index()
	{
		$data = array('title' => 'Dashboard');
		$this->template->admin('konten/dashboard',$data);
	}
}
?>
