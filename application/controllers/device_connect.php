<?php 
class Device_connect extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('language');
		$this->load->library('datatables');
		$this->load->helper('url');
	}
   public function index()
	{
		$this->template->load('base', 'device_connect_view');

	}
   public function ajax()
	{
		if(!empty($_GET['filter']))
		{
		$deviceType = $_GET['filter'];
		$datatables = new Datatables();  // for mysqli  =>  $datatables = new Datatables('mysqli'); 
		$array = array('adminStatus' => 'active', 'deviceType' => $deviceType);
		$datatables
		->select('id, connectProtocol, nodeName, ipAddress, site, service, nodeDescription')
		->from('netdevices')
		->where($array);
		}
		else
		{
		$datatables = new Datatables();  // for mysqli  =>  $datatables = new Datatables('mysqli'); 
		$datatables
		->select('id, connectProtocol, nodeName, ipAddress, site, service, nodeDescription')
		->from('netdevices')
		->where('adminStatus','active');
		}
		echo $datatables->generate();
		
	}
}


