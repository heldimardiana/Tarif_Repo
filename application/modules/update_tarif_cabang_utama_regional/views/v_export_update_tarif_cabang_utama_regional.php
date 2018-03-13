<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Update_Tarif_Cabang_Utama".$date.".xls");

?>

<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive" style="padding: 0 auto">
      <table id="mydatas" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive" border="1">
              <div style="margin:0;">
              <thead>
                
                  <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kabupaten / Kotamadya</th>
                  <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Code</th>
                  <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">City Code</th>
                  <th colspan="35" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TARIF</th>
               

                <tr>
                  <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona A</td>
                  <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                  <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona B</td>
                  <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                  <td rowspan="4" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BT</td>
                  <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona C</td>
                  <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                  <td rowspan="4" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BT</td>
                  <td colspan="2" rowspan="3" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BP</td>
                  <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona D</td>
                  <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                  <td rowspan="4" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BT</td>
                  <td colspan="2" rowspan="3" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BP</td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                  <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                  <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
                  <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                  <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                  <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
                  <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                  <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                  <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
                  <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                  <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                  <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
                </tr>
                <tr>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Afer</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                  <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                </tr>
                <tr>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">1 kilo</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Next Kilo</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">1 Kilo</td>
                  <td style="text-align:center;background-color:#b3ffff;color:black;">Next Kilo</td>
                </tr>
                
                <tbody>
                <?php foreach($tdetail as $gt) {
                ?>
                <tr>
                  <td style="vertical-align: center;">
                    <?php echo $gt['KAB_KOTA'] ?>
                  </td>
                  <td>
                    <?php echo $gt['CODE'] ?>
                  </td>
                  <td>
                    <?php echo $gt['DESTINATION'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_BEFORE_ZONA_A'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_AFTER_ZONA_A'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_BEFORE_ZONA_A'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_BEFORE_ZONA_A'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_AFTER_ZONA_A'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_AFTER_ZONA_A'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BD_NAMA_SERVICE_ZONA_A'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_BEFORE_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_AFTER_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_BEFORE_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_BEFORE_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_AFTER_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_AFTER_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BD_NAMA_SERVICE_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BT_ZONA_B'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_BEFORE_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_AFTER_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_BEFORE_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_BEFORE_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_AFTER_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_AFTER_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BD_NAMA_SERVICE_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BT_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BP_1_KILO_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BP_NEXT_KILO_ZONA_C'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_BEFORE_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['TARIF_AFTER_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_BEFORE_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_BEFORE_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_FROM_AFTER_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['ETD_THRU_AFTER_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BD_NAMA_SERVICE_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BT_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BP_1_KILO_ZONA_D'] ?>
                  </td>
                  <td>
                    <?php echo $gt['BP_NEXT_KILO_ZONA_D'] ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </thead>
              </div>
            </table>
    </div>
  </div>
</div>