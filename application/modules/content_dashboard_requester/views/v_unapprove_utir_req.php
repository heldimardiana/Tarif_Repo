<div>
    <a href="<?php echo site_url('dashboard_requester')?>">
        <button type="button" class="btn btn-danger waves-effect waves-light" title="Back"><< Back</button>
    </a>
</div>
<br/>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive" style="padding: 0 auto">
			<table id="mydata" class="table table-bordered table-hover table-responsive">
				<thead style="background-color:#1ABC9C;white-space: nowrap">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUEST NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ORIGIN</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT REQUESTER</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT REGIONAL</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT MPA</th>  
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
                <tbody>
                	<?php 
                   	$n=1;
                   	foreach ($unapprove_utir_req as $uc){ 
                   	$date = date('d-m-Y',strtotime($uc['CREATED']));
                   	$attachment_regional = $uc['ATTACHMENT_REGIONAL'];
                    $attachment_mpa = $uc['ATTACHMENT_MPA'];
                   	?>
                <tr id="data_row_<?php echo$n; ?>">
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<a href="<?php echo base_url().'UPLOADS/'.$uc['ATTACHMENT']?>">
	                		<img src="<?php echo base_url();?>assets/icon/zip.png" width="25" title="Download Attachment"></img>
	                	</a>
	                </td>
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
	                <td class="text-center">
	                	<button type="button" class="btn btn-danger btn-xs">Not Approve</button>
	                </td>
	                <?php $session = $uc['SESSION_REQUEST'] ?>
	                <td class="text-center">
	                	<a href="<?php echo site_url().'content_dashboard_requester/c_content_dashboard_requester/detail_unapprove_utir_req/'.$session?>">
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