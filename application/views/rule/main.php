<!DOCTYPE html>
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
		 $op=$time.' '.'Di laman ketentuan '.$log."\n".PHP_EOL;
		 $fp = @fopen(LOG, 'a');
		 $write = @fwrite($fp, $op);
		 @fclose($fp);
	}
	write_log("| ".$this->session->userdata('NAMA'));
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PILPRESMA RAHARJA 2013</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="favicon.png" rel="icon" type="image/x-icon">
    <!-- styles -->
    <link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/stylesheet.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/simptip-mini.css" rel="stylesheet" />
    <script src="<?php echo base_url()?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()?>js/jquery-ui-1.10.3.js"></script>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>
<div id="infodlg" style="display:none"></div> 
    <header class="dark_grey"> <!-- Header start -->
        <a class="logo_image"><span class="hidden-480">Pemilihan Presiden Mahasiswa 2013</span></a>
        <ul class="header_actions pull-left hidden-480 hidden-768">
            <li rel="tooltip" data-placement="bottom" title="Hide/Show main navigation" ><a href="#" class="hide_navigation"><i class="icon-chevron-left"></i></a></li>
            <li rel="tooltip" data-placement="right" title="Change navigation color scheme" class="color_pick navigation_color_pick"><a class="iconic" href="#"><i class="icon-th"></i></a>
               
            </li>
        </ul>
        <ul class="header_actions">
            <li rel="tooltip" data-placement="left" title="Header color scheme" class="color_pick header_color_pick hidden-480"><a class="iconic" href="#"><i class="icon-th"></i></a>
             
            </li>
            <li rel="tooltip" data-placement="bottom" title="2 new messages" class="messages"><a class="iconic" href="#"><i class="icon-envelope-alt"></i> 2</a>
               
            </li>
            <li class="dropdown"><a href="#">Selamat Datang : <?php echo $this->session->userdata('NAMA'); ?> <i class="icon-angle-down"></i></a>
            </li>
            <li><a href="<?php echo base_url() ?>home/logout"><i class="icon-signout"></i> <span class="hidden-768 hidden-480">Logout</span></a></li>
            <li class="responsive_menu"><a class="iconic" href="#"><i class="icon-reorder"></i></a></li>
        </ul>
    </header>

    <div id="main_navigation" class="dark_grey"> <!-- Main navigation start -->
        <div class="inner_navigation">
           <ul class="main">
				<li><a class="blue btn" href="<?php echo base_url()?>home" ><i class="icon-tasks"></i>   STMIK Raharja Tangerang</a></li>
                <li><a href="<?php echo base_url()?>home"><i class="icon-tasks"></i>Halaman Depan</a></li> 
                <li><a href="<?php echo base_url()?>rule"><i class="icon-tasks"></i>Ketentuan</a></li> 
                <li><a href="<?php echo base_url()?>profile"><i class="icon-tasks"></i>Profil Calon</a></li> 
				<?php if($this->session->userdata('ROLE')==3) {?> 
				<li><a style="font-weight:bold" href="<?php echo base_url()?>vote"><i class="icon-tasks"></i>Pemilihan Suara</a></li> 
				<?php } ?>
				<?php if($this->session->userdata('STATUS')==0) {?> 				
                <li><a href="<?php echo base_url()?>report"><i class="icon-tasks"></i>Laporan Pemilihan Suara</a></li>
                <li><a href="<?php echo base_url()?>count"><i class="icon-tasks"></i>Laporan Perhitungan Suara</a></li>
                <li><a href="<?php echo base_url()?>user"><i class="icon-tasks"></i>User</a></li> 
                <?php } ?>				
				</ul>
                
        </div>
    </div>

    <div id="content"> <!-- Content start -->
      <div class="inner_content">
        <div class="widgets_area">
				<!-- <br> -->
				<h1><?php echo $judul; ?></h1>
                <hr>
					<div class="row-fluid" id="isiContent">	
            <!-- <div class="modal-body" id="isiContent"> -->						
					<p><?php $this->load->view('rule/rules'); ?>
					</p>
				</div>
				<div class="modal-footer">
				<p align='right'><br />Page rendered in {elapsed_time} seconds.</p>
				</div>
            </div>
        </div>
    </div>

    <!-- javascript -->

    <script src="<?php echo base_url()?>js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.collapsible.min.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.mCustomScrollbar.min.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.mousewheel.min.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.uniform.min.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url()?>js/library/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.easytabs.js"></script>
    <script src="<?php echo base_url()?>js/library/flot/excanvas.min.js"></script>
    <script src="<?php echo base_url()?>js/library/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>js/library/flot/jquery.flot.pie.js"></script>
	<script src="<?php echo base_url()?>js/library/flot/jquery.flot.selection.js"></script>
    <script src="<?php echo base_url()?>js/library/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url()?>js/library/flot/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url()?>js/library/maps/jquery.vmap.js"></script>
    <script src="<?php echo base_url()?>js/library/maps/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url()?>js/library/maps/data/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.autosize-min.js"></script>
    <script src="<?php echo base_url()?>js/library/charCount.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.minicolors.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.tagsinput.js"></script>
    <script src="<?php echo base_url()?>js/library/fullcalendar.min.js"></script>
    <!----------------------------------------------------------------------------------->
    <script src="<?php echo base_url()?>js/library/footable/footable.js"></script>
    <script src="<?php echo base_url()?>js/library/footable/data-generator.js"></script>
    <script src="<?php echo base_url()?>js/library/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo base_url()?>js/library/bootstrap-timepicker.js"></script>
    <script src="<?php echo base_url()?>js/library/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url()?>js/library/bootstrap-fileupload.js"></script>
    <script src="<?php echo base_url()?>js/library/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url()?>js/flatpoint_core.js"></script>
    <script src="<?php echo base_url()?>js/forms.js"></script>

  </body>
</html>
