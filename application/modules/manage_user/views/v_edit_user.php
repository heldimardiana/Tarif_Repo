<script>
    function getRegional(elem){
        if(elem.value == 2){
            $("#regional2").show('fast');
        }   
        else
        {
            $("#regional2").hide('fast');
        }
    }
</script>

<div class="row">
    <div class="col-sm-12">
    	<div class="row">
          	<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_edit_user');?>" enctype="multipart/form-data">
          		<div class="col-md-12">
          			<div class="col-md-6">
                  		<?php foreach($edit as $e) { ?>
                  		<div class="form-group">
                            <label class="col-md-4 control-label">User ID</label>
                            <div class="col-md-8">
                                <input type="text" value="<?php echo $e['USER_ID']?>" readonly required class="form-control"  title="Input User ID" name="user_id" style="text-transform:uppercase;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <input type="text" readonly value="<?php echo $e['USER_NAME']?>" required class="form-control"  title="Input Username" name="username" style="text-transform:uppercase;">
                            </div>
                        </div>
                        <?php } ?>
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
                        <div class="form-group" id="regional2" style="display: none;">
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
                        <?php foreach($edit as $er) { ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="text" value="<?php echo $er['USER_EMAIL']?>" required class="form-control"  title="Input Email" name="email" style="text-transform:lowercase;">
                            </div>
                        </div>
                         <?php } ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process">Save</button>
                                <a href="<?php echo site_url('manage_user');?>">
                                    <button type="button" class="btn btn-danger waves-effect waves-light" title="Cancel Process">Cancel</button>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
          	</form>
        </div>
    </div>
</div>