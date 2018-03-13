<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Update_Cabang_Utama_Live".$date.".xls");

?>

<table style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive" border="1">
  <div style="margin:0;">
  <thead>
    <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kabupaten / Kotamadya</th>
    <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kecamatan</th>
    <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Code</th>
    <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">City Code</th>
    <th colspan="23" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Tarif</th>
  
  <tr>
    <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona A</td>
    <td colspan="5" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona B</td>
    <td colspan="7" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona C</td>
    <td colspan="7" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona D</td>
  </tr>
  <tr>
    <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
    <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
    <td style="text-align:center;background-color:#99ffff;color:black;">BD</td>
    <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
    <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
    <td style="text-align:center;background-color:#99ffff;color:black;">BD</td>
    <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">BT</td>
    <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
    <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
    <td style="text-align:center;background-color:#99ffff;color:black;">BD</td>
    <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">BT</td>
    <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">BP</td>
    <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
    <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
    <td style="text-align:center;background-color:#99ffff;color:black;">BD</td>
    <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">BT</td>
    <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">BP</td>
  </tr>
  <tr>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">From</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Thru</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Nama Service</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">From</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Thru</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Nama Service</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">From</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Thru</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Nama Service</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">1 Kilo</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Next Kilo</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">From</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Thru</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Nama Service</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">1 Kilo</td>
    <td style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Next Kilo</td>
  </tr>
  <tbody>
  <?php
  $n = 1;
  foreach($utcu_before as $ub) {
        $zone_id = $ub['ZONE_ID'];
        $transit = $ub['TRANSIT_AFT'];

        $linehaul_aft = $ub['LINEHAUL_AFT'];
        $linehaul_next_aft = $ub['LINEHAUL_NEXT_AFT'];
        $service =  $ub['SERVICE'];
  ?>
  <tr>
    <td><?php echo $ub['CITY_ZONE_KABKOTA']?></td>
    <td><?php echo $ub['CITY_ZONE_KELURAHAN']?></td>
    <td><?php echo SUBSTR($ub['CITY_ZONE_CODE'],0,3)?></td>
    <td><?php echo $ub['CITY_ZONE_CODE']?></td>
    <td><?php echo $ub['TARIF_AFT_A']?></td>
    <td><?php echo $ub['ETDFROM_AFT_A']?></td>
    <td><?php echo $ub['ETDTHRU_AFT_A']?></td>
    <td>
       <?php if($zone_id == "A"){
            echo $service;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td><?php echo $ub['TARIF_AFT_B']?></td>
    <td><?php echo $ub['ETDFROM_AFT_B']?></td>
    <td><?php echo $ub['ETDTHRU_AFT_B']?></td>
    <td>
       <?php if($zone_id == "B"){
            echo $service;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td>
       <?php if($zone_id == "B"){
            echo $transit;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td><?php echo $ub['TARIF_AFT_C']?></td>
    <td><?php echo $ub['ETDFROM_AFT_C']?></td>
    <td><?php echo $ub['ETDTHRU_AFT_C']?></td>
    <td>
       <?php if($zone_id == "C"){
            echo $service;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td>
       <?php if($zone_id == "C"){
            echo $transit;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td>
        <?php if($zone_id == "C"){
            echo $linehaul_aft;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td>
        <?php if($zone_id == "C"){
            echo $linehaul_next_aft;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td><?php echo $ub['TARIF_AFT_D']?></td>
    <td><?php echo $ub['ETDFROM_AFT_D']?></td>
    <td><?php echo $ub['ETDTHRU_AFT_D']?></td>
    <td>
       <?php if($zone_id == "D"){
            echo $service;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td>
       <?php if($zone_id == "D"){
            echo $transit;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td>
        <?php if($zone_id == "D"){
            echo $linehaul_aft;
          }
          else{
            "";
          } 
        ?>
    </td>
    <td>
        <?php if($zone_id == "D"){
            echo $linehaul_next_aft;
          }
          else{
            "";
          } 
        ?>
    </td>
  </tr>
  <?php $n++; } ?>
  </tbody>
  </thead>
  </div>
</table>