// Initialise the generator when the page loads
var id = null;
function datatable(){
    var oTable = $('#connect').dataTable({
		"bServerSide"    : true,
		"bProcessing": true,
		"sAjaxSource"    : dataselect,
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
		{"mData": "service"},
		{"mData": "ipAddress"},
		{"mData": "nodeDescription"},
		{"mData": "connectProtocol",
		"mRender": function ( data, type, full ) { 
		return '<a href="#" class="btn btn-xs btn-success">'+data+'</a>';},},
		{"mData": "id",
		"mRender": function ( data, type, full ) { 
		return '<a href="#" rel="popover" data-placement="left" id="'+data+'" class="btn btn-xs btn-info"><i class="icon-search"></i></a><a href="device_connect_edit?id='+data+'" class="btn btn-xs btn-warning"><i class="icon-edit "></i></a><a href="device_connect_edit?id='+data+'" class="btn btn-xs btn-danger"><i class="icon-trash "></i></a>';},},
		],
		//"fnDrawCallback" : function() {
		//popover();
		//},
		    });
};
function popover()
{
$("a[rel=popover]").click(function() {
    el = $(this);
    $.get('device_connect/', function(response) {
      el.unbind('click').popover({
        content: response,
        title: 'Dynamic response!',
        offset: 10,
        html: true,
        trigger: "hover" ,
        width: "500px;",
        delay: {show: 500, hide: 100}
      }).popover('show');
    });
  });
};  

$("document").ready(function(){
    datatable();
});

