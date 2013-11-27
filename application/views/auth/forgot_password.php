
					<div class="box">
						<div class="box-header">
							<h2><?php echo lang('forgot_password_heading');?></h2>
						</div>
						<div class="box-content">

			<?php if($message):?>
			<div class="alert alert-success"><?php echo $message;?></div>
		<?php endif ?>
		<p class="lead"><?php echo lang('forgot_password_subheading');?></p>
<?php echo form_open("auth/forgot_password", array('class' => 'form-signin form-password-reset'));?>
	<h2">Reset your password.</h2>
	<?php if($message):?>
		<div class="alert fade-in alert-error">
			<?=$message?>
		</div>
	<?php endif ?>

	<?=form_input($email)?>

	<p>
		<button class="btn btn-primary" type="submit">Submit</button>
		&nbsp; &nbsp; <?=anchor('auth/login', 'Cancel')?></a>
	</p>
<?php echo form_close();?>
</div>
