<?php  

class profile extends CI_Controller {
 
	var $limit=10;
	var $offset=10;	
	function index($limit='',$offset=''){	
		$this->load->model("init"); 
		$this->init->getLasturl();
		$this->load->model("dashboard_model");
		if($this->session->userdata('LOGIN')=='TRUE'){
		$data['judul']='Profil Calon';
		$data['bulan']=$this->dashboard_model->bulan();
		$data['tahun']=$this->dashboard_model->tahun();
		/*----------------*/
		 
		$data['view']='dashboard';
		$this->load->view('index',$data); } else {
		redirect('home/loginPage');		
		}
	}
	function loginPage(){
		$this->load->view('login');
	}
	function loginAct(){
		$this->load->model("user_model");
		$this->user_model->cek();
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */