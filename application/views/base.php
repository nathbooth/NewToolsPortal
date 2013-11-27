<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?=$this->title?></title>
        <meta name="description" content="<?=$this->meta_description?>">
        <meta name="viewport" content="width=device-width">


        <link rel="stylesheet" href="<?=base_url();?>static/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>static/css/style.css">
        <link rel="stylesheet" href="<?=base_url()?>static/css/fontawesome.css">
        <link rel="stylesheet" href="<?=base_url()?>static/css/fonta.css">
        <!--<link rel="stylesheet" href="<?=base_url()?>static/css/main.css">-->
        <!-- <link rel="stylesheet" href="<?=base_url()?>static/css/bootstrap-responsive.min.css"> -->

        <?php foreach($this->styles as $stylesheet):?>
    		<link rel="stylesheet" href="<?=base_url();?>static/css/<?=$stylesheet?>.css">
		<?php endforeach ?>

                <script src="<?=base_url()?>static/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    </head>
    <body class="<?=$this->body_class?>">

 <div class="wrapper">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
        <?php if($this->show_toolbar): ?>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="navbar-brand" href="<?=base_url();?>"><span><img src="<?=base_url();?>static/img/Atos_logo_transparent.png" alt="Atos"" style="padding-bottom:5px;"> UK&I Tools Portal</span></a>
                    	<div class="header-nav">
   						<ul class="nav pull-right">					
						<?php if($this->is_admin): ?>
						<li class="dropdown<?php if($this->active_top_nav == 'users'):?> active<?php endif ?>">
							<a href="#" class="btn dropdown-toggle" data-toggle="dropdown">Users &amp; Groups <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?=anchor('auth', '<i class="icon-cog"></i> Manage Users')?></li>
								<li class="divider"></li>
								<li><?=anchor('auth/create_user', '<i class="icon-user"></i> New User')?></li>
								<li><?=anchor('auth/create_group', '<i class="icon-folder-open"></i> New Group')?></li>
							</ul>
						</li>
						<?php endif ?>
						<?php if($this->logged_in):?>
							<li class="dropdown">
								<a href="#" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo ucwords($this->user->first_name);echo ucwords($this->user->last_name);?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
                           		<li><?=anchor('auth/logout', '<i class="icon-off"></i> Logout')?></li>
								</ul>
							</li>
                        	<?php else: ?>
                        		<li<?php if($this->active_top_nav == 'login'):?> class="active"<?php endif ?>><?=anchor('auth/login', 'Login', array('class' => 'btn'))?></li>
                    		<?php endif ?>
						</ul>
                    	</div>
                </div>
            </div>
        </div>
    	<?php endif //show toolbar ?>

        <div class="container content-wrapper">
        	<?php if($this->show_sidebar): ?>
        	<div id="sidebar-left" class="col-md-1">
				<div class="nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li<?=($this->uri->segment(1) == '' ? ' class="active"' : '');?>>
						<a href="<?=base_url();?>"><i class="icon-home"></i><span class="hidden-sm"> Dashboard</span></a></li>	
						<?php if($this->is_admin): ?>
						<li<?=($this->uri->segment(1) == 'auth' ? ' class="active"' : '');?>>
						<?=anchor('auth', '<i class="icon-lock"></i> Users &amp; Groups')?></li>
						<?php endif ?>
						<li<?=($this->uri->segment(1) == 'mrtg' ? ' class="active"' : '');?>>
						<?=anchor('mrtg', '<i class="icon-bar-chart"></i> MRTG Graphs')?></li>
						<li<?=($this->uri->segment(1) == 'device_connect' ? ' class="active"' : '');?>>
						<?=anchor('device_connect', '<i class="icon-bolt"></i> Device Connect')?></li>
						<li<?=($this->uri->segment(1) == 'firewall_connect' ? ' class="active"' : '');?>>
						<?=anchor('firewall_connect', '<i class="icon-fire"></i> Firewall Connect')?></li>
						<li<?=($this->uri->segment(1) == 'experiments' ? ' class="active"' : '');?>>
						<?=anchor('experiments', '<i class="icon-beaker"></i> Experiments')?></li>					
					</ul>
				</div>
			</div>
			
			<div id="content" class="col-md-11">
				<div class="row">	
					<div class="col-lg-12">
						<div class="box">
						<?php endif //show sidebar ?>
						<?= $contents ?>
						<?php if($this->show_sidebar): ?>
						</div><!--/col-->
					</div>
				</div>
				<?php endif //show sidebar ?>

			</div>
        </div> <!-- /container -->
</div><!-- /wrapper -->
        <?php if($this->show_footer): ?>
		<footer class="footer">
			 <div class="container">
			 	<div class="row">
					<div class="col-md-12">
						<p>&copy; Company 2012</p>
					</div>
				</div>
			</div>
		</footer>
		<?php endif ?>
        <?php foreach($this->scripts as $script):?>
    		<script src="<?=base_url()?>static/js/<?=$script?>.js"></script>
		<?php endforeach ?>

        <script src="<?=base_url()?>static/js/main.js"></script>

    </body>
</html>
