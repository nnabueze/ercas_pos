<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->helper('url');
		$this->load->view('pos_message');
	}
	function users()
	{
		/*echo "string";
		die;*/
		
		$pos_name = $this->input->post('pos_name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('propel/Collector');

		$data['random'] = $this->Collector->setCollector($pos_name, $username, $password);
		$this->load->view('pos_message',$data);

		
	}


}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */