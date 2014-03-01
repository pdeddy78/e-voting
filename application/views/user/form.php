     <!-- javascript -->
 
   <link rel="stylesheet" href="<?php echo base_url();?>css/themes/jquery.ui.all.css" type="text/css" />
  	<script>
	$(document).ready(function() {
			$( ".datepicker" ).datepicker();
	});

	function cariPemilih(){
		var nim=$("#nim").val();
		$.ajax({
			url:'<?php echo base_url(); ?>user/addForm/',		 
			type:'POST',
			data:"nim="+nim,
			success:function(data){ 
			  	if(data==''){
					 $( "#infodlg" ).html('Nim Tidak tersedia Harap Periksa Kembali ...');
					 $( "#infodlg" ).dialog({ title:"Info...", draggable: false});					 
				} else {
				   $("#isiContent").html(data);
				}
			 }
		});		
	}
	function save(){
		$.ajax({
			url:'<?php echo base_url(); ?>user/simpan/',		 
			type:'POST',
			data:$('#frmsave').serialize(),
			success:function(data){ 
			  	if(data!=''){
					 $( "#infodlg" ).html(data);
					 $( "#infodlg" ).dialog({ title:"Info...", draggable: false});					 
				} else {
					 window.location="<?php echo base_url() ?>user";
				}
			 }
		});		
	}
	function confirmdlg(){
					$("#confirm").dialog({
					 resizable: false,
					 modal: true,
					 title:"Info...",
					 draggable: false,
					 width: 'auto',
					 
					 height: 'auto',
					 buttons: {
					 "Ya": function(){
						 save();   
						  $(this).dialog("close");
					  },
					  "Tutup": function(){
						   $(this).dialog("close");
						}
					 }
				  });
 
			}
			
	</script>
	  	
				<?php   isset($infouser['status']) ? $st=$infouser['status'] : $st=''; ?>
                <?php   isset($infouser['role']) ? $rl=$infouser['role'] : $rl=''; ?>
                     <div class="span6">
                        <div class="well grey">
                            <div class="well-header">
                                <h5>Tambah / Ubah User   </h5>
                            </div>
								<div class="well-content no-search">
                                <form id="frmsave" name="frmsave">
                                  
									<h3>Detail User </h3>
                                     <div class="form_row">
                                        <label class="field_name">Nama</label>
                                        <div class="field">
                                           <input type="text"  value="<?php echo isset($infouser['nama']) ? $infouser['nama'] : ''; ?>" name="nama" id="nama" class="input-large"   placeholder="NAMA"> 
										</div>
									 </div>
									 <div class="form_row">
                                        <label class="field_name">Username</label>
                                        <div class="field">
                                           <input type="text"  value="<?php echo isset($infouser['username']) ? $infouser['username'] : ''; ?>" name="username" id="username" class="input-large"   placeholder="USERNAME"> 
										</div>
									 </div>
									 <div class="form_row">
                                        <label class="field_name">Password</label>
                                        <div class="field">
                                           <input type="password"  value="" name="password" id="password" class="input-large"   placeholder="PASSWORD"> 
										</div>
									 </div>
									 	
									 <div class="form_row">
                                        <label class="field_name">Jenis User</label>
                                        <div class="field">
                                           <select class="span6" id="tipeuser" name="tipeuser">
                                                <option  <?php if($st==0){ echo 'selected="selected"';} ?> value="0">Administrator</option>
                                                <option  <?php if($st==1){ echo 'selected="selected"';} ?> value="1">User</option>
                                            </select>
 										</div>
                                    </div>
									 <div class="form_row">
                                        <label class="field_name">Role</label>
                                        <div class="field">
                                           <select class="span6" id="role" name="role">
                                              <?php  if(!empty($role)) { foreach($role as $role) { ?> 
                                                <option  <?php if($rl==$role->id){ echo 'selected="selected"';} ?> value="<?php echo $role->id?>"><?php echo $role->role?></option>
                                              <?php }} ?>
                                            </select>
 										</div>
                                    </div>
                                    <div class="form_row">
                                        <div class="field">
                                            <a onclick="return confirmdlg()" class="blue btn">Submit</a>
                                            <a  href="<?php echo base_url() ?>user" class="red btn">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

    <div id="confirm" style="display:none"> Anda Ingin Meyimpan data ini</div>     


  </body>
</html>
