<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Pemilihan PresMa 2013 | STMIK RAHARJA</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="favicon.ico" rel="icon" type="image/x-icon">
</head>
<body>
<div class="row-fluid" align="center">
<?php echo form_open($this->calon_model->vote());?>
	<form id="form1" name="form1" method="post" >		
		<table width="700" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
		<td align="center"><img src="img/Calon1.jpg"><br>Calon I<br><?php echo form_radio('voting','calon1',FALSE); ?></td>
		<td align="center"><img src="img/Calon2.jpg"><br>Calon II<br><?php echo form_radio('voting','calon2',FALSE); ?></td>
		<td align="center"><img src="img/Calon3.jpg"><br>Calon III<br><?php echo form_radio('voting','calon3',FALSE); ?></td>
		<td align="center"><img src="img/Calon4.jpg"><br>Calon IV<br><?php echo form_radio('voting','calon4',FALSE); ?></td>
		</tr>
		</br>
		</table>
		</br>
	<td>
	<input class="btn btn-success" type="submit" value="Submit" name="tombol">&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="btn btn-danger"type="reset" value="Reset" name="tombol">
	</td>
	</form>
</div>
<br><br>
</body>
</html>