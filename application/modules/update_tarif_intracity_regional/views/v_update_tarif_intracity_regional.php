<?php
    if ($this->session->flashdata('request_success')!="")
    {
    ?>
    <div class="alert alert-success">
        <h3><center><?php echo $this->session->flashdata('request_success');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('request_erorr')!="")
    {
    ?>
    <div class="alert alert-danger">
        <h3><center><?php echo $this->session->flashdata('request_erorr');  ?></center></h3>
    </div>
    <?php
    }
?>

<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<table id="mydata" class="table table-bordered table-hover table-responsive">
				<thead style="background-color:#1ABC9C">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ORIGIN</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT REQUESTER</th>  
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
                <tbody>
                	<?php 
                   	$n=1;
                   	foreach ($uti as $ut){ 
                   		$date = date('d-m-Y',strtotime($ut['CREATED']));
                   	?>
                <tr id="data_row_<?php echo$n; ?>">
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['ORIGIN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<a href="<?php echo base_url().'UPLOADS/'.$ut['ATTACHMENT']?>">
	                		<img src="<?php echo base_url();?>assets/icon/zip.png" width="25" title="Download Attachment"></img>
	                	</a>
	                </td>
	                <td class="text-center">
	                	<button type="button" class="btn btn-success btn-xs">Belum Approve</button>
	                </td>
	                <?php $session = $ut['SESSION_REQUEST'] ?>
	                <td class="text-center">
	                	<a href="<?php echo site_url().'update_tarif_intracity_regional/c_update_tarif_intracity_regional/detail_update_tarif_intracity_regional/'.$session ?>">
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