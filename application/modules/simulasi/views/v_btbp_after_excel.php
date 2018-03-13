<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Update_BTBP".$date.".xls");

?>

<table id="myTable" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive" border="1">
    <div style="margin:0;">
        <thead>
            <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Origin</th>
            <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Destination</th>
            <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">3Code</th>
            <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kota / Kabupaten</th>
            <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kecamatan</th>
            <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Zona</th>
            <th colspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BP</th>
            <th colspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BT</th>
            <th colspan="10" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BD</th>
          
          <tr>
            <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Before</td>
            <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">After</td>
            <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Before</td>
            <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">After</td>
            <td rowspan="3" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Before</td>
            <td rowspan="3" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">After</td>
            <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">OKE</td>
            <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">REG</td>
            <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">YES</td>
            <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">SPS</td>
          </tr>
          <tr>
            <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
            <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
            <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
            <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
            <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
            <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
          </tr>
          <tr>
            <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
            <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
          </tr>
        <tbody>
        <?php 
        $n=1;
            foreach($btbp as $gt) {
            $origin = SUBSTR($gt['DROURATE_CODE'],0,8);
        ?>
          <tr>
            <td>
                <?php echo $origin ?>
            </td>
            <td>
                <?php echo $gt['CITY_ZONE_CODE']?>
            </td>
            <td>
                <?php echo $gt['CITY_ZONE_3CODE']?>
            </td>
            <td>
                <?php echo $gt['CITY_ZONE_KABKOTA']?>
            </td>
            <td>
                <?php echo $gt['CITY_ZONE_KECAMATAN']?>
            </td>
            <td>
                <?php echo $gt['CITY_ZONE_ID']?>
            </td>
            <td>
                <?php echo $gt['PENERUS_BEFORE']?>
            </td>
            <td>
               <?php echo $gt['PENERUS']?>
            </td>
            <td>
                <?php echo $gt['PENERUS_BEFORE_NEXT']?>
            </td>
            <td>
               <?php echo $gt['PENERUS_NEXT']?>
            </td>
            <td>
                <?php echo $gt['BT_BEFORE']?>
            </td>
            <td>
                <?php echo $gt['BT']?>
            </td>
            <td>
                <?php echo $gt['BD_BEFORE_OKE']?>
            </td>
            <td>
                <?php echo $gt['BD_OKE']?>
            </td>
            <td>
                <?php echo $gt['BD_BEFORE_REG']?>
            </td>
            <td>
                <?php echo $gt['BD_REG']?>
            </td>
            <td>
                <?php echo $gt['BD_BEFORE_YES']?>
            </td>
            <td>
               <?php echo $gt['BD_YES']?>
            </td>
            <td>
                <?php echo $gt['BD_BEFORE_SPS']?>
            </td>
            <td>
                <?php echo $gt['BD_SPS']?>
            </td>
            <td>
                <?php echo $gt['BD_BEFORE_NEXT_SPS']?>
            </td>
            <td>
                <?php echo $gt['BD_NEXT_SPS']?>
            </td>
          </tr>
        <?php $n++; } ?>
        </tbody>
        </thead>
    </div>
</table>