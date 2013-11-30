<?php

class Device_connect_edit extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('connect_edit');
		$this->lang->load('auth');
		$this->load->helper('language');
			}
	function index()
	{
		$this->form_validation->set_rules('id', 'id', 'trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('nodeName', 'Device Name', 'required|trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('nodeDescription', 'Device Description', 'required|trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('adminStatus', 'Device Status', 'required|max_length[1024]');
		$this->form_validation->set_rules('assetID', 'Asset Tag', 'trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('ipAddress', 'IP Address', 'required|trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('authMethod', 'Authentication Method', 'required');
		$this->form_validation->set_rules('connectProtocol', 'Connection Protocol', 'required|max_length[1024]');
		$this->form_validation->set_rules('deviceType', 'Device Type', 'required|max_length[1024]');
		$this->form_validation->set_rules('make', 'Device Make', 'required|max_length[1024]');
		$this->form_validation->set_rules('model', 'Device Model', 'required|trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('site', 'Data Center', 'required|trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('room', 'Room', 'required|trim|xss_clean|max_length[1024]');
		$this->form_validation->set_rules('rack', 'Rack', 'required|trim|xss_clean|max_length[1024]');
		$this->form_validation->set_error_delimiters('<br /><span class="help-block alert alert-danger">', '</span>');

		if(empty($_POST['nodeName']))
		{
			if(!empty($_GET['id']) && ($this->connect_edit->GetData($_GET['id']) != FALSE))
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
			elseif ($this->form_validation->run() == FALSE)
			{
				if (isset($_GET['message']))
				{
					$data['message'] = $_GET['message'];
					$data['user']=$this->ion_auth->user()->row();
					$this->template->load('base', 'device_connect_edit_view', $data);
				}
				else
				{
					$data['user']=$this->ion_auth->user()->row();
					$this->template->load('base', 'device_connect_edit_view', $data);
				}
			}
		}
		elseif ($this->form_validation->run() == FALSE)
			{
				if (isset($_GET['message']))
				{
					$data['message'] = $_GET['message'];
					$data['user']=$this->ion_auth->user()->row();
					$this->template->load('base', 'device_connect_edit_view', $data);
				}
				else
				{
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
			if (empty($form_data['id']))
			{
				if ($this->connect_edit->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
					{
					redirect('connect/device_edit?&message=success');   // or whatever logic needs to occur
				}
			}
			else if ($this->connect_edit->EditForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
					{
					echo $this->connect_edit->EditForm($form_data);
					redirect('connect/device_edit?id='.$form_data['id'].'&message=success');   // or whatever logic needs to occur
				}
			else
			{
				redirect('connect/device_edit?&message=error');
			}
		}
	}
}
?>