<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Ubah_Coding".$date.".xls");

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <table id="mydata" class="table table-bordered table-hover table-responsive" border="1">
                <thead style="background-color:#1ABC9C;white-space: nowrap">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUESTER</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CURRENT CODE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">MODIF CODE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">USE TARIF</th>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($exports as $uc){ 
                    $date = date('d-m-Y',strtotime($uc['CREATED']));
                    $tarif = $uc['USE_TARIF'];
                    if($tarif == 1)
                    {
                        $use_tarif = "CURRENT CODE";   
                    }
                    else
                    {
                        $use_tarif = "MODIF CODE";
                    }
                    ?>
                <tr id="data_row_<?php echo$n; ?>">
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['USER_ID'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['CURRENT_CITY_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['MODIF_CITY_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $use_tarif ?></td>
                </tr>
                    <?php $n++; } ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>