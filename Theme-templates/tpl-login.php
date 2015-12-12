<?php 
/*********

Template Name: Login-Template


*********/
?>
<?php get_header(); ?>
<div id="content">

	<div id="contentleft">
	<?php if ( !is_user_logged_in() ) { ?>
		<div class="form_content">
		<h2 style="color:<?php echo get_option('general_bg'); ?>;">Login</h2>
		<form id="login_form" method="post" name="login_form" action="" >
				<label>Username</label>
				<input id="username_log" type="text" name="username_log" placeholder="Your Username" value=""/>
				<label>Password</label>
				<input id="password_log" type="password" name="password_log" placeholder="Password" value=""/>
				<input id="login_button" type="button" name="logging_in" value="Submit">
				<h3 style="color:<?php echo get_option('general_bg'); ?>; margin-left:2%; margin-top:1%;" id="forgot_hideshow">Forgot Password</h3>	
		</form>
		<span class="notification"></span>
		</div>
		<div class="form_content1">
		<h2 style="color:<?php echo get_option('general_bg'); ?>;">Forgot Password</h2>
		<form id="forget_form" method="post" name="forget_form" action="" >
			<div class="forget_form_design">
				<label>Your E-mail Address</label>
				<input id="email_forgot" type="email" name="email_forgot" placeholder="Email ID" value=""/>
				<input id="forget_button" type="button" name="forget_button" value="Get New Password">
			</form>
		<span class="forget_notify"></span>
		</div>
		<?php } else { ?>
		<p>You Are Already Logged In <a href="<?php echo get_option('home'); ?>" >Click Here To Go Home</a></p>
		<?php } ?>
		
	</div>
<?php //include(TEMPLATEPATH."/sidebar.php");?>
</div>
<?php get_footer(); ?>