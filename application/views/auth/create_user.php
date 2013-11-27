<div class="box-header">
	<h2><?php echo lang('create_user_heading');?></h2>
</div>
<div class="box-content">

	<?php if($message):?>
	<div class="alert alert-success"><?php echo $message;?></div>
<?php endif ?>
		<p class="lead"><?php echo lang('create_user_subheading');?></p>

		<?php echo form_open("auth/create_user", array('class' => 'form-horizontal '));?>
			<fieldset class="col-sm-12">
			
			<div class="form-group">
			  <label class="control-label" for="username"><?=lang('create_user_username_label')?></label>
			 <?php echo form_input($username);?>
			</div>
			
			<div class="form-group">
			  <label class="control-label" for="first_name"><?=lang('create_user_fname_label')?></label>
			 <?php echo form_input($first_name);?>
			</div>

			<div class="form-group">
				<label class="control-label" for="last_name"><?=lang('create_user_lname_label')?></label>
				<?php echo form_input($last_name);?>
			</div>

			<div class="form-group">
				<label class="control-label" for="company"><?=lang('create_user_company_label')?></label>
				<?php echo form_input($company);?>
			</div>

			<div class="form-group">
				<label class="control-label" for="email"><?=lang('create_user_email_label')?></label>
				<?php echo form_input($email);?>
			</div>

			<div class="form-group">
				<label class="control-label" for="password"><?=lang('create_user_password_label')?></label>
				<?php echo form_input($password);?>
			</div>

			<div class="form-group">
				<label class="control-label" for="password_confirm"><?=lang('create_user_password_confirm_label')?></label>
				<?php echo form_input($password_confirm);?>
			</div>

			<div class="form-group">
				
					<button type="submit" class="btn btn-primary"><?=lang('create_user_submit_btn')?></button>
				
			</div>
			</fieldset>
		<?php echo form_close();?>
	</div>
