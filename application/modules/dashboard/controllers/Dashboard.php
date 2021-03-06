<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	const SESSION_KEY = 'user_id';
	public function __construct()
	{
			parent::__construct();
			$this->load->model('Dashboard_model');
	}
	public function index()
	{
		//$this->load->view('v_dashboard');
		// $this->load->library('auth');
		// $me=$this->auth->me();
		// if ($me) {
		// 	$data["me"]= $me;
		// 	$this->template->load('template','v_dashboard',$data);
		// }else{
		// 	$this->session->set_flashdata('msg', 'Akses tidak di izinkan, silahkan login dulu.');
		// 	header("Location: /login");
			
		// }
		$filter_jenis=$this->input->get('jenis', TRUE);
		$filter_waktu=$this->input->get('waktu', TRUE);
		if(!isset($filter_jenis)) $filter_jenis=null;
		if(!isset($filter_waktu)) $filter_waktu=null;

		$this->load->library('auth', ".");
		$data["me"]=$this->auth->me();
		$data["bencanas"]=$this->Dashboard_model->getAll($filter_waktu,$filter_jenis);
		$data["jenis"]=$this->Dashboard_model->getAllJenis();
		$data["param_jen"]=$filter_jenis;
		$data["param_wak"]=$filter_waktu;
        $this->template->load('template','v_dashboard',$data);
	}
	public function signout(){
		echo "ok keluar";
		$this->session->unset_userdata(self::SESSION_KEY);
		header("Location: /login");
	}
}
