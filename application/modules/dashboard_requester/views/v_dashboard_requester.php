<!-- UTCUR -->
<div class="col-lg-12" style="display: none;" id="utcur">
	<div class="panel panel-border panel-info">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Update Tarif Cabang Utama</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_utcu_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tutcu as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_utcu_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($orutcu as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_utcu_req')?>" title="Outstanding MPA"">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omutcu as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_utcu_req')?>" title="Approve"">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($autcu as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_utcu_req')?>" title="Not Approve"">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uautcu as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- UTCR -->
<div class="col-lg-12" style="display: none;" id="utcr">
	<div class="panel panel-border panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Update Tarif Cabang </h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_utcr_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tutcr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_utcr_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($orutcr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_utcr_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omutcr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_utcr_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($autcr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_utcr_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uautcr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- UCR -->
<div class="col-lg-12" style="display: none;" id="ucr">
	<div class="panel panel-border panel-pink">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Ubah Coding</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_ucr_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tucr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_ucr_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($orucr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_ucr_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omucr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_ucr_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($aucr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_ucr_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uaucr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- UZR -->
<div class="col-lg-12" style="display: none;" id="uzr">
	<div class="panel panel-border panel-purple">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Ubah Zona</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_uzr_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tuzr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_uzr_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($oruzr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_uzr_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omuzr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_uzr_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($auzr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_uzr_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uauzr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- NARR -->
<div class="col-lg-12" style="display: none;" id="narr">
	<div class="panel panel-border panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Non Aktif Routing</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_narr_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tnarr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_narr_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($ornarr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_narr_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omnarr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_narr_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($anarr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_narr_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uanarr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- NASR -->
<div class="col-lg-12" style="display: none;" id="nasr">
	<div class="panel panel-border panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Non Aktif Service</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_nasr_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tnasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_nasr_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($ornasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_nasr_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omnasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_nasr_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($anasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_nasr_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uanasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- PSR -->
<div class="col-lg-12" style="display: none;" id="psr">
	<div class="panel panel-border panel-info">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Penambahan Service</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_psr_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tpsr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_psr_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($orpsr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_psr_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($ompsr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_psr_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($apsr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_psr_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uapsr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- ASR -->
<div class="col-lg-12" style="display: none;" id="asr">
	<div class="panel panel-border panel-success">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Aktivasi Service yang Non Aktif</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_asr_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_asr_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($orasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_asr_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_asr_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($aasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_asr_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uaasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- INTRACITY -->
<div class="col-lg-12" style="display: none;" id="uti">
	<div class="panel panel-border panel-info">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Update Tarif Intracity</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="<?php echo site_url('total_utir_req')?>" title="Total Request">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-info pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($tuti as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Total Request</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_utir_req')?>" title="Outstanding Regional">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($oruti as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding Regional</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('out_mpa_utir_req')?>" title="Outstanding MPA">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="icon-layers text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($omuti as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Outstanding MPA</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				
				<a href="<?php echo site_url('approve_utir_req')?>" title="Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($auti as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('unapprove_utir_req')?>" title="Not Approve">
					<div class="col-sm-6 col-md-6 col-lg-2">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-purple pull-left">
								<i class="md  md-thumb-down text-purple"></i>
							</div>
							<div class="text-right">
								<?php foreach($uauti as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted" style="color:#6C7A89;font-size: 12px;">Not Approve</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<script>
	function nongol1(){
		$("#utcur").show('slow');
		$("#utcr").hide('slow');
		$("#ucr").hide('slow');
		$("#uzr").hide('slow');
		$("#narr").hide('slow');
		$("#nasr").hide('slow');
		$("#psr").hide('slow');
		$("#asr").hide('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol2(){
		$("#utcur").hide('slow');
		$("#utcr").show('slow');
		$("#ucr").hide('slow');
		$("#uzr").hide('slow');
		$("#narr").hide('slow');
		$("#nasr").hide('slow');
		$("#psr").hide('slow');
		$("#asr").hide('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol3(){
		$("#utcur").hide('slow');
		$("#utcr").hide('slow');
		$("#ucr").show('slow');
		$("#uzr").hide('slow');
		$("#narr").hide('slow');
		$("#nasr").hide('slow');
		$("#psr").hide('slow');
		$("#asr").hide('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol4(){
		$("#utcur").hide('slow');
		$("#utcr").hide('slow');
		$("#ucr").hide('slow');
		$("#uzr").show('slow');
		$("#narr").hide('slow');
		$("#nasr").hide('slow');
		$("#psr").hide('slow');
		$("#asr").hide('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol5(){
		$("#utcur").hide('slow');
		$("#utcr").hide('slow');
		$("#ucr").hide('slow');
		$("#uzr").hide('slow');
		$("#narr").show('slow');
		$("#nasr").hide('slow');
		$("#psr").hide('slow');
		$("#asr").hide('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol6(){
		$("#utcur").hide('slow');
		$("#utcr").hide('slow');
		$("#ucr").hide('slow');
		$("#uzr").hide('slow');
		$("#narr").hide('slow');
		$("#nasr").show('slow');
		$("#psr").hide('slow');
		$("#asr").hide('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol7(){
		$("#utcur").hide('slow');
		$("#utcr").hide('slow');
		$("#ucr").hide('slow');
		$("#uzr").hide('slow');
		$("#narr").hide('slow');
		$("#nasr").hide('slow');
		$("#psr").show('slow');
		$("#asr").hide('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol8(){
		$("#utcur").hide('slow');
		$("#utcr").hide('slow');
		$("#ucr").hide('slow');
		$("#uzr").hide('slow');
		$("#narr").hide('slow');
		$("#nasr").hide('slow');
		$("#psr").hide('slow');
		$("#asr").show('slow');
		$("#uti").hide('slow');
	}
</script>

<script>
	function nongol9(){
		$("#utcur").hide('slow');
		$("#utcr").hide('slow');
		$("#ucr").hide('slow');
		$("#uzr").hide('slow');
		$("#narr").hide('slow');
		$("#nasr").hide('slow');
		$("#psr").hide('slow');
		$("#asr").hide('slow');
		$("#uti").show('slow');
	}
</script>

<!-- Dashboard -->
<div class="col-lg-12">
	<div class="panel panel-border panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Dashboard</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<a href="#" onclick="nongol1()" title="Update Tarif Cabang Utama">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Update Tarif Cabang Utama</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="#" onclick="nongol2()" title="Update Tarif Cabang">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="md  md-thumb-up text-pink"></i>
							</div>
							<div class="text-right">
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Update Tarif Cabang</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				<?php if($this->session->userdata('user_branch')=="CGK000"){?>
				<a href="#" onclick="nongol3()" title="Ubah Coding">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-primary pull-left">
								<i class="md  md-thumb-up text-primary"></i>
							</div>
							<div class="text-right">
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Ubah Coding</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				<?php
                }else{}
                ?>

				<a href="#" onclick="nongol4()" title="Ubah Zona">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md  md-thumb-up text-success"></i>
							</div>
							<div class="text-right">	
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Ubah Zona</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="#" onclick="nongol5()" title="Non Aktif Routing">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md  md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Non Aktif Routing</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="#" onclick="nongol6()" title="Non Aktif Service">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="md  md-thumb-up text-pink"></i>
							</div>
							<div class="text-right">
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Non Aktif Service</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				<!--
				<a href="#" onclick="nongol7()" title="Penambahan Service">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-primary pull-left">
								<i class="md md-thumb-up text-primary"></i>
							</div>
							<div class="text-right">
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Penambahan Service</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				-->
				<a href="#" onclick="nongol8()" title="Aktivasi Service">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-primary pull-left">
								<i class="md  md-thumb-up text-primary"></i>
							</div>
							<div class="text-right">
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Aktivasi Service</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="#" onclick="nongol9()" title="Approval Update Tarif Intracity">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md  md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Update Tarif Intracity</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

			</div>
		</div>
	</div>
</div>