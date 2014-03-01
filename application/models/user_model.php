<?php
class user_model extends CI_Model{ 
	
	function user_model()
	{
		parent::__construct();
	}
	function cek(){
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$query=$this->db->query("select t_user.nama,t_user.nim,t_user.username,t_user.password,t_user.status,t_user.role,t_user.pilih from t_user where username='$username' and password='$password'");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$data=array('LOGIN'=>TRUE,'NAMA'=>$data->nama,'STATUS'=>$data->status,'NIM'=>$data->nim,'ROLE'=>$data->role,'PILIH'=>$data->pilih);
					$this->session->set_userdata($data);
					//buat log LOGIN
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
						 $op=$time.' '.'Masuk sistem '.$log.PHP_EOL;
						 $fp = @fopen(LOG, 'a');
						 $write = @fwrite($fp, $op);
						 @fclose($fp);
					}
					write_log("| ".$this->session->userdata('NAMA'));
					redirect('home/index');		
				}
			} else {
				redirect('home/loginPage');
			}			
	}
	function getMenu(){
			$menus='';
			$role=$this->session->userdata('ROLE');
			$query=$this->db->query("select * from t_menu where role='$role' and aktif='1' order by urut ASC");
			if($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus .="<li><a href='".base_url().$data->url."'><i class='icon-tasks'></i>".$data->name."</a></li> ";
				}
				return $menus;
			}
	}
	function getRole(){
		$query=$this->db->query("select * from t_role");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus[]=$data;
				}
				return $menus;
			}
	}	
	function getDataPemilih($id=''){
			$query=$this->db->query("select  *  from t_user	where t_user.id='$id'");
			return $query->row();
	}

	function count($id=''){
		$jumlah='';
		$judul=$this->input->post('judul');
		$status=$this->session->userdata('STATUS');
		
		$query=$this->db->query("select count(1) as jumlah from t_user ");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
				$jumlah=$data->jumlah;
				}
				return $jumlah;
			}
	}
	function getUser($limit='',$offset=''){
			$menus='';
			$judul=$this->input->post('judul');
			$query=$this->db->query("select *,t_user.id as iduser,t_role.role as namarole from t_user left join t_role on t_role.id=t_user.role");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$menus[]=$data;
				}
				return $menus;
			}
		}
		function cekUser(){
			$username=$this->input->post('username');
			$query=$this->db->query("select count(1) as jumlah from t_user where username='$username' ");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
				$jumlah=$data->jumlah;
				}
				return $jumlah;
			}
		}
		function simpan(){
		$cek=$this->cekUser();
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$tipeuser=$this->input->post('tipeuser');
		$role=$this->input->post('role');
		$nama=$this->input->post('nama');
		$data=array(
	 	 'username'=>$username,
		 'nama'=>$nama,
		 'password'=>$password,
		 'status'=>$tipeuser,
		 'role'=>$role
		);
			if($cek==0){
			$this->db->trans_start();
			$this->db->insert('t_user',$data);
			$this->db->trans_complete(); 
			} else {
			$this->db->query("update t_user set role='$role',username='$username', password='$password', nama='$nama', status='$tipeuser' where username='$username'");	
			}
		}
		function deleteuser($id){
			$this->db->query("delete from t_user where id='$id'");	
		}
}
// END user_model Class

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
?>