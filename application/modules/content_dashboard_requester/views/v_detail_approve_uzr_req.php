<div>
    <a href="<?php echo site_url('approve_uzr_req')?>">
        <button type="button" class="btn btn-danger waves-effect waves-light" title="Back"><< Back</button>
    </a>
</div>
<br/>
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
                                <input type="text" class="form-control" readonly value="<?php echo $d['BRANCH_CITY']?>" name="requester">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['ORIGIN']?>" name="requester">
                            </div>
                        </div>
                       
                          
					</div>
                    <div class="col-md-5">
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
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['CHILD']?>" name="modif_zona"> 
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

<div class="col-lg-12" id="tiga">
    <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Notice MPA</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive" style="padding: 0 auto">
                        <table class="table table-bordered table-hover table-responsive">
                            <thead style="background-color:#1ABC9C;white-space: nowrap">
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL REQUEST</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL REQUEST</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL LIVE</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE LIVE</th>
                            <tbody>
                                <?php 
                                $n=1;
                                foreach ($mpa as $ut){ 
                                    $date = date('d-m-Y',strtotime($ut['UPDATE_STATUS_MPA']));
                                    $dates = date('d-m-Y',strtotime($ut['TGL_UBAH_ZONA']));
                                    $tgl_live_uzr = date('d-m-Y',strtotime($ut['TGL_LIVE_UZR']));
                                ?>
                            <tr>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $dates ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_MPA'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_LIVE'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live_uzr ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_LIVE'] ?></td>
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