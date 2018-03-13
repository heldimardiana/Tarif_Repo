
<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Download_Tarif".$date.".xls");

?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
        <table id="mydatas" style="max-width:100% !important; padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
            <div style="margin:0;">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NO</th>
                        <th colspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">CODING</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">SYSCODE</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">3 CODE</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">PROVINSI</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KABUPATEN / KOTA</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NAMA KAB/KOTA</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KECAMATAN</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KELURAHAN</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KODE POS</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">ZONA</th>
                        <th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">SERVICE</th>
                        <th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TARIF</th>
                        <th colspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">ETD</th>
                    </tr>
                
                    <tr>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ORIGIN</td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">DEST</td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><?php echo $service ?></td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><?php echo $service ?></td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">FROM</td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">THRU</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $n=1;
                    foreach($report as $r) { ?>
                    <tr id="data_row_<?php echo$n; ?>">
                        <td><?php echo $n ?></td>
                        <td><?php echo $r['ORIGIN'] ?></td>
                        <td><?php echo $r['DESTINATION'] ?></td>
                        <td><?php echo $r['ROUTING'] ?></td>
                        <td><?php echo $r['CODE'] ?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $r['KOTA'] ?></td>
                        <td><?php echo $r['KECAMATAN'] ?></td>
                        <td><?php echo $r['KELURAHAN'] ?></td>
                        <td><?php echo $r['KODEPOS'] ?></td>
                        <td></td>
                        <td>
                            <?php echo $r['SERVICE_CTC'] ?> <?php echo $r['SERVICE_OKE'] ?> <?php echo $r['SERVICE_REG'] ?>
                            <?php echo $r['SERVICE_YES'] ?> <?php echo $r['SERVICE_SPS'] ?> <?php echo $r['SERVICE_JTR'] ?>
                        </td>
                        <td>
                            <?php echo $r['PRICE_CTC'] ?> <?php echo $r['PRICE_OKE'] ?> <?php echo $r['PRICE_REG'] ?>
                            <?php echo $r['PRICE_YES'] ?> <?php echo $r['PRICE_SPS'] ?> <?php echo $r['PRICE_JTR'] ?>
                        </td>
                        <td><?php echo $r['ETD_FROM'] ?></td>
                        <td><?php echo $r['ETD_THRU'] ?></td>
                    </tr>
                    <?php $n++; } ?>
                </tbody>
                </div>
            </table>
        </div>
    </div>
</div>