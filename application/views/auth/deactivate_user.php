						<div class="box-header">
							<h2><?php echo lang('deactivate_heading');?></h2>
						</div>
						<div class="box-content">
		<p class="lead"><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>

		<?php echo form_open("auth/deactivate/".$user->id, array('class' => 'form-horizontal '));?>

			<div class="control-group">
				<div class="controls">
					<label class="radio" for="confirm_yes">
					  <input type="radio" name="confirm" id="confirm_yes" value="yes" checked> Yes, I'm sure
					</label>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<label class="radio" for="confirm_no">
					  <input type="radio" name="confirm" id="confirm_no" value="no"> No	
					</label>
				</div>
			</div>

			<?php echo form_hidden($csrf); ?>
  			<?php echo form_hidden(array('id'=>$user->id)); ?>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary"><?=lang('deactivate_submit_btn')?></button>
				</div>
			</div>

		<?php echo form_close();?>
	</div>