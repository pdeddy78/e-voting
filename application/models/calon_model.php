<?php
class calon_model extends CI_Model{ 

	private $table_name='t_calon';
	
	function calon_model(){
		parent::__construct();
	}
	
	function vote(){
		if($this->session->userdata('PILIH')==0){
			$nama=$this->session->userdata('NAMA');
			$voting=$this->input->post('voting');
			$query=$this->db->query("select * from t_calon");
			$data=array($query);
			if($voting=='calon1'){
			$this->db->query("update t_calon SET calon_I=calon_I+1");
			$this->db->query("update t_user SET pilih='1' WHERE nama = '$nama'");
			redirect('vote/success');
			}	else if($voting=='calon2'){
				$this->db->query("update t_calon SET calon_II=calon_II+1");
				$this->db->query("update t_user SET pilih='1' WHERE nama = '$nama'");
				redirect('vote/success');
				}	else if($voting=='calon3'){
					$this->db->query("update t_calon SET calon_III=calon_III+1");
					$this->db->query("update t_user SET pilih='1' WHERE nama = '$nama'");
					redirect('vote/success');
					}	else if($voting=='calon4'){
						$this->db->query("update t_calon SET calon_IV=calon_IV+1");
						$this->db->query("update t_user SET pilih='1' WHERE nama = '$nama'");
						redirect('vote/success');
						}
		} else {
			echo "Anda sudah menggunakan hak pilih.";}
	}

}
// END calon_model Class

/* End of file calon_model.php */
/* Location: ./application/models/calon_model.php */
?>