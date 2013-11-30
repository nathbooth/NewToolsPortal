<?php 
$config = array(
				'edit_device' => array(
									array(
											'field' => 'id',
											'label' => 'id',
											'rules' => 'required|trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'nodeName',
											'label' => 'Device Name',
											'rules' => 'required|trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'nodeDescription',
											'label' => 'Device Description',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'adminStatus',
											'label' => 'Device Status',
											'rules' => 'required|max_length[1024]'
										 ),
									array(
											'field' => 'assetID',
											'label' => 'Asset Tag',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'ipAddress',
											'label' => 'IP Address',
											'rules' => 'required|trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'authMethod',
											'label' => 'Authentication Method',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'connectProtocol',
											'label' => 'Connection Protocol',
											'rules' => 'required|trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'deviceType',
											'label' => 'Device Description',
											'rules' => 'required|trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'make',
											'label' => 'Device Make',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'model',
											'label' => 'Device Model',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'site',
											'label' => 'Data Center',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'room',
											'label' => 'Room',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 ),
									array(
											'field' => 'rack',
											'label' => 'Rack',
											'rules' => 'trim|xss_clean|max_length[1024]'
										 )

									)
				);
				?>
