<script type="text/javascript">
	var dataselect = 'device_connect/ajax';
</script>
	
<!-- JQuery //-->
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/jquery-1.9.1.min.js') ?>"></script>

<!-- Bootstrap //-->
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/bootstrap/tooltip.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/bootstrap/popover.js') ?>"></script>
	

<!-- DataTables //-->
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/device_connect.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/dataTables.bootstrap.js') ?>"></script>

<div class="box-header">
	<h2><i class="icon-bolt"></i> Device Connect</h2>
</div>
<div class="box-content">
	<ul class="nav tab-menu nav-tabs" id="myTab">
		<li class="active"><a href="#info">All</a></li>
		<li class=""><a onclick="dataselect = 'device_connect/ajax?filter=firewall';datatable.oTable.fnReloadAjax(oTable.fnSettings());">Firewalls</a></li>
		<li class=""><a href="#messages">Servers</a></li>
	</ul>
		<p class="lead"><?php echo lang('create_user_subheading');?></p>
			<table class="table table-striped table-bordered bootstrap-datatable datatable" id="connect">
							  <thead>
								  <tr>
									  <th>Device Name</th>
									  <th>Service</th>
									  <th>IP Address</th>
									  <th>Description</th>
									  <th>Access</th>
									  <th>Actions</>
								  </tr>
							  </thead>   
				<tbody>
				  <tr>
					<td>loading...</td>
				  </tr>
				</tbody>
			 </table>
			 </div>
		</div>
	    
