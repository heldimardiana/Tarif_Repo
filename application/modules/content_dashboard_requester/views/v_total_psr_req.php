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
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">BRANCH</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ORIGIN</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">DESTINATION</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">SERVICE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TARIF</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                <tbody>
                	<?php 
                   	$n=1;
                   	foreach ($total_psr_req as $uc){ 
                   		$date = date('d-m-Y',strtotime($uc['CREATED']));
                   		$status_regional = $uc['STATUS_REGIONAL'];
                   		$status_mpa = $uc['STATUS_MPA'];
                   	?>
                <?php if($status_regional == "" && $status_mpa == "") { ?>
                <tr id="data_row_<?php echo$n; ?>">
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CODE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['TARIF'] ?></td>
	                <td class="text-center">
	                	<button type="button" class="btn btn-warning btn-xs">Outstanding Regional</button>
	                </td>
		        </tr>
		        <?php } else if($status_regional == "1" && $status_mpa == ""){ ?>
		        <tr id="data_row_<?php echo$n; ?>">
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CODE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['TARIF'] ?></td>
	                <td class="text-center">
	                	<button type="button" class="btn btn-success btn-xs">Outstanding MPA</button>
	                </td>
		        </tr>
		        <?php } else if($status_regional == "1" && $status_mpa == "1"){ ?>
		        <tr id="data_row_<?php echo$n; ?>">
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CODE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['TARIF'] ?></td>
	                <td class="text-center">
	                	<button type="button" class="btn btn-success btn-xs">Approve</button>
	                </td>
		        </tr>
		        <?php } else if($status_regional == "2" || $status_mpa == "2"){ ?>
		        <tr id="data_row_<?php echo$n; ?>">
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                	<td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CODE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['TARIF'] ?></td>
	                <td class="text-center">
	                	<button type="button" class="btn btn-danger btn-xs">UnApprove</button>
	                </td>
		        </tr>
		        <?php } ?>
		        	<?php $n++; } ?>
		        </tbody>
                </thead>
			</table>
		</div>
	</div>
</div>