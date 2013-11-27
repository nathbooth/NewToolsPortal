						<div class="box-header">
							<h2><?php echo lang('create_group_heading');?></h2>
						</div>
						<div class="box-content">

			<?php if($message):?>
			<div class="alert alert-success"><?php echo $message;?></div>
		<?php endif ?>
		<p class="lead"><?php echo lang('create_group_subheading');?></p>
		<?php echo form_open("auth/create_group", array('class' => 'form-horizontal '));?>

			<div class="control-group">
				<label class="control-label" for="group_name"><?=lang('create_group_name_label')?></label>
				<div class="controls"><?php echo form_input($group_name);?></div>
			</div>

			<div class="control-group">
				<label class="control-label" for="description"><?=lang('create_group_desc_label')?></label>
				<div class="controls"><?php echo form_input($description);?></div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary"><?=lang('create_group_submit_btn')?></button>
				</div>
			</div>

		<?php echo form_close();?>
	</div>
