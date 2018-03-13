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

<style type="text/css">
    .blink {
              animation: blink-animation 1s steps(5, start) infinite;
              -webkit-animation: blink-animation 1s steps(5, start) infinite;
            }
            @keyframes blink-animation {
              to {
                visibility: hidden;
              }
            }
            @-webkit-keyframes blink-animation {
              to {
                visibility: hidden;
              }
            }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive" style="padding: 0 auto">
            <table id="mydata" class="table table-bordered table-hover table-responsive">
                <thead style="background-color:#1ABC9C;white-space: nowrap">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUEST NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CABANG UTAMA</th>  
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CABANG</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">DESTINATION</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">SUB</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ATTACHMENT REGIONAL</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL TESTING</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($narm as $uc){ 
                    $date = date('d-m-Y',strtotime($uc['CREATED']));
                    $status_mpa = $uc['STATUS_MPA'];
                    $status_testing = $uc['STATUS_TESTING'];
                    $tgl_non_aktif = date('d-m-Y',strtotime($uc['TGL_NON_AKTIF_ROUTING']));
                    if($tgl_non_aktif == '01-01-1970' || $tgl_non_aktif == '' || $tgl_non_aktif == '01/01/1970')
                    {
                        $tgl_non_aktif_routing = '';
                    }
                    else
                    {
                        $tgl_non_aktif_routing = $tgl_non_aktif;
                    }
                    $attachment_regional = $uc['ATTACHMENT_REGIONAL'];

                    ?>
                <?php if($status_mpa == "" && $status_testing == "") { ?>
                <tr id="data_row_<?php echo$n; ?>">
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CITY'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['DESTINATION'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['CHILD'] ?></td>
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
                        <button type="button" class="btn btn-success btn-xs">Belum Approve</button>
                    </td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_non_aktif_routing ?></td>
                    <?php $session = $uc['SESSION_REQUEST'] ?>
                    <td class="text-center">
                        <a href="<?php echo site_url().'non_aktif_routing_mpa/c_non_aktif_routing_mpa/detail_non_aktif_routing_mpa/'.$session?>">
                            <button type="button" class="btn btn-primary btn-xs" title="Detail">Detail</button>
                        </a>
                    </td>
                </tr>
                <?php } else if($status_mpa == "1" && $status_testing == ""){ ?>
                <tr id="data_row_<?php echo$n; ?>">
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CITY'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['DESTINATION'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['CHILD'] ?></td>
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
                        <button type="button" class="btn btn-warning btn-xs blink">Testing</button>
                    </td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_non_aktif_routing ?></td>
                    <?php $session = $uc['SESSION_REQUEST'] ?>
                    <td class="text-center">
                        <a href="<?php echo site_url().'non_aktif_routing_mpa/c_non_aktif_routing_mpa/testing_detail_non_aktif_routing_mpa/'.$session?>">
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