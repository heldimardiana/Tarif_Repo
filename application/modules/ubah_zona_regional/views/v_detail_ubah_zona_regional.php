<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_detail_ubah_zona_regional');?>" enctype="multipart/form-data">
                    <?php foreach($detail as $d) { ?>
					<div class="col-md-5">
						                                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">No. Request</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['NO_REQUEST']?>" name="no_request">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Requester</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['USER_ID']?>" name="requester">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang Utama</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['BRANCH_CITY']?>" name="cabang_utama">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['ORIGIN']?>" name="cabang_utama">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Zona</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['CURRENT_ZONE']?>" name="current_zona"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Modif Zona</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['MODIF_ZONE']?>" name="modif_zona"> 
                            </div>
                        </div>
                          
					</div>
					
					<div class="col-md-5">    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['CHILD']?>" name="modif_zona"> 
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-8">
                                <select class="form-control" title="Pilih Status" required name="status">
                                    <option value="" disabled selected>Choose</option>
                                    <?php foreach($statuss as $s) { ?>
                                    <option value="<?php echo $s['ID_STATUS_REQUEST']?>"> <?php echo $s['STATUS_REQUEST']?>
                                        
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Notice</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="notice" title="Input Notice"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Attachment</label>
                            <div class="col-md-8">
                                <input type="file" name="attachment" class="form-control" title="Attachment">
                                <p style="color:red;">File .xls/.xlsx/.jpg/.png & Max 4mb</p>
                            </div>
                        </div> 
					</div>

					<div class="col-md-2">
						<button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" onclick="return confirm('Yakin Untuk Melakukan Save Proses?')">Save</button>
                        <a href="<?php echo site_url('ubah_zona_regional')?>">
						  <button type="button" class="btn btn-danger waves-effect waves-light" title="Cancel Process" onclick="return confirm('Yakin Untuk Melakukan Cancel Proses ?')">Cancel</button>
                        </a>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>