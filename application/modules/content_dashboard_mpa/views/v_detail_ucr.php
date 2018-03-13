<script>
    function timbulin(){
        $("#but").hide('fast');
        $("#satu").hide('fast');
        $("#dua").hide('fast');
        $("#tiga").hide('fast');
        $("#empat").hide('fast');
        $("#tetet").show('slow');
    }
</script>

<div class="row" id="tetet" style="display:none">
    <div class="col-sm-12">
        <div class="card-box table-responsive" style="padding: 0 auto">
            <table id="mydata" class="table table-bordered table-hover table-responsive">
                <thead style="background-color:#1ABC9C;white-space: nowrap">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUEST NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUESTER</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT REGIONAL</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT MPA</th>
                    <!--<th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CABANG UTAMA</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CURRENT CODE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">MODIF CODE</th>--> 
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($ucr as $uc){ 
                    $date = date('d-m-Y',strtotime($uc['CREATED']));
                    $attachment_regional = $uc['ATTACHMENT_REGIONAL'];
                    $attachment_mpa = $uc['ATTACHMENT_MPA'];
                    ?>
                <tr id="data_row_<?php echo$n; ?>">
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['USER_ID'] ?></td>
                    <td class="text-center">
                        <?php if($attachment_regional == "" OR $attachment_regional == NULL)
                        { ?>

                        <?php }
                        else
                        { ?>
                            <a href="<?php echo base_url().'UPLOADS/'.$uc['ATTACHMENT_REGIONAL']?>">
                                <img src="<?php echo base_url();?>assets/icon/zip.png" width="25" title="Download Attachment"></img>
                            </a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if($attachment_mpa == "" OR $attachment_mpa == NULL)
                        { ?>

                        <?php }
                        else
                        { ?>
                            <a href="<?php echo base_url().'UPLOADS/'.$uc['ATTACHMENT_MPA']?>">
                                <img src="<?php echo base_url();?>assets/icon/zip.png" width="25" title="Download Attachment"></img>
                            </a>
                        <?php } ?>
                    </td>
                    <!--<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CITY'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['CURRENT_CITY_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['MODIF_CITY_CODE'] ?></td>-->
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-xs">Approve</button>
                    </td>
                    <?php $session = $uc['SESSION_REQUEST'] ?>
                    <td class="text-center">
                        <a href="<?php echo site_url().'content_dashboard_mpa/c_content_dashboard_mpa/detail_ucr/'.$session ?>">
                            <button type="button" class="btn btn-primary btn-xs" title="Lihat Detail">Detail</button>
                        </a>
                    </td>
                </tr>
                    <?php $n++; } ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

<div>
    <!--<a href="<?php echo site_url('utcr')?>">-->
      <button type="button" class="btn btn-danger waves-effect waves-light" title="Back" id="but" onclick="timbulin()"><< Back</button>
    <!--</a>-->
</div>
<br/>

</style>
<div class="row" id="satu">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_detail_ubah_coding_mpa');?>" enctype="multipart/form-data">
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
                        <!--
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Code</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['CURRENT_CITY_CODE']?>" name="cabang"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Modif Code</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['MODIF_CITY_CODE']?>" name="perubahan"> 
                            </div>
                        </div>
                        -->
                        <?php } ?>  
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<div id="empat">
    <div>
      <?php foreach($detail as $jokowi){?>
        <form action="<?php echo site_url().'content_dashboard_mpa/c_content_dashboard_mpa/export_detail_ucr'?>" method="post" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $jokowi['NO_REQUEST']?>" name="no_request">
          <button type="submit" class="btn btn-success" style="float:right;">Export to Excel</button>
        </form>
      <?php } ?>
    </div>
    <br/>
    <div>
      <br/>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <table id="mydata" class="table table-bordered table-hover table-responsive">
                    <thead style="background-color:#1ABC9C;white-space: nowrap">
                        <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                        <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                        <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CURRENT CODE</th>
                        <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">MODIF CODE</th>
                    <tbody>
                        <?php 
                        $n=1;
                        foreach ($tdetail as $uc){ 
                        $date = date('d-m-Y',strtotime($uc['CREATED']))
                        ?>
                    <tr id="data_row_<?php echo$n; ?>">
                        <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                        <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                        <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['CURRENT_CITY_CODE'] ?></td>
                        <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['MODIF_CITY_CODE'] ?></td>
                    </tr>
                        <?php $n++; } ?>
                    </tbody>
                    </thead>
                </table>
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
                        <table  class="table table-bordered table-hover table-responsive">
                            <thead style="background-color:#1ABC9C;white-space: nowrap">
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL REQUEST</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL REQUEST</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL LIVE</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL CLOSE</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE LIVE</th>
                            <tbody>
                                <?php 
                                $n=1;
                                foreach ($mpa as $ut){ 
                                    $date = date('d-m-Y',strtotime($ut['UPDATE_STATUS_MPA']));
                                    $dates = date('d-m-Y',strtotime($ut['TGL_UBAH_CODING']));
                                    $tgl_live_ucr = date('d-m-Y',strtotime($ut['TGL_LIVE_UCR']));
                                    $tgl_close = date('d-m-Y',strtotime($ut['TGL_CLOSING']));
                                ?>
                            <tr>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $dates ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_MPA'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_LIVE'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live_ucr ?></td>
                                <td class="text-center" style="background-color: #f05050;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_close ?></td>
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