
<!-- JQuery //-->
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/jquery-1.9.1.min.js') ?>"></script>

<!-- Bootstrap //-->
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/bootstrap/tooltip.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/bootstrap/popover.js') ?>"></script>
	
<!-- DataTables //-->
<script type="text/javascript" src="<?php echo base_url('static/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
	 var oTable = $('#connect').dataTable({
		"bServerSide"    : true,
		"bProcessing": true,
		<?php
		if (isset($filter))
        {
	    echo '"sAjaxSource": "connect/ajax?filter='.$filter.'",';  
        }
        else
        {
	    echo '"sAjaxSource": "connect/ajax",'; 
        }?>
		"fnServerData": function ( sSource, aoData, fnCallback ) {
		$.ajax( {
			"dataType": 'json',
			"type": "POST",
			"url": sSource,
			"data": aoData,
			"success": fnCallback
		} )
		},
		"bPaginate": true,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": false,
		"bSortClasses": false,
		"aoColumns": [
		{"mData": "nodeName"},
		{"mData": "site"},
		{"mData": "ipAddress"},
		{"mData": "nodeDescription"},
		{"mData": "connectProtocol",
		"mRender": function ( data, type, full ) { 
		return '<a href="#" class="btn btn-xs btn-success">'+data+'</a>';},},
		{"mData": "edit"},
		],
    });
} );
</script>
<div class="box-header">
	<h2><i class="icon-bolt"></i> Device Connect</h2>
</div>
<div class="box-content">
	<ul class="nav tab-menu nav-tabs" id="myTab">
		<li <?=(!isset($filter)? ' class="active"' : '');?>><a href="<?=base_url();?>connect">All</a></li>
		<li <?=(isset($filter) &&  ($filter == 'firewall') ? ' class="active"' : '');?>><a href="?filter=firewall">Firewalls</a></li>
		<li <?=(isset($filter) &&  ($filter == 'servers') ? ' class="active"' : '');?>><a href="?filter=servers">Servers</a></li>
	</ul>
		<p class="lead"><?php echo lang('create_user_subheading');?></p>
			<table class="table table-striped table-bordered bootstrap-datatable datatable" id="connect">
							  <thead>
								  <tr>
									  <th>Device Name</th>
									  <th>Site</th>
									  <th>IP Address</th>
									  <th>Description</th>
									  <th>Access</th>
									  <th>Edit</>
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
	    
