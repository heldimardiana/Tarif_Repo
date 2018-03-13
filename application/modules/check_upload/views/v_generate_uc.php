<script src="<?php echo base_url();?>plugin/highcharts/code/highcharts.js"></script>
<script src="<?php echo base_url();?>plugin/highcharts/code/modules/data.js"></script>
<script src="<?php echo base_url();?>plugin/highcharts/code/modules/exporting.js"></script>

<div class="row">
    <div class="col-lg-6">
        <div class="card-box">       
            <form action="<?php echo site_url('generate_check_upload')?>" data-parsley-validate novalidate method="post">
                <div class="form-group">
                    <label for="userName">No Request</label>
                    <input type="text" name="no_reqest" parsley-trigger="change" required  class="form-control">
                </div>
                <div class="form-group">
                    <label for="userName">Request</label>
                    <select class="form-control" name="request" required="">
                        <option value="" disabled="" selected="">Choose</option>
                        <option value="1">Update Tarif Cabang Utama</option>
                        <option value="2">Update Tarif Cabang</option>
                        <option value="3">Ubah Coding</option>
                        <option value="4">Ubah Zona</option>
                        <option value="5">Non Aktif Routing</option>
                        <option value="6">Non Aktif Service</option>
                        <option value="7">Aktivasi Service</option>
                        <option value="8">Update Tarif Intracity</option>
                        <option value="9">Update BTBP</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary waves-effect waves-light" type="submit" title="Generate">
                    Generate
                    </button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				
				<div class="col-md-12">
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                <table id="datatable">
                    <thead>
                        <tr>
                            
                            <th></th>
                            <th style="padding: 5px;">Testing</th>
                            <th>Live</th>
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($uc as $g) { 

                        ?>
                        <tr>                        
                            
                            <td>.</td>
                            <td style="padding: 5px;"><?php echo $g['JML_TESTING'] ?></td>
                            <td><?php echo $g['JML_LIVE'] ?></td>

                                                   
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>


                        <script type="text/javascript">
                            Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                return {
                                    radialGradient: {
                                        cx: 0.5,
                                        cy: 0.3,
                                        r: 0.7
                                    },
                                    stops: [
                                        [0, color],
                                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                    ]
                                };
                            });

                            Highcharts.chart('container', {
                                data: {
                                    table: 'datatable'
                                },
                                chart: {
                                    type: 'column',
                                },
                                title: {
                                    text: 'Ubah Coding'
                                },
                                yAxis: {
                                    allowDecimals: false,
                                    title: {
                                        text: 'Range'
                                    }
                                },
                                
                                tooltip: {
                                    formatter: function () {
                                        return '<b>' + this.series.name + '</b><br/>' +
                                            this.point.y + ' ' + this.point.name.toLowerCase();
                                    }
                                }
                            });
                        </script>                               
				</div>
				
			</div>
		</div>
	</div>
</div>