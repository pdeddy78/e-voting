<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vote extends CI_Controller {
 
	function __construct(){	
		parent::__construct();
//		$this->load->library(array('form_validation'));
//		$this->load->helper(array('url','form'));
		$this->load->model('calon_model','',TRUE);
	}
	function index(){
		if($this->session->userdata('LOGIN')=='TRUE'){
			$data['judul']="Pemilihan Suara";
			$this->load->view("vote/main",$data);
		} else {
		redirect('home/loginPage');		
		}
	}
	function success(){
		$data['judul']="Success";
		$this->load->view("vote/success",$data);
		$this->session->sess_destroy();
	}
	
	function logout(){
	//buat log LOGOUT
		$_logfilename = "application\logs\log_".date("Y-m").".txt";
		if(!file_exists($_logfilename)){
			$_logfilehandler = fopen($_logfilename,'w'); 
			fclose($_logfilehandler);
			}else{
				$_logfilehandler = fopen($_logfilename,'a'); 
				}
			define('LOG',$_logfilename);
			function write_log($log){  
			$time = @date('[d-m-Y:H:i:s]');	 
			$op=$time.' '.'Pemilihan suara '.$log."\n".PHP_EOL;
			$fp = @fopen(LOG, 'a');
			$write = @fwrite($fp, $op);
			@fclose($fp);
			}
			write_log(": ".$this->session->userdata('NAMA'));	
		$this->session->sess_destroy();
		redirect('home/loginPage');		
	}	 
}

/* End of file vote.php */
/* Location: ./application/controllers/vote.php */