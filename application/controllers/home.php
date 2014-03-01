<?php  

class home extends CI_Controller {
 
	var $limit=10;
	var $offset=10;	
	function index($limit='',$offset=''){	
		$this->load->model("init"); 
		$this->init->getLasturl();
		$this->load->model("dashboard_model");
		if($this->session->userdata('LOGIN')=='TRUE'){
		$data['judul']='Selamat Datang';
		$data['bulan']=$this->dashboard_model->bulan();
		$data['tahun']=$this->dashboard_model->tahun();
		/*----------------*/
		 
		$data['view']='dashboard';
		$this->load->view('index',$data); } else {
		redirect('home/loginPage');		
		}
	}
	
//	function notifikasi(){
//		$this->load->model("dashboard_model");
//		$data['table']=$this->dashboard_model->notifikasi();
//		$this->load->view('dashboard/chart2',$data);
//	}

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
			$op=$time.' '.'Keluar sistem '.$log.PHP_EOL;
			$fp = @fopen(LOG, 'a');
			$write = @fwrite($fp, $op);
			@fclose($fp);
			}
			write_log("| ".$this->session->userdata('NAMA'));	
		$this->session->sess_destroy();
		redirect('home/loginPage');		
	}
	function poster(){
		$data['judul']='Tree Desain.Com';
		$data['view']='poster.php';
		$table='<div class="btn blue" style="width:1030px"><h4><strong>DASHBOARD</strong><br>http://www.treedesain.com</h4></div><br><br>';
		$table.='<div class="span3"  style="margin-right:50px;width:500px;float:left;">
                        <div class="well blue">
                            <div class="well-header price-head">
                                <h5 class="center" >Free Version</h5>
							 
                            </div>
                            <div class="well-content price-table">
                                <h4 class="price" style="color:#000"> 
                                    <label style="color:#000"><i>Rp.</i></label>
                                    0
                                     
                                </h4>
                                <ul>
                                    <li><i class="icon-certificate"></i> Bisnis Proses</li>
                                    <li><i class="icon-certificate"></i> Database MySQL</li>
                                    <li><i class="icon-certificate"></i> Php Code Igniter Framework</li>
                                    <li><i class="icon-certificate"></i> Jquery UI  </li>
                                </ul>
                            </div>
                        </div>
                    </div>';
		$table.='<div class="span3"  style="margin-right:0px;width:500px;float:left">
                        <div class="well blue">
                            <div class="well-header price-head">
                                <h5 class="center" >Full Version</h5>
                            </div>
                            <div class="well-content price-table">
                                <h4 class="price" style="color:#000"> 
                                    <label style="color:#000"><i>Rp.</i></label>
                                    100.000                                     
                                </h4>
                                <ul>
                                    <li><i class="icon-certificate"></i> Bisnis Proses</li>
                                    <li><i class="icon-certificate"></i> Database MySQL</li>
                                    <li><i class="icon-certificate"></i> Php Code Igniter Framework</li>
                                    <li><i class="icon-certificate"></i> Jquery UI  </li>
								    <li><i class="icon-certificate"></i> Pencarian  </li>	
								    <li><i class="icon-certificate"></i> Pagination  </li>	
									<li><i class="icon-certificate"></i> Pengatuan Menu  </li>	
								    <li><i class="icon-certificate"></i> Pengaturan Role  </li>	
									
                                </ul>
                            </div>
                        </div>
                    </div>';
		$table.='<div class="btn blue" style="width:480px;"><h4 style="font-size:30px;padding:10px;text-align:left"><strong>HUB : 0856-594-336-93</strong></h4></div>';			
		$data['table']=$table;
		
		$this->load->view('index',$data);  
	}
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */