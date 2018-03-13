<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Update_Tarif_Intracity".$date.".xls");

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12 turun" id="table_bawah">
                    <table id="mydata" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive" border="1">
                        <div style="margin:0;">
                        <thead>
                            <tr>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Destination</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kota / Kabupaten</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kecamatan</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">City Code</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Zona</th>
                                <th colspan="6" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">YES</th>
                                <th colspan="6" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">REG</th>
                                <th colspan="6" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">OKE</th>
                              </tr>
                              <tr>
                                <td colspan="2" rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">TARIF</td>
                                <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ETD</td>
                                <td colspan="2" rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">TARIF</td>
                                <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ETD</td>
                                <td colspan="2" rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">TARIF</td>
                                <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ETD</td>
                              </tr>
                              <tr>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($detail as $bd){ 
                            ?>
                              <tr>
                                <td>
                                    <?php echo $bd['DROURATE_CODE']?>
                                </td>
                                <td>
                                    <?php echo $bd['CITY_ZONE_KABKOTA']?>
                                </td>
                                <td>
                                    <?php echo $bd['CITY_ZONE_KECAMATAN']?>
                                </td>
                                <td>
                                    <?php echo $bd['CITY_ZONE_3CODE']?>
                                </td>
                                <td>
                                    <?php echo $bd['CITY_ZONE_ID']?>
                                </td>
                                <td>
                                    <?php echo $bd['BEFORE_YES']?>
                                </td>
                                <td>
                                    <?php echo $bd['AFTER_YES']?>
                                </td>
                                <td>
                                <?php echo $bd['ETD_BEFORE_FROM_YES']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_BEFORE_THRU_YES']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_AFTER_FROM_YES']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_AFTER_THRU_YES']?>
                                </td>
                                <td>
                                    <?php echo $bd['BEFORE_REG']?>
                                </td>
                                <td>
                                    <?php echo $bd['AFTER_REG']?>
                                </td>
                                <td>
                                   <?php echo $bd['ETD_BEFORE_FROM_REG']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_BEFORE_THRU_REG']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_AFTER_FROM_REG']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_AFTER_THRU_REG']?>
                                </td>
                                <td>
                                    <?php echo $bd['BEFORE_OKE']?>
                                </td>
                                <td>
                                    <?php echo $bd['AFTER_OKE']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_BEFORE_FROM_OKE']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_BEFORE_THRU_OKE']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_AFTER_FROM_OKE']?>
                                </td>
                                <td>
                                    <?php echo $bd['ETD_AFTER_THRU_OKE']?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>