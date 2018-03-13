<div class="row">
  <div class="col-sm-5">
    <div class="card-box">
      <form action="<?php echo site_url('generate_report_mpa')?>" method="post">
                                          
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
            <option value="9">Update BTBP</option>
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
  <form action="<?php echo site_url().'report_mpa/c_report_mpa/print_report_ucr'?>" method="post">
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
          <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CURRENT CODE</th>
          <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">MODIF CODE</th>
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
                 	foreach ($ucr as $ut){ 
                 		$date = date('d-m-Y',strtotime($ut['CREATED']));

                    $tgl_app_re = date('d-m-Y',strtotime($ut['UPDATE_STATUS_REGIONAL']));
                    if($tgl_app_re == "01-01-1970" || $tgl_app_re == "")
                    {
                      $tgl_app_reg = "";
                    }
                    else
                    {
                      $tgl_app_reg = $tgl_app_re;
                    }

                    $tgl_app_mp = date('d-m-Y',strtotime($ut['UPDATE_STATUS_MPA']));
                    if($tgl_app_mp == "01-01-1970" || $tgl_app_mp == "")
                    {
                      $tgl_app_mpa = "";
                    }
                    else
                    {
                      $tgl_app_mpa = $tgl_app_mp;
                    }
                    $tgl_test = date('d-m-Y',strtotime($ut['TGL_UBAH_CODING']));
                    if($tgl_test == "01-01-1970" || $tgl_test == "")
                    {
                      $tgl_testing = "";
                    }
                    else
                    {
                      $tgl_testing = $tgl_test;
                    }

                    $tgl_liv = date('d-m-Y',strtotime($ut['TGL_LIVE_UCR']));
                    if($tgl_liv == "01-01-1970" || $tgl_liv == "")
                    {
                      $tgl_live = "";
                    }
                    else
                    {
                      $tgl_live = $tgl_liv;
                    }

                    $status_reg = $ut['STATUS_REGIONAL'];
                    $status_mpa = $ut['STATUS_MPA'];
                    $status_testing = $ut['STATUS_TESTING'];
              ?>
              <?php if($status_reg == "" && $status_mpa == "" && $status_testing == "") { ?>
              <tr id="data_row_<?php echo$n; ?>">

                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CURRENT_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['MODIF_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_testing ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
                	<button type="button" class="btn btn-warning btn-xs">Outstanding Regional</button>
                </td>
	            </tr>
              <?php } else if($status_reg == "APPROVE" && $status_mpa == "" && $status_testing == ""){ ?>
              <tr id="data_row_<?php echo$n; ?>">

                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CURRENT_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['MODIF_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_testing ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
                  <button type="button" class="btn btn-success btn-xs">Outstanding MPA</button>
                </td>
              </tr>
              <?php } else if($status_reg == "APPROVE" && $status_mpa == "APPROVE" && $status_testing == ""){ ?>
              <tr id="data_row_<?php echo$n; ?>">

                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CURRENT_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['MODIF_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_testing ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
                  <button type="button" class="btn btn-warning btn-xs">Testing MPA</button>
                </td>
              </tr>
              <?php } else if($status_reg == "APPROVE" && $status_mpa == "APPROVE" && $status_testing == "APPROVE"){ ?>
              <tr id="data_row_<?php echo$n; ?>">

                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CURRENT_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['MODIF_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_testing ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";">
                  <button type="button" class="btn btn-success btn-xs">Approve</button>
                </td>
              </tr>
              <?php } else if($status_reg == "NOT APPROVE" || $status_mpa == "NOT APPROVE" || $status_testing == "NOT APPROVE"){ ?>
              <tr id="data_row_<?php echo$n; ?>">

                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NO_REQUEST'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['USER_ID'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['CURRENT_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['MODIF_CITY_CODE'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_reg ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_app_mpa ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_testing ?></td>
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