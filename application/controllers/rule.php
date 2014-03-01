<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rule extends CI_Controller {
 
	function __construct(){	
		parent::__construct();
	}
	function index(){
		if($this->session->userdata('LOGIN')=='TRUE'){
		$data['judul']="Ketentuan";
		$this->load->view("rule/main",$data); 	} else {
		redirect('home/loginPage');		
		}
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
			$op=$time.' '.'Keluar sistem '.$log."\n".PHP_EOL;
			$fp = @fopen(LOG, 'a');
			$write = @fwrite($fp, $op);
			@fclose($fp);
			}
			write_log(": ".$this->session->userdata('NAMA'));	
		$this->session->sess_destroy();
		redirect('home/loginPage');		
	}	 
}

/* End of file rule.php */
/* Location: ./application/controllers/rule.php */