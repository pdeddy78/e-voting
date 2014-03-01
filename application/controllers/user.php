<?php  

class user extends CI_Controller {
 
	var $limit=10;
	var $offset=10;	
	public function user() {
        parent::__construct();
        if ($this->session->userdata('LOGIN') != 'TRUE') {
           redirect('home/loginPage');			
        } 
    }	
	function index($limit='',$offset=''){
		$this->load->model("init"); 
		$this->init->getLasturl();
		
		if($this->session->userdata('LOGIN')=='TRUE'){
			$this->load->model("user_model"); 
		$data['judul']='User';
		/* VAGINATION */
		if($limit==''){ $limit = 0; $offset=10 ;}
		if($limit!=''){ $limit = $limit ; $offset=$this->offset ;}
		$data['count']=$this->user_model->count();	
		$config['base_url'] = base_url().'user/search/';
		$config['total_rows'] = $data['count'];
		$config['per_page'] = $this->limit;    
		$config['cur_tag_open'] = '<span class="pg">';
		$config['cur_tag_close'] = '</span>';		
		$this->pagination->initialize($config);
		/*----------------*/
		$data['menu']=$this->user_model->getMenu();
		$data['query']=$this->user_model->getUser($limit,$offset);
		$data['view']='user/user';
		$this->load->view('index',$data);
		}else {
		redirect('home/loginPage');		
		}

	}
	function search($limit='',$offset=''){
	 	$this->load->model("user_model"); 
		/* VAGINATION */
		if($limit==''){ $limit = 0; $offset=10 ;}
		if($limit!=''){ $limit = $limit ; $offset=$this->offset ;}
		$data['count']=$this->user_model->count();	
		$config['base_url'] = base_url().'user/search/';
		$config['total_rows'] = $data['count'];
		$config['per_page'] = $this->limit;    
		$config['cur_tag_open'] = '<span class="pg">';
		$config['cur_tag_close'] = '</span>';		
		$this->pagination->initialize($config);
		/*----------------*/
 
		$data['query']=$this->user_model->getUser($limit,$offset);
		$this->load->view('user/user',$data);
	}
	
	function add($id=''){		 
		$this->load->model("user_model"); 
		$data['judul']='Tambah User';
		$data['menu']=$this->user_model->getMenu();
		if($id!=''){
		$info=$this->user_model->getDataPemilih($id);		 
			$data['infouser']['username']=$info->username;
			$data['infouser']['status']=$info->status;
			$data['infouser']['role']=$info->role;
			$data['infouser']['nama']=$info->nama;
			$data['role']=$this->user_model->getRole($data['infouser']['role']);
		}	
		$data['role']=$this->user_model->getRole();
		$data['view']='user/form';
		$this->load->view('index',$data);

	}
	function ubah($id=''){		 
		$this->load->model("user_model"); 
		$data['judul']='Ubah User';
		$data['menu']=$this->user_model->getMenu();
		if($id!=''){
		$info=$this->user_model->getDataPemilih($id);		 
			$data['infouser']['username']=$info->username;
			$data['infouser']['status']=$info->status;
			$data['infouser']['role']=$info->role;
			$data['infouser']['nama']=$info->nama;
			$data['role']=$this->user_model->getRole($data['infouser']['role']);
		}	
		$data['role']=$this->user_model->getRole();
		$data['view']='user/form';
		$this->load->view('index',$data);

	}
	function addForm(){
		$nim=$this->input->post('nim');
		$this->load->model("user_model"); 
		$data['judul']='user_model Pemilih';
		if($nim!=''){
		$info=$this->user_model->getDataPemilihbyNim($nim);		 
		if(!empty($info)){
			$data['infouser']['nim']=$info->nim;
			$data['infouser']['nama']=$info->nama;
			$data['query']=$this->user_model->getDataPemilih($info->id);
			} else {
			echo '<script> $( "#infodlg" ).html("Nim Tidak tersedia Harap Periksa Kembali ...");
					 $( "#infodlg" ).dialog({ title:"Info...", draggable: false});		</script>';
		  }		
		}	
		$data['role']=$this->user_model->getRole();
		$this->load->view('user/form',$data);
	}
	function detailPemilih($id=''){
			$this->load->model("List_User"); 
			$this->List_User->detailPemilih($id);
	}		
	function simpan(){
		$this->load->model("user_model"); 
		if($this->input->post('username')==''){
			echo "Username Tidak Boleh Kosong"; return false;
		} else if($this->input->post('password')==''){
			echo "Password Tidak Boleh Kosong"; return false;
		} else if($this->input->post('tipeuser')==''){
			echo "Status tidak Boleh Kosong"; return false;
		}  
		$this->user_model->simpan();
	}
	
//	function logs(){
//		$this->load->model("logs"); 
//	}	

	function deleteuser($id){
		$this->load->model("user_model"); 
		$this->user_model->deleteuser($id);
	}	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */