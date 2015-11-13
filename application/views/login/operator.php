<div id="login">
	<h1><?php echo $title; ?> </h1>
	<div class="inset">
	
	<?php echo form_open("login/operator");?>
		<table>
			<tr>
				<td><label for="username">Enter Username:</label></td>
				<td><input class="form-control" type="text" name="username" value="<?php echo set_value('username'); ?>" /><span class="text-danger"><?php echo form_error('username'); ?></span></td>
			</tr>
			<tr>
				<td><label for="password">Enter Password:</label></td>
				<td><input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>"/><span class="text-danger"><?php echo form_error('password'); ?></span></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-primary" name="btn_login" value="Login" /></td>
			</tr>
		</table>
	<?php echo form_close(); ?>
	<?php echo $this->session->flashdata('msg'); ?>
	<a style="display:block; text-align:center" href="<?php echo site_url('login/patient') ?>">Patient? then click here</a>
	</div>
</div>