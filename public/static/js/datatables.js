// Initialise the generator when the page loads
$("document").ready(function(){
    var oTable = $('#connect').dataTable({
		"bServerSide"    : true,
		"bProcessing": true,
		"sAjaxSource"    : 'index.php/device_connect',
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
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"aoColumns": [
		{"mData": "nodeName"},
		{"mData": "ipAddress"}
		],
    });
});
