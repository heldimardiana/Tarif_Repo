<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=View_BTBP".$date.".xls");

?>

<table border="1">
  <thead>
  <tr>
    <th rowspan="3" style="text-align: center;vertical-align: center;">ORIGIN</th>
    <th rowspan="3" style="text-align: center;vertical-align: center;">DESTINATION</th>
    <th rowspan="3" style="text-align: center;vertical-align: center;">3CODE</th>
    <th rowspan="3" style="text-align: center;vertical-align: center;">KOTA / KABUPATEN</th>
    <th rowspan="3" style="text-align: center;vertical-align: center;">KECAMATAN</th>
    <th rowspan="3" style="text-align: center;vertical-align: center;">ZONA</th>
    <th colspan="2" style="text-align: center;vertical-align: center;">BP</th>
    <th rowspan="3" style="text-align: center;vertical-align: center;">BT</th>
    <th colspan="5" style="text-align: center;vertical-align: center;">BD</th>
  </tr>
  <tr>
    <td rowspan="2" style="text-align: center;vertical-align: center;">1st Kilo</td>
    <td rowspan="2" style="text-align: center;vertical-align: center;">Next Kilo</td>
    <td rowspan="2" style="text-align: center;vertical-align: center;">OKE</td>
    <td rowspan="2" style="text-align: center;vertical-align: center;">REG</td>
    <td rowspan="2" style="text-align: center;vertical-align: center;">YES</td>
    <td colspan="2" style="text-align: center;vertical-align: center;">SPS</td>
  </tr>
  <tr>
    <td style="text-align: center;vertical-align: center;">1st Kilo</td>
    <td style="text-align: center;vertical-align: center;">Next Kilo</td>
  </tr>
  <tbody>
  <?php 
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
  <?php } ?>
  </tbody>
  </thead>
</table>