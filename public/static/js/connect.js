// Initialise the generator when the page loads
$("document").ready(function(){
    var oTable = $('#software').dataTable({
		"bServerSide"    : true,
		"bProcessing": true,
		"sAjaxSource"    : 'software_version/ajax',
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
		{"mData": "Vendor"},
		{"mData": "Platform"},
		{"mData": "Model"},
		{"mData": "SoftwareName"},
		{"mData": "Description"},
		{"mData": "EAL"},
		{"mData": "EffectiveDate"},
		{"mData": "EOL"},
		{"mData": "DownloadFile",
		"mRender": function ( data, type, full ) { 
		return '<a href="Upload/server/php/files/'+data+'" class="btn btn-mini btn-info"><i class="icon-download-alt"></i> Download</a>';},},
		{"mData": "MD5",
		"mRender": function ( data, type, full ) { 
		return '<a href="#" rel="popover" data-placement="left" data-content="<b>MD5:</b> '+data+'" class="btn btn-mini btn-info"></i> MD5</a>';},},
		],
		"fnDrawCallback" : function() {
		popover();
		},
    });
});
function popover()
{
    $('a[rel=popover]').popover({
	  offset: 10,
	  html: true,
	  trigger: "hover" ,
	  width: "500px;",
	  template: '<div class="popover" style="width:400px"><div class="arrow"></div><div class="popover-inner MyPopover"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>'
	});
};

