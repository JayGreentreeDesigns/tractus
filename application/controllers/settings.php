<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function index()
	{
		$this->load->view('settings/index');
	}
	
	public function info() {
		$this->load->view('settings/info');
	}
	
	public function help() {
		$this->load->view('settings/help');
	}

}
