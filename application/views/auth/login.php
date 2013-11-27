	<div class="row">
		<div class="login-box">
			<div class="icons">
				<a href="<?=base_url();?>"><i class="halflings-icon home"></i></a>
			</div>
			<?php echo form_open("auth/login", array('class' => 'form-horizontal'));?>
				<h2>Sign in.</h2>
				<?php if($message):?>
					<div class="alert fade-in alert-error">
						<?=$message?>
					</div>
				<?php endif ?>
				<div class="input-wrap">
				<div class="input-prepend input-group">
					<span class="input-group-addon"><i class="halflings-icon user"></i></span>
					<?=form_input($identity)?>
				</div>
				</div>
				<div class="input-wrap">
				<div class="input-prepend input-group">
					<span class="input-group-addon"><i class="halflings-icon lock"></i></span>
					<?=form_input($password)?>
				</div>
				</div>
				<label class="remember" for="remember"><?=form_checkbox('remember', '1', FALSE, 'id="remember"')?> Remember me</label>
				<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
			<?php echo form_close();?>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <?=anchor('auth/forgot_password', 'click here')?> to get a new password.
					</p>	
		</div>
	</div>
