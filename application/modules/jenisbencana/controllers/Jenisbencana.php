<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisbencana extends CI_Controller {
	public function index()
	{
		//$this->load->view('v_dashboard');
        $this->load->library('auth', "jenisbencana");
		$data["me"]=$this->auth->me();
        $this->template->load('template','v_jenisbencana',$data);
	}
}
