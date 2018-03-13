<?php
header("Content-type: application/vnd-ms-excel");
 
$date = date("d/m/Y");
header("Content-Disposition: attachment; filename=Report_Ubah_Coding".$date.".xls");

?>

<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
		<?php
			$date = date("d/m/Y");
			$date_froms = date("d/m/Y",strtotime($date_from));
			$date_thrus = date("d/m/Y",strtotime($date_thru));
		?>
			

			Report Ubah Coding <br>
			Date : <?php echo $date ?> <br>
			Period : <?php echo $date_froms ?> - <?php echo $date_thrus ?> <br>

			<table height="200px" class="table table-striped table-bordered table-hover font-11" border="1px">
				<thead>
					<tr>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NO.</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NO REQUEST</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TANGGAL REQUEST</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">REQUESTER</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">CURRENT CODE</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">MODIF CODE</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">STATUS APPROVAL REGIONAL</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">PIC REGIONAL</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TANGGAL APPROVAL REGIONAL</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NOTICE REGIONAL</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">STATUS APPROVAL MPA</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">PIC MPA</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TANGGAL APPROVAL MPA</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NOTICE MPA</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TANGGAL TESTING</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">STATUS APPROVAL TESTING</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TANGGAL LIVE</th>
						<th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">STATUS</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
					$n = 1;
					foreach ($ucr as $d)
					{
						$created = $d['CREATED'];
						$tgl_app_reg = $d['UPDATE_STATUS_REGIONAL'];
						$tgl_app_mpa = $d['UPDATE_STATUS_MPA'];
						$tgl_testing = $d['TGL_UBAH_CODING'];
						$tgl_live = $d['TGL_LIVE_UCR'];

						$a = $d['STATUS_REGIONAL'];
						$b = $d['STATUS_MPA'];
						$c = $d['STATUS_TESTING'];

						if($a == "" && $b == "" && $c == "")
						{
							$status = "OUTSTANDING REGIONAL";
						}
						else if($a == "APPROVE" && $b == "" && $c == "")
						{
							$status = "OUTSTANDING MPA";
						}
						else if($a == "APPROVE" && $b == "APPROVE" && $c == "")
						{
							$status = "TESTING MPA";
						}
						else if($a == "APPROVE" && $b == "APPROVE" && $c == "APPROVE")
						{
							$status = "APPROVE";
						}
						else if($a == "NOT APPROVE" || $b == "NOT APPROVE" || $c == "NOT APPROVE")
						{
							$status = "NOT APPROVE";
						}
					?>
					<tr class="">
						
						<td style="text-align:center"><?php echo $n; ?></td>
						<td style="text-align:center"><?php echo $d['NO_REQUEST'] ?></td>
						<td style="text-align:center"><?php echo $created; ?></td>
						<td style="text-align:center"><?php echo $d['USER_ID'] ?></td>
						<td style="text-align:center"><?php echo $d['CURRENT_CITY_CODE'] ?></td>
						<td style="text-align:center"><?php echo $d['MODIF_CITY_CODE'] ?></td>
						<td style="text-align:center"><?php echo $d['STATUS_REGIONAL'] ?></td>
						<td style="text-align:center"><?php echo $d['PIC_REGIONAL'] ?></td>
						<td style="text-align:center"><?php echo $tgl_app_reg ?></td>
						<td style="text-align:center"><?php echo $d['NOTICE_REGIONAL'] ?></td>
						<td style="text-align:center"><?php echo $d['STATUS_MPA'] ?></td>
						<td style="text-align:center"><?php echo $d['PIC_MPA'] ?></td>
						<td style="text-align:center"><?php echo $tgl_app_mpa ?></td>
						<td style="text-align:center"><?php echo $d['NOTICE_MPA'] ?></td>
						<td style="text-align:center"><?php echo $tgl_testing ?></td>
						<td style="text-align:center"><?php echo $d['STATUS_TESTING'] ?></td>
						<td style="text-align:center"><?php echo $tgl_live ?></td>
						<td style="text-align:center"><?php echo $status ?></td>

					</tr>
					<?php
					$n++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>