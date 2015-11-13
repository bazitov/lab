<div id="login">
	<h1><?php echo $title; ?> </h1>
	<div class="inset">
	<div style="position:relative">
	<?php echo form_open("login/patient");?>
		<table>
			<tr>
				<td><label for="username">Enter Name:</label></td>
				<td><input type="text" id="patient" class="form-control" autocomplete="off" name="username" value="<?php echo set_value('username'); ?>" />
					<ul class="dropdown-menu txtcountry" style="" role="menu" aria-labelledby="dropdownMenu"  id="PatientNameList">
             </ul>
					<span class="text-danger"><?php echo form_error('username'); ?></span></td>
			</tr>
			<tr>
				<td><label for="password">Enter Pass Code:</label></td>
				<td><input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>"/><span class="text-danger"><?php echo form_error('password'); ?></span></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-primary" name="btn_login" value="Login" /></td>
			</tr>
		</table>
	<?php echo form_close(); ?>
	<?php echo $this->session->flashdata('msg'); ?>
	</div>
	<a style="display:block; text-align:center" href="<?php echo site_url('login/operator') ?>">Reporter? then click here</a>
	</div>
</div>