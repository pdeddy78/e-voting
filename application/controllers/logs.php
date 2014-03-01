<?php
	$_logfilename = "application\logs\log_".date("Y-m").".txt";
	if(!file_exists($_logfilename)){
		$_logfilehandler = fopen($_logfilename,'w'); //buat file dengan akses tulis penuh
		fclose($_logfilehandler);
	}else{
		$_logfilehandler = fopen($_logfilename,'a'); //akses file dengan modus buka/tulis
	}
	define('LOG',$_logfilename);
	
	function write_log($log){  
		 $time = @date('[d-m-Y:H:i:s]');	 
		 $op=$time.' '.'Action for '.$log."\n".PHP_EOL;
		 $fp = @fopen(LOG, 'a');
		 $write = @fwrite($fp, $op);
		 @fclose($fp);
	}
?>