<?php
class dashboard_model extends CI_Model{ 

	function dashboard_model()
	{
		parent::__construct();
	}
	
	function notifikasi(){
		$series='';
		$datenow=date("Y-m-d");
		$table='';
		$i=0;
		$table.='<div style="margin:10px"><h1>Notifikasi</h1><hr>';
		$query=$this->db->query("select *,barang.nama as namaitem,a.id as id ,anggota.nama as nama_anggota,(SELECT datediff(a.tanggalkembali,a.tanggal) ) as lmpinjam from pinjaman a
			left join anggota on anggota.id_anggota=a.id_anggota
			left join barang on barang.id_buku=a.id_buku			
			 where tanggalkembali='$datenow'
			ORDER BY a.id DESC");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$table.='
					<p><a href="#" style="float:none; margin:5px;" class="dark_green btn">
					<i class="icon-bell"></i>
					<b>'.$data->nama_anggota. '</b> Sudah Harus Mengembalikan Buku
					</a> <a href="#" style="float:none; margin:5px;" class="yellow btn">
					<b>'.$data->namaitem. '</b>
					</a></a> </p>					
                                    
									'; 
					$i++;
				}
				$table.='<h3>Anda Memiliki '.$i.' Notifikasi</h3></div>';
				return $table;
			}
	}
	function bulan(){
		$select="";
		$selected="";
		$select.="<select style='margin-top:5px;margin-right:5px;float:right' name='bulan' id='bulan'>";
				$select.="<option ";if(date("m")==01){$select.="selected='selected'";}  $select.="value='01'>Januari</option>";
				$select.="<option ";if(date("m")==02){$select.="selected='selected'";}  $select.="value='02'>Februari</option>";
				$select.="<option ";if(date("m")==03){$select.="selected='selected'";}  $select.="value='03'>Maret</option>";
				$select.="<option ";if(date("m")==04){$select.="selected='selected'";}  $select.="value='04'>April</option>";
				$select.="<option ";if(date("m")==05){$select.="selected='selected'";}  $select.="value='05'>Mei</option>";
				$select.="<option ";if(date("m")==06){$select.="selected='selected'";}  $select.="value='06'>Juni</option>";
				$select.="<option ";if(date("m")==07){$select.="selected='selected'";}  $select.="value='07'>Juli</option>";
				$select.="<option ";if(date("m")==08){$select.="selected='selected'";}  $select.="value='08'>Agustus</option>";
				$select.="<option ";if(date("m")==09){$select.="selected='selected'";}  $select.="value='09'>September</option>";
				$select.="<option ";if(date("m")==10){$select.="selected='selected'";}  $select.="value='10'>Oktober</option>";
				$select.="<option ";if(date("m")==11){$select.="selected='selected'";}  $select.="value='11'>November</option>";
				$select.="<option ";if(date("m")==12){$select.="selected='selected'";}  $select.="value='12'>Desember</option>";
		 
		$select.="</select>";
		return $select;
	}
	function tahun(){
		$select="";
		$selected="";
		$select.="<select   style='margin-top:5px;margin-right:5px;float:right' name='tahun' id='tahun'>";
		for($i=date("Y")-10;$i<=date("Y")+10;$i++){
			$selected='';
			if(date("Y")==$i){	$selected="selected='selected'";}
			$select.="<option $selected  value='".$i."'>$i</option>";
		}
		$select.="</select>";
		return $select;
	}	
	
}
// END RiskIssue_model Class

/* End of file RiskIssue_model.php */
/* Location: ./application/models/RiskIssue_model.php */
?>