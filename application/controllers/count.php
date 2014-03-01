<?php  

class Count extends CI_Controller {
	
	function __construct(){	
		parent::__construct();
//		$this->load->model('count_model','',TRUE);
	}
	
	function index(){
		$this->load->model("count_model");
		if($this->session->userdata('LOGIN')=='TRUE'){
			$data['judul']="Laporan Pemilihan Suara";
			$data['sudah']=$this->count_model->sudah();
			$data['belum']=$this->count_model->belum();
			$data['pemilih']=$this->count_model->pemilih();
			$data['total']=$this->count_model->hasil();
			$data['persen_calon_I']=$this->count_model->persen();
			$data['persen_calon_II']=$this->count_model->persen();
			$data['persen_calon_III']=$this->count_model->persen();
			$data['persen_calon_IV']=$this->count_model->persen();
			$data['lebar_calon_I']=$this->count_model->batangmu();
			$data['lebar_calon_II']=$this->count_model->batangmu();
			$data['lebar_calon_III']=$this->count_model->batangmu();
			$data['lebar_calon_IV']=$this->count_model->batangmu();
			$data['view']='count/main';
			$this->load->view("count/main",$data);
		} else {
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

/* End of file count.php */
/* Location: ./application/controllers/count.php */