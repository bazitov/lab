<div style="width:400px; margin:0 auto"><?php echo $this->session->flashdata('msg'); ?></div>
<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>Add Patient</h1>

	<div class="inset" style="width:500px; margin:0 auto">
		<h3>Add Patient Form</h3>
	<?php echo form_open("operator/addpatient");?>
	<table width="100%">
		<tr>
			<td>Enter Name:</td>
			<td><input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>"/>
				<span class="text-danger"><?php echo form_error('name'); ?></span>
			</td>
		</tr>
		<tr>
			<td>Enter Email:</td>
			<td><input class="form-control" type="text" name="email" value="<?php echo set_value('email'); ?>"/>
				<span class="text-danger"><?php echo form_error('email'); ?></span></td>
		</tr>
		<tr>
			<td>Enter Address:</td>
			<td><input class="form-control" type="text" name="address" value="<?php echo set_value('address'); ?>"/>
				<span class="text-danger"><?php echo form_error('address'); ?></span></td>
		</tr>
		<tr>
			<td>Enter Phone No.:</td>
			<td><input class="form-control" type="text" name="phoneno" value="<?php echo set_value('phoneno'); ?>"/>
				<span class="text-danger"><?php echo form_error('phoneno'); ?></span></td>
		</tr>
		<tr>
			<td>Enter Passcode:</td>
			<td><input class="form-control" type="text" name="passcode" value="<?php echo set_value('passcode'); ?>"/>
			<span class="text-danger"><?php echo form_error('passcode'); ?></span></td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-primary" type="submit"  name="btn-add" value="Add"/></td>
		</tr>
	</table>
	<?php echo form_close();?>	
</div>
</div>