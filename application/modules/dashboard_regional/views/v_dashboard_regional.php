<div class="col-lg-12">
	<div class="panel panel-border panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title" align="center">Dashboard</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<!--
				<a href="">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="md  md-thumb-up text-pink"></i>
							</div>
							<div class="text-right">
								<h3 class="text-dark"><b data-plugin="counterup">9542</b></h3>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Update Tarif</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				-->
				<a href="<?php echo site_url('utcu_reg')?>" title="Approval Tarif Cabang Utama"">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($utcu as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Update Tarif Cabang Utama</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('utcr_reg')?>" title="Approval Tarif Cabang">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-primary pull-left">
								<i class="md  md-thumb-up text-primary"></i>
							</div>
							<div class="text-right" >
								<?php foreach($utcr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Tarif Cabang</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('ucr_reg')?>" title="Approval Ubah Coding">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="md  md-thumb-up text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($ucr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Ubah Coding</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('uzr_reg')?>" title="Approval Ubah Zona">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md  md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($uzr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Ubah Zona</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('narr_reg')?>" title="Approval Non Aktif Routing">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-primary pull-left">
								<i class="md  md-thumb-up text-primary"></i>
							</div>
							<div class="text-right">
								<?php foreach($narr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Non Aktif Routing</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('nasr_reg')?>" title="Approval Non Aktif Service">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-pink pull-left">
								<i class="md  md-thumb-up text-pink"></i>
							</div>
							<div class="text-right">
								<?php foreach($nasr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Non Aktif Service</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				<!--
				<a href="<?php echo site_url('psr_reg')?>" title="Approval Penambahan Service">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($psr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Penambahan Service</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				-->
				<a href="<?php echo site_url('asr_reg')?>" title="Approval Aktif Service non Aktif">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-success pull-left">
								<i class="md  md-thumb-up text-success"></i>
							</div>
							<div class="text-right">
								<?php foreach($asr as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
								<p class="text-muted"><b style="color:#6C7A89;font-size: 12px;">Approval Aktif Service non Aktif</b></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="<?php echo site_url('utir_reg')?>" title="Approval Update Tarif Intracity">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="widget-bg-color-icon card-box">
							<div class="bg-icon bg-icon-primary pull-left">
								<i class="md  md-thumb-up text-primary"></i>
							</div>
							<div class="text-right">
								<?php foreach($uti as $ut) { ?>
								<h3 class="text-dark"><b data-plugin="counterup"><?php echo $ut['NO_REQ']?></b></h3>
								<?php } ?>
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