<div class="box-header">
							<h2><?php echo lang('device_connect_edit_heading');?></h2>
						</div>
						<div class="box-content">


		<p class="lead"><?php echo lang('device_connect_edit_subheading');?></p>
<?php if (isset($message) && ($message == 'success')):?>
			<div class="alert alert-success"><b>Thank you</b>: The details for this device have now been successfully updated</div>
<?php elseif (isset($message) && ($message == 'error')):?>
<div class="alert alert-danger"><b>Sorry</b>: An error has occurred, please try again. Maybe you didn't change anything?</div>
<?php endif ?>
<div class="row">
  <div class="col-md-12">
<?php // Change the css classes to suit your needs
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
$form_url = ('connect/edit_device?id='.$netDevice[0]->id);
echo form_open($form_url, $attributes); ?>

<?php
if (isset($netDevice[0]->id)){
	echo form_hidden('id', $netDevice[0]->id);
	}
else {
	echo form_hidden('id', set_value('id'));
}
?>
<div class="form-group">
        <label for="nodeName" class="col-lg-3 control-label">Device Name <span class="required">*</span></label>
        <div class="col-lg-4">
        <input id="nodeName" class="form-control" type="text" name="nodeName" maxlength="1024" value="<?php
	    if (isset($netDevice[0]->nodeName)){echo $netDevice[0]->nodeName;}else{echo set_value('nodeName');}?>"/>
        <?php echo form_error('nodeName'); ?>
        </div>
</div>

<div class="form-group">
        <label for="nodeDescription" class="col-lg-3 control-label">Device Description <span class="required">*</span></label>
        <div class="col-lg-4">
        <input id="nodeDescription" class="form-control" type="text" name="nodeDescription" maxlength="1024" value="<?php if (isset($netDevice[0]->nodeDescription)){echo $netDevice[0]->nodeDescription;}else{echo set_value('nodeDescription');}?>"/>
        <?php echo form_error('nodeDescription'); ?>
        </div>
</div>

<div class="form-group">
        <label for="adminStatus" class="col-lg-3 control-label">Device Status <span class="required">*</span></label>

        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
	''  => 'Please Select',
	'active'    => 'Active',
	'pending_tts'    => 'Pending TTS',
	'decommissioned'    => 'Decommissioned'
); ?>
         <?php $attributes = "class = 'form-control'";?>
         <div class="col-lg-4">
         <?php if (isset($netDevice[0]->adminStatus)){echo form_dropdown('adminStatus', $options, $netDevice[0]->adminStatus, $attributes);}else{echo form_dropdown('adminStatus', $options, set_value('adminStatus'), $attributes);}?>
                 <?php echo form_error('adminStatus'); ?>

         </div>
</div>

<div class="form-group">
        <label for="assetID" class="col-lg-3 control-label">Asset Tag</label>
        <div class="col-lg-4">
        <input id="assetID" class="form-control" type="text" name="assetID" maxlength="1024" value="<?php if (isset($netDevice[0]->assetID)){echo $netDevice[0]->assetID;}else{echo set_value('assetID');}?>"/>                <?php echo form_error('assetID'); ?>

        </div>
</div>

<div class="form-group">
        <label for="ipAddress" class="col-lg-3 control-label">IP Address</label>
        <div class="col-lg-4">
        <input id="ipAddress" class="form-control" type="text" name="ipAddress" maxlength="1024" value="<?php if (isset($netDevice[0]->ipAddress)){echo $netDevice[0]->ipAddress;}else{echo set_value('ipAddress');}?>"/>                 <?php echo form_error('ipAddress'); ?>

        </div>
</div>

<div class="form-group">
        <label for="authMethod" class="col-lg-3 control-label">Authentication Method <span class="required">*</span></label>

        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
	''  => 'Please Select',
	'tacacs'    => 'Tacacs+',
	'local' => 'Local Account',
	'static' => 'Static User Account'
); ?>
<?php $attributes = "class = 'form-control'";?>
         <div class="col-lg-4">
               <?php if (isset($netDevice[0]->authMethod)){echo form_dropdown('authMethod', $options, $netDevice[0]->authMethod, $attributes);}else{echo form_dropdown('authMethod', $options, set_value('authMethod'), $attributes);}?>                        <?php echo form_error('authMethod'); ?>

       </div>
</div>

<div class="form-group">
        <label for="connectProtocol" class="col-lg-3 control-label">Connection Protocol <span class="required">*</span></label>

        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
	''  => 'Please Select',
	'ssh'    => 'SSH',
	'telnet'    => 'Telnet',
	'http'    => 'http',
	'https'    => 'https'

); ?>
		<?php $attributes = "class = 'form-control'";?>
         <div class="col-lg-4">
       <?php if (isset($netDevice[0]->connectProtocol)){echo form_dropdown('connectProtocol', $options, $netDevice[0]->connectProtocol, $attributes);}else{echo form_dropdown('connectProtocol', $options, set_value('connectProtocol'), $attributes);}?>                        <?php echo form_error('authMethod'); ?>
                      <?php echo form_error('connectProtocol'); ?>

         </div>
</div>

<div class="form-group">
        <label for="deviceType" class="col-lg-3 control-label">Device Type <span class="required">*</span></label>

        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
	''  => 'Please Select',
	'switch'    => 'Switch',
	'router'    => 'Router',
	'firewall'    => 'Firewall',
	'load_balancer'    => 'Load Balancer',
	'packer_shaper'    => 'Packer Shaper',
	'other'    => 'Other',
); ?>
		<?php $attributes = "class = 'form-control'";?>
         <div class="col-lg-4">
        <?php if (isset($netDevice[0]->deviceType)){echo form_dropdown('deviceType', $options, $netDevice[0]->deviceType, $attributes);}else{echo form_dropdown('deviceType', $options, set_value('deviceType'), $attributes);}?> 
                <?php echo form_error('deviceType'); ?>

        </div>
</div>

<div class="form-group">
        <label for="make" class="col-lg-3 control-label">Device Make <span class="required">*</span></label>

        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
	''  => 'Please Select',
	'cisco'    => 'Cisco',
	'checkpoint'    => 'Check Point',
	'allot'    => 'Allot',
	'juniper'    => 'Juniper',
	'raritan'    => 'Raritan',
	'brocade'    => 'Brocade'
); ?>
		<?php $attributes = "class = 'form-control'";?>
         <div class="col-lg-4">
        <?php if (isset($netDevice[0]->make)){echo form_dropdown('make', $options, $netDevice[0]->make, $attributes);}else{echo form_dropdown('make', $options, set_value('make'), $attributes);}?> 
                        <?php echo form_error('make'); ?>

         </div>
</div>

<div class="form-group">
        <label for="model" class="col-lg-3 control-label">Device Model <span class="required">*</span></label>
        <div class="col-lg-4">
        <input id="model" class="form-control" type="text" name="model" maxlength="1024" value="<?php if (isset($netDevice[0]->model)){echo $netDevice[0]->model;}else{echo set_value('model');}?>"/>                     <?php echo form_error('model'); ?>

        </div>
</div>

<div class="form-group">
        <label for="site" class="col-lg-3 control-label">Data Center <span class="required">*</span></label>

        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
	''  => 'Please Select',
	'acp'    => 'Andover',
	'bbp'    => 'Birmingham',
	'dgh'    => 'Daresbury',
	'lap'    => 'Livingstone',
	'sco'    => 'Scolocate'


); ?>
		<?php $attributes = "class = 'form-control'";?>
         <div class="col-lg-4">
       <?php if (isset($netDevice[0]->site)){echo form_dropdown('site', $options, $netDevice[0]->site, $attributes);}else{echo form_dropdown('site', $options, set_value('site'), $attributes);}?> 
                <?php echo form_error('site'); ?>

         </div>
</div>

<div class="form-group">
        <label for="room" class="col-lg-3 control-label">Room <span class="required">*</span></label>
        <div class="col-lg-4">
        <input id="room" class="form-control" type="text" name="room" maxlength="1024" value="<?php if (isset($netDevice[0]->room)){echo $netDevice[0]->room;}else{echo set_value('room');}?>"/>                   
        <?php echo form_error('room'); ?>

        </div>
</div>
<div class="form-group">
        <label for="rack" class="col-lg-3 control-label">Rack <span class="required">*</span></label>
        <div class="col-lg-4">
        <input id="rack" class="form-control" type="text" name="rack" maxlength="1024" value="<?php if (isset($netDevice[0]->rack)){echo $netDevice[0]->rack;}else{echo set_value('rack');}?>"/>
                <?php echo form_error('rack'); ?>

        </div>
</div>
<?php if (isset($netDevice[0]->id)){echo '<button type="submit" class="btn btn-primary">Update</button>';} else {echo '<button type="submit" class="btn btn-primary">Add</button>';}?>


<?php echo form_close(); ?>
</div>
</div>