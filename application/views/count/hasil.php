<?php echo $total;?>
<table width="500" border="0" cellspacing="2" cellpadding="2">
<tr>
<td><table border="0" width="488">
<tr>
<td><img src="img/Calon1.jpg"></td>
<td width="100" align="left"><font size="2" face="verdana">&nbsp;&nbsp;Calon I</font></td>
<td width="24" align="right"></td>
<td width="10">&nbsp;</td>
<td width="356" align="left"><img src="img/stat.jpg" border="1" width="<?php echo $lebar_calon_I ?>" height="12"> <font size="2" face="verdana">
<?php echo $persen_calon_I."%"; ?></font></td>
</tr>
<tr>
<td><img src="img/Calon2.jpg"></td>
<td align="left"><font size="2" face="verdana">&nbsp;&nbsp;Calon II</font></td>
<td align="right"></td>
<td>&nbsp;</td>
<td align="left"><img src="img/stat.jpg" border="1" width="<?php echo $lebar_calon_II ?>" height="12"> <font size="2" face="verdana">
<?php echo $persen_calon_II."%";?></font> </td>
</tr>
<tr>
<td><img src="img/Calon3.jpg"></td>
<td align="left"><font size="2" face="verdana">&nbsp;&nbsp;Calon III</font></td>
<td align="right"></td>
<td>&nbsp;</td>
<td align="left"><img src="img/stat.jpg" border="1" width="<?php echo $lebar_calon_III ?>" height="12"> <font size="2" face="verdana">
<?php echo $persen_calon_III."%";?></font></td>
</tr>
<tr>
<td><img src="img/Calon4.jpg"></td>
<td align="left"><font size="2" face="verdana">&nbsp;&nbsp;Calon IV</font></td>
<td align="right"></td>
<td>&nbsp;</td>
<td align="left"><img src="img/stat.jpg" border="1" width="<?php echo $lebar_calon_IV ?>" height="12"> <font size="2" face="verdana">
<?php echo $persen_calon_IV."%";?></font></td>
</tr>

</table></td>
</tr>
</table>
<br>
<p><font face="verdana" size="2" color="#666666"><?php echo 'Total Voting : '.$sudah; ?><?php echo ' dari '.$pemilih; echo ' pemilih.'?></p>
<p><?php echo 'Belum Memilih : '.$belum.' pemilih.';?></font></p>
