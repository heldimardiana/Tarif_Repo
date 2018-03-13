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
		<div class="card-box table-responsive" style="padding: 0 auto">
			<table id="mydata" class="table table-bordered table-hover table-responsive">
				<thead style="background-color:#1ABC9C;white-space: nowrap">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUEST NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ORIGIN</th>   
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL TESTING</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
                <tbody>
                	<?php 
                   	$n=1;
                   	foreach ($utcu as $uc){ 
                   	$date = date('d-m-Y',strtotime($uc['CREATED']));
                    $status_mpa = $uc['STATUS_MPA'];
                    $status_testing = $uc['STATUS_TESTING'];
                    $tgl_update = date('d-m-Y',strtotime($uc['TGL_UPDATE_BTBP']));
                    if($tgl_update == '01-01-1970' || $tgl_update == '01/01/1970' || $tgl_update == '')
                    {
                        $tgl_update_btbp = '';
                    }
                    else
                    {
                         $tgl_update_btbp = $tgl_update;
                    }
                    ?>
                <?php if($status_mpa == "" && $status_testing == "") { ?>
                <tr id="data_row_<?php echo$n; ?>">
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-xs">Belum Approve</button>
                    </td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_update_btbp ?></td>
                    <?php $session = $uc['SESSION_REQUEST'] ?>
                    <td class="text-center">
                        <a href="<?php echo site_url().'update_btbp_mpa/c_update_btbp_mpa/detail_level_3/'.$session ?>">
                            <button type="button" class="btn btn-primary btn-xs" title="Detail">Detail</button>
                        </a>
                    </td>
		        </tr>
                <?php } else if($status_mpa == "1" && $status_testing == ""){ ?>
                <tr id="data_row_<?php echo$n; ?>">
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-xs">Testing</button>
                    </td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_update_btbp ?></td>
                    <?php $session = $uc['SESSION_REQUEST'] ?>
                    <td class="text-center">
                        <a href="<?php echo site_url().'update_btbp_mpa/c_update_btbp_mpa/detail_testing_level_3/'.$session ?>">
                            <button type="button" class="btn btn-primary btn-xs" title="Detail">Detail</button>
                        </a>
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