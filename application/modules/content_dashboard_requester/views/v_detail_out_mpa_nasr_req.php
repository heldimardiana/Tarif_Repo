<div>
    <a href="<?php echo site_url('out_mpa_nasr_req')?>">
        <button type="button" class="btn btn-danger waves-effect waves-light" title="Back"><< Back</button>
    </a>
</div>
<br/>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_detail_non_aktif_service_regional');?>" enctype="multipart/form-data">
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
                            <label class="col-md-4 control-label">Branch</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['BRANCH_CODE']?>" name="branch">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-4 control-label">Origin</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['ORIGIN']?>" name="origin"> 
                            </div>
                        </div>
                          
					</div>
					
					<div class="col-md-5">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Destination</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['DESTINATION']?>" name="destination"> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['CHILD']?>" name="destination"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Service</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['SERVICE']?>" name="service"> 
                            </div>
                        </div>
                        <?php } ?>
                        
					</div>

					<div class="col-md-2">
						
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-12" id="dua">
    <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Notice Regional</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive" style="padding: 0 auto">
                        <table  class="table table-bordered table-hover table-responsive">
                            <thead style="background-color:#1ABC9C;white-space: nowrap">
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE</th>
                            <tbody>
                                <?php 
                                $n=1;
                                foreach ($regional as $ut){ 
                                    $date = date('d-m-Y',strtotime($ut['UPDATE_STATUS_REGIONAL']))
                                ?>
                            <tr>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_REGIONAL'] ?></td>
                            </tr>
                                <?php $n++; } ?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>