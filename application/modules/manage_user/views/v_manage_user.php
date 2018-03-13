<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
	$(function(){
		var user_id = "<?php echo site_url().'manage_user/c_manage_user/get_user_id';?>";
		$( "#user_id" ).autocomplete({
	      source: user_id,
	      minLength: 3,
	      select: function(event, ui) {
	        if(ui.item.label == "Data Not found"){
	          $("#id_user").val("");
	        }else{
	            $("#id_user").val(ui.item.code);
	            $("#gambars").hide('slow');
	        }
	      }
	    });
	})
</script>
	
<script>
	function nongol() {
    	$("#button_create").hide('slow');
    	$("#form_user").show('slow');
	}
</script>

<script>
	function mendem() {
    	$("#button_create").show('slow');
    	$("#form_user").hide('slow');
	}
</script>

<script>
    function getRegional(elem){
        if(elem.value == 2){
            $("#regional").show('fast');
        }   
        else
        {
            $("#regional").hide('fast');
        }
    }
</script>

<script>
    function heldi() {
        var oke = $("#user_id").val();
        var tes = oke.length;
        if(tes >= 3)
        {
            $("#gambars").show('slow');
        }
        else
        {
            $("#gambars").hide('slow');
        }

    }
</script>

<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" id="button_create">
	<button type="button" class="btn btn-info btn-custom waves-effect waves-light" title="Create User" onclick="nongol()">Create +</button>				
</form>
<br/>

<div class="row" style="display:none;" id="form_user">
	<div class="col-sm-6">
		<div class="card-box">
			<div class="row">
		      	<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('create_user');?>" enctype="multipart/form-data">
		      		<div class="col-md-12">
		      			<div class="col-md-8">
		              		<div class="form-group">
		                        <label class="col-md-4 control-label">User ID</label>
		                        <div class="col-md-8">
		                            <input type="text" required class="form-control"  title="Input User ID" id="user_id" style="text-transform:uppercase;" onkeyup="heldi();">
		                            <input type="hidden" required class="form-control" name="user_id"  title="Input User ID" id="id_user">
		                            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
		                        </div>
		                    </div>
		                	
		                	<div class="form-group">
		                        <label class="col-md-4 control-label">Role</label>
		                        <div class="col-md-8">
		                            <select class="form-control" required name="role" title="Pilih Role User" onChange="getRegional(this)">
		                            	<option value="" disabled selected>Choose</option>
		                            	<?php foreach($role as $r) { ?>
		                            	<option value="<?php echo $r['ID_ROLE'] ?>"> <?php echo $r['ROLE'] ?>
		                            	</option>
		                            	<?php } ?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="form-group" id="regional" style="display: none;">
		                        <label class="col-md-4 control-label">Regional</label>
		                        <div class="col-md-8">
		                            <select class="form-control" name="regional" title="Pilih Regional">
		                            	<option value="" disabled selected>Choose</option>
		                            	<option value="1">1</option>
		                            	<option value="2">2</option>
		                            	<option value="3">3</option>
		                            	<option value="4">4</option>
		                            	<option value="5">5</option>
		                            	<option value="6">6</option>
		                            	<option value="7">7</option>
		                            	<option value="8">8</option>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-md-4 control-label">Level</label>
		                        <div class="col-md-8">
		                            <select class="form-control" required name="level" title="Pilih Level">
		                            	<option value="" disabled selected>Choose</option>
		                            	<?php foreach($level as $l) { ?>
		                            	<option value="<?php echo $l['ID_LEVEL_USER'] ?>"> <?php echo $l['LEVEL_USER'] ?> 
		                            	</option>
		                            	<?php } ?>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-md-4 control-label">Email</label>
		                        <div class="col-md-8">
		                            <input type="email" name="email" required="" class="form-control">
		                        </div>
		                    </div>
		                    <div class="form-group">
		                    	<label class="col-md-4 control-label"></label>
		                    	<div class="col-md-8">
		                        	<button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process">Save</button>
		                        	
									<button type="button" class="btn btn-danger waves-effect waves-light" title="Cancel Process" onclick="mendem()">Cancel</button>
									
								</div>
		                    </div>
		                </div>
		            </div>
		      	</form>
		    </div>
		</div>
	</div>
	</div>

<?php
    if ($this->session->flashdata('success_edit')!="")
    {
    ?>
    <div class="alert alert-success">
        <h3><center><?php echo $this->session->flashdata('success_edit');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('erorr_edit')!="")
    {
    ?>
    <div class="alert alert-danger">
        <h3><center><?php echo $this->session->flashdata('erorr_edit');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('erorr_delete')!="")
    {
    ?>
    <div class="alert alert-danger">
        <h3><center><?php echo $this->session->flashdata('erorr_delete');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('success_delete')!="")
    {
    ?>
    <div class="alert alert-success">
        <h3><center><?php echo $this->session->flashdata('success_delete');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('success_message')!="")
    {
    ?>
    <div class="alert alert-success">
        <h3><center><?php echo $this->session->flashdata('success_message');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('erorr_message')!="")
    {
    ?>
    <div class="alert alert-danger">
        <h3><center><?php echo $this->session->flashdata('erorr_message');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('success_reset')!="")
    {
    ?>
    <div class="alert alert-success">
        <h3><center><?php echo $this->session->flashdata('success_reset');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('erorr_reset')!="")
    {
    ?>
    <div class="alert alert-danger">
        <h3><center><?php echo $this->session->flashdata('erorr_reset');  ?></center></h3>
    </div>
    <?php
    }
?>

<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive" style="padding: 0 auto">
			<div class="row">
				<table id="mydata" class="table table-bordered table-hover table-responsive">
					<thead style="background-color:#1ABC9C;white-space: nowrap">
						<th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">No</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">USER ID</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">USERNAME</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ROLE</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">BRANCH</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ZONE</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ORIGIN</th>  
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">LEVEL</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REGIONAL</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">EMAIL</th>
	                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
					<tbody>
						<?php 
						$n=1;
						foreach($user as $u){ ?>
						<tr id="data_row_<?php echo$n; ?>" style="text-transform: uppercase;">
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['USER_ID'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['USER_NAME'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['ROLE'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['USER_BRANCH'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['USER_ZONE_CODE'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['USER_ORIGIN'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['LEVEL_USER'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['USER_REGIONAL'] ?></td>
							<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $u['USER_EMAIL'] ?></td>
							<td class="text-center">
								<?php $session = $u['USER_SESSION'] ?>
								<a href="<?php echo site_url().'manage_user/c_manage_user/edit_user/'.$session?>" onclick="return confirm('Yakin User <?php echo $u['USER_NAME'] ;?> akan di Edit ?')" data-toggle="modal" data-target=".bs-example-modal-lg">
									<button class="btn btn-warning waves-effect waves-light btn-xs" title="Edit User">Edit</button>
								</a>
								<a href="<?php echo site_url().'manage_user/c_manage_user/delete_user/'.$session?>" onclick="return confirm('Yakin User <?php echo $u['USER_NAME'] ;?> akan di Hapus ?')">
									<button class="btn btn-danger waves-effect waves-light btn-xs" title="Delete User">Delete</button>
								</a>
								<!--
								<a href="<?php echo site_url().'manage_user/c_manage_user/reset_password/'.$session?>" onclick="return confirm('Yakin Password User <?php echo $u['USER_NAME'] ;?> akan di Reset ?')">
									<button class="btn btn-primary waves-effect waves-light btn-xs" title="Reset Password">Reset</button>
								</a>
								-->
							</td>
						</tr>
						<?php $n++; } ?>
					</tbody>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
		<!-- sample modal content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                    </div>
                    <div class="modal-body">
                    	
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h2 class="modal-title" id="myLargeModalLabel" align="center">Edit User</h2>
                    </div>
                    <div class="modal-body">
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <div class="button-list">
            <!-- Button trigger modal 
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Standard Modal</button>
            <!-- Large modal 
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
            <!-- Small modal 
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>
            -->
    	</div>
    </div>
</div>