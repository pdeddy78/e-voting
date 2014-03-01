<?php
class count_model extends CI_Model{ 

	private $table_name='t_calon';
	
	function count_model(){
		parent::__construct();
	}
	function sudah(){
		$query=$this->db->query("select count(*) as tot from t_user where pilih='1'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
				$sudah=$data->tot;
				}
				return $sudah;
			}
	}
	function belum(){
		$query=$this->db->query("select count(*) as tot from t_user where pilih='0'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
				$belum=$data->tot;
				}
				return $belum;
			}
	}	
	function pemilih(){
		$query=$this->db->query("select count(*) as tot from t_user where role='3'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
				$pemilih=$data->tot;
				}
				return $pemilih;
			}
	}
	function hasil(){
		$hasil=$this->db->query("select * from t_calon");
		foreach($hasil->result_array() as $row);{
			echo $row['calon_I'];
			echo $row['calon_II'];
			echo $row['calon_III'];
			echo $row['calon_IV'];
		}
//		if($hasil->num_rows()>0){
//			$count=$hasil->row();
//			echo $count->calon_I;
//			echo $count->calon_II;
//			echo $count->calon_III;
//			echo $count->calon_IV;
//		}
//		list($calon_I,$calon_II,$calon_III,$calon_IV)=$row;
//		$total = calon_I+calon_II+calon_III+calon_Iv=V;
		$total = 'calon_I'+'calon_II'+'calon_III'+'calon_IV';
	}
	
	function persen(){
//		$this->load->model("count_model");
//		$this->count_model->hasil();
//		$total = 'calon_I'+'calon_II'+'calon_III'+'calon_IV';
		$total=$this->hasil();
		
		$persen_calon_I=('calon_I'!=0)?('calon_I'/$total) * 100:0;
		$persen_calon_II=('calon_II'!=0)?('calon_II'/$total) * 100:0;
		$persen_calon_III=('calon_III'!=0)?('calon_III'/$total) * 100:0;
		$persen_calon_IV=('calon_IV'!=0)?('calon_IV'/$total) * 100:0;
		
//		$persen_calon_I=round(('calon_I'/$total)*100,2);
//		$persen_calon_II=round(('calon_II'/$total)*100,2);
//		$persen_calon_III=round(('calon_III'/$total)*100,2);
//		$persen_calon_IV=round(('calon_IV'/$total)*100,2);
	}
	
	function batangmu(){
		//deklarasi
		$persen_calon_I=$this->persen();
		$persen_calon_II=$this->persen();
		$persen_calon_III=$this->persen();
		$persen_calon_IV=$this->persen();
		
		$lebar_calon_I=$persen_calon_I*2;
		$lebar_calon_II=$persen_calon_II*2;
		$lebar_calon_III=$persen_calon_III*2;
		$lebar_calon_IV=$persen_calon_IV*2;
	}	

}
// END count_model Class

/* End of file count_model.php */
/* Location: ./application/models/count_model.php */
?>