<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   //$this->model_login->getlogin($this->input->post('username'))
   /*
  public function login( , $this->input->post('password') ){
    $data = $this->model_login->selectByUsername($this->input->post('username'))->row_array();

    $userdata = array('' => ,

    );
  }
*/
	public function index()
	{
		$this->load->view('tampilan_login');
	}
}
