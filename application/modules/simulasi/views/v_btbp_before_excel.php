<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Update_BTBP".$date.".xls");

?>

<table id="mydata" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive" border="1">
  <div style="margin:0;">
    <thead>
      <th rowspan="3" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Origin</th>
      <th rowspan="3" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Destination</th>
      <th rowspan="3" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">3Code</th>
      <th rowspan="3" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kota / Kabupaten</th>
      <th rowspan="3" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kecamatan</th>
      <th rowspan="3" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Zona</th>
      <th colspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BP</th>
      <th rowspan="3" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BT</th>
      <th colspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BD</th>
  </tr>
  <tr>
    <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">1st Kilo</td>
    <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Next Kilo</td>
    <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">OKE</td>
    <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">REG</td>
    <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">YES</td>
    <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">SPS</td>
  </tr>
  <tr>
    <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
    <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
  </tr>
  <tbody>
  <?php 
  $n=1;
  foreach($btbp as $gt) {
  ?>
  <tr>
    <td><?php echo $gt['ORIGIN']?></td>
    <td><?php echo $gt['CITY_ZONE_CODE']?></td>
    <td><?php echo $gt['CITY_ZONE_3CODE']?></td>
    <td><?php echo $gt['CITY_ZONE_KABKOTA']?></td>
    <td><?php echo $gt['CITY_ZONE_KECAMATAN']?></td>
    <td><?php echo $gt['CITY_ZONE_ID']?></td>
    <td><?php echo $gt['LINEHAUL']?></td>
    <td><?php echo $gt['LINEHAUL_NEXT']?></td>
    <td><?php echo $gt['TRANSIT']?></td>
    <td><?php echo $gt['DL_BEFORE_OKE']?></td>
    <td><?php echo $gt['DL_BEFORE_REG']?></td>
    <td><?php echo $gt['DL_BEFORE_YES']?></td>
    <td><?php echo $gt['DL_BEFORE_SPS']?></td>
    <td><?php echo $gt['DL_BEFORE_NEXT_SPS']?></td>
  </tr>
  <?php $n++; } ?>
  </tbody>
  </thead>
  </div>
</table>