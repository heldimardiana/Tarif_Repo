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
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ORIGIN</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">SERVICE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT REQUESTER</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT REGIONAL</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT MPA</th>  
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                <tbody>
                	<?php 
                   	$n=1;
                   	foreach ($out_utcu_req as $ut){ 
                   		$date = date('d-m-Y',strtotime($ut['CREATED']));
                   		$attachment_regional = $ut['ATTACHMENT_REGIONAL'];
                    	$attachment_mpa = $ut['ATTACHMENT_MPA'];
                   	?>
                <tr id="data_row_<?php echo$n; ?>">

	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['ORIGIN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<a href="<?php echo base_url().'UPLOADS/'.$ut['ATTACHMENT']?>">
	                		<img src="<?php echo base_url();?>assets/icon/zip.png" width="25" title="Download Attachment"></img>
	                	</a>
	                </td>
	                <td class="text-center">
	                	<?php if($attachment_regional == "" OR $attachment_regional == NULL)
	                	{ ?>

	                	<?php }
	                	else
	                	{ ?>
	                		<a href="<?php echo base_url().'UPLOADS/'.$ut['ATTACHMENT_REGIONAL']?>">
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
	                		<a href="<?php echo base_url().'UPLOADS/'.$ut['ATTACHMENT_MPA']?>">
		                		<img src="<?php echo base_url();?>assets/icon/zip.png" width="25" title="Download Attachment"></img>
		                	</a>
	                	<?php } ?>
	                </td>
	                <td class="text-center">
	                	<button type="button" class="btn btn-warning btn-xs">Outstanding Regional</button>
	                </td>
		        </tr>
		        <?php $n++; } ?>
		        </tbody>
                </thead>
			</table>
		</div>
	</div>
</div>