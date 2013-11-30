<?php 
class Connect extends MY_Controller {

	function __construct()
	{
		//Construct class and load extras
		parent::__construct();
		$this->load->helper('language');
		$this->load->library('datatables');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('connect_edit');
		$this->lang->load('auth');
	}
	public function index()
	{
		//Main index page that shows device list
		if(!empty($_GET['filter']))
		{
		$data['filter'] = $_GET['filter'];
		$this->template->load('base', 'connect_view', $data);
		}
		else
		{
		$this->template->load('base', 'connect_view');
		}
	}
	public function firewall()
	{
		//Main index page that shows device list
		$this->template->load('base', 'connect_view');

	}
	public function ajax()
	{
		if(!empty($_GET['filter']))
		{
		$deviceType = $_GET['filter'];
		$datatables = new Datatables();  // for mysqli  =>  $datatables = new Datatables('mysqli'); 
		$array = array('adminStatus' => 'active', 'deviceType' => $deviceType);
		$datatables
		->select('id, nodeName, site, ipAddress, ,nodeDescription, connectProtocol')
		->from('netdevices')
		->where($array);
		}
		else
		{
		$datatables = new Datatables();  // for mysqli  =>  $datatables = new Datatables('mysqli'); 
		$datatables
		->select('id, nodeName, site, ipAddress, ,nodeDescription, connectProtocol')
		->from('netdevices')
		->where('adminStatus','active');
		}
		$datatables->unset_column('id');
		$datatables->add_column('edit', '<div class="btn-group"><button type="button" class="btn btn-default btn-warning btn-sm"><a href="connect/edit_device?id=$1"><i class="icon-edit icon-w"></i></a></button><button type="button" class="btn btn-danger btn-sm"><a href="connect/delete_device?id=$1"><i class="icon-trash icon-w"></i></a></button></div>', 'id');
		
		
		echo $datatables->generate();
	}
	public function add_device()
	{
		//add new device
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
	}
	public function edit_device()
	{
		//edit exisiting device
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		//Validate form
		$this->form_validation->set_error_delimiters('<br /><span class="help-block alert alert-danger">', '</span>');
		if ($this->form_validation->run('edit_device') == FALSE)
		{
					if (isset($_GET['message']))
					{
						$data = $this->connect_edit->GetData($_GET['id']);
						$data['message'] = $_GET['message'];
						$data['user']=$this->ion_auth->user()->row();
						//$this->load->view('device_connect_edit_view',$data);
						$this->template->load('base', 'device_connect_edit_view', $data);

					}
					else
					{
						$data = $this->connect_edit->GetData($_GET['id']);
						$data['user']=$this->ion_auth->user()->row();
						$this->template->load('base', 'device_connect_edit_view', $data);
					}
		}
		else // passed validation proceed to post success logic
		{
			// build array for the model
			$form_data = array(
				'id' => set_value('id'),
				'nodeName' => set_value('nodeName'),
				'nodeDescription' => set_value('nodeDescription'),
				'adminStatus' => set_value('adminStatus'),
				'assetID' => set_value('assetID'),
				'ipAddress' => set_value('ipAddress'),
				'authMethod' => set_value('authMethod'),
				'connectProtocol' => set_value('connectProtocol'),
				'deviceType' => set_value('deviceType'),
				'make' => set_value('make'),
				'model' => set_value('model'),
				'site' => set_value('site'),
				'room' => set_value('room'),
				'rack' => set_value('rack')
			);

			// run insert model to write data to db
			if ($this->connect_edit->EditForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
					redirect('connect/edit_device?id='.$form_data['id'].'&message=success');   // or whatever logic needs to occur
			}
			else
			{
				redirect('connect/edit_device?id='.$_POST['id'].'&message=error');
			}
		}

	}
	public function delete_device()
	{
		//delete device
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
	}
	
}


