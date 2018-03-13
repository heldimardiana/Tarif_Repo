<div class="row">
	<div class="col-sm-5">
		<div class="card-box">
			<form action="<?php echo site_url('generate_report_regional')?>" method="post">
			                                    
	            <div class="form-group">
					<label class="col-md-4 control-label">Date From</label>
					<input type="text" id="date_from" class="form-control" title="Date From" name="date_from" required="">
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Date Thru</label>
					<input type="text" id="date_thru" class="form-control" title="Date From" name="date_thru" required="">
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Request</label>
					<select class="form-control" name="request" required="">
						<option value="" disabled="" selected="">Choose</option>
						<option value="1">Update Tarif Cabang Utama</option>
						<option value="2">Update Tarif Cabang</option>
						<option value="3">Ubah Coding</option>
						<option value="4">Ubah Zona</option>
						<option value="5">Non Aktif Routing</option>
						<option value="6">Non Aktif Service</option>
						<option value="7">Aktivasi Service</option>
						<option value="8">Update Tarif Intracity</option>
					</select>
				</div>

				<div class="form-group text-right m-b-0">
					<button class="btn btn-primary waves-effect waves-light" type="submit" title="Generate">
						Generate
					</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel Proses">
						Cancel
					</button>
				</div>

	        </form>
	    </div>
	</div>
</div>

<div>
	<form action="<?php echo site_url().'report_regional/c_report_regional/print_report_utcr'?>" method="post">
		<input type="hidden" name="date_from" value="<?php echo $date_from ?>">
		<input type="hidden" name="date_thru" value="<?php echo $date_thru ?>">
		<button type="submit" class="btn btn-success waves-effect waves-light" title="Print Excel">Print Excel</button>
	</form>
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
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUESTER</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CABANG UTAMA</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CABANG</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">SUB</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">DESTINATION</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PENYESUAIAN Rp</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PENYESUAIAN %</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">SERVICE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL REGIONAL</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL REGIONAL</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC REGIONAL</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL MPA</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL MPA</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC MPA</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL TESTING</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL TESTING</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL LIVE</th>  
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                    
                <tbody>
                	<?php 
                   	$n=1;
                   	foreach ($utcr as $ut){ 
                   		$date = date('d-m-Y',strtotime($ut['CREATED']));
                   		$tgl_app_re  = date('d-m-Y',strtotime($ut['UPDATE_STATUS_REGIONAL']));
                   		if($tgl_app_re == "01-01-1970" || $tgl_app_re == "")
                   		{
                   			$tgl_app_reg = "";
                   		}
                   		else
                   		{
                   			$tgl_app_reg = $tgl_app_re;
                   		}

                   		$tgl_app_mp  = date('d-m-Y',strtotime($ut['UPDATE_STATUS_MPA']));
                   		if($tgl_app_mp == "01-01-1970" || $tgl_app_mp == "")
                   		{
                   			$tgl_app_mpa = "";
                   		}
                   		else
                   		{
                   			$tgl_app_mpa = $tgl_app_mp;
                   		}

                   		$tgl_update_tari  = date('d-m-Y',strtotime($ut['TGL_UPDATE_TARIF']));
                   		if($tgl_update_tari == "01-01-1970" || $tgl_update_tari == "")
                   		{
                   			$tgl_update_tarif = "";
                   		}
                   		else
                   		{
                   			$tgl_update_tarif = $tgl_update_tari;
                   		}

                   		$tgl_liv  = date('d-m-Y',strtotime($ut['TGL_LIVE_UTCR']));
                   		if($tgl_liv == "01-01-1970" || $tgl_liv == "")
                   		{
                   			$tgl_live = "";
                   		}
                   		else
                   		{
                   			$tgl_live = $tgl_liv;
                   		}

                   		$status_reg = $ut['STATUS_REGIONAL'];
                   		if($status_reg == "1")
                   		{
                   			$status_regional = "APPROVE";
                   		}
                   		else if($status_reg == "2")
                   		{
                   			$status_regional = "NOT APPROVE";
                   		}
                   		else
                   		{
                   			$status_regional = "";
                   		}

                   		$status_mpa = $ut['STATUS_MPA'];
                   		if($status_mpa == "1")
                   		{
                   			$status_mp = "APPROVE";
                   		}
                   		else if($status_mpa == "2")
                   		{
                   			$status_mp = "NOT APPROVE";
                   		}
                   		else
                   		{
                   			$status_mp = "";
                   		}

                   		$status_testing = $ut['STATUS_TESTING'];
                   		if($status_testing == "1")
                   		{
                   			$status_test = "APPROVE";
                   		}
                   		else if($status_testing == "2")
                   		{
                   			$status_test = "NOT APPROVE";
                   		}
                   		else
                   		{
                   			$status_test = "";
                   		}
                   	?>
                <?php if($status_reg == "" && $status_mpa == "" && $status_testing == "") { ?>
                <tr id="data_row_<?php echo$n; ?>">

	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['BRANCH_CITY'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['ORIGIN_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CHILD'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_RUPIAH'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_PERSEN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_regional ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_mp ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_test ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_update_tarif ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<button type="button" class="btn btn-warning btn-xs">Outstanding Regional</button>
	                </td>
		        </tr>
		        <?php } else if($status_reg == "1" && $status_mpa == "" && $status_testing == ""){ ?>
		        <tr id="data_row_<?php echo$n; ?>">

	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['BRANCH_CITY'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['ORIGIN_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CHILD'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_RUPIAH'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_PERSEN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_regional ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_mp ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_test ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_update_tarif ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<button type="button" class="btn btn-success btn-xs">Outstanding MPA</button>
	                </td>
		        </tr>
		        <?php } else if($status_reg == "1" && $status_mpa == "1" && $status_testing == ""){ ?>
		        <tr id="data_row_<?php echo$n; ?>">

	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['BRANCH_CITY'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['ORIGIN_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CHILD'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_RUPIAH'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_PERSEN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_regional ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_mp ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_test ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_update_tarif ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<button type="button" class="btn btn-warning btn-xs">Testing MPA</button>
	                </td>
		        </tr>
		        <?php } else if($status_reg == "1" && $status_mpa == "1" && $status_testing == "1"){ ?>
		        <tr id="data_row_<?php echo$n; ?>">

	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['BRANCH_CITY'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['ORIGIN_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CHILD'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_RUPIAH'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_PERSEN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_regional ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_mp ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_test ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_update_tarif ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<button type="button" class="btn btn-success btn-xs">Approve</button>
	                </td>
		        </tr>
		        <?php } else if($status_reg == "2" || $status_mpa == "2" || $status_testing == "2"){ ?>
		        <tr id="data_row_<?php echo$n; ?>">

	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['BRANCH_CITY'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['ORIGIN_REQUEST'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CHILD'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['DESTINATION'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_RUPIAH'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NILAI_PERUBAHAN_PERSEN'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['SERVICE'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_regional ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_mp ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $status_test ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_update_tarif ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
	                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
	                	<button type="button" class="btn btn-danger btn-xs">Not Approve</button>
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