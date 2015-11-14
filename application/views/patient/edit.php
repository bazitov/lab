<div style="width:400px; margin:0 auto"><?php echo $this->session->flashdata('msg'); ?></div>
<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>Edit Patient</h1>

	<div class="inset" style="width:500px; margin:0 auto">
		<h3>Edit Patient Data</h3>
	<?php echo form_open("operator/editpatient/".$id);?>
	<table width="100%">
		<tr>
			<td>ID:</td>
			<td><input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>"/>
				<span><?php echo $id;?></span>
			</td>
		</tr>
		<tr>
			<td>Enter Name:</td>
			<td><input class="form-control" type="text" name="name" value="<?php echo $name; ?>"/>
				<span class="text-danger"><?php echo form_error('name'); ?></span>
			</td>
		</tr>
		<tr>
			<td>Enter Email:</td>
			<td><input class="form-control" type="text" name="email" value="<?php echo $email; ?>"/>
				<span class="text-danger"><?php echo form_error('email'); ?></span></td>
		</tr>
		<tr>
			<td>Enter Address:</td>
			<td><input class="form-control" type="text" name="address" value="<?php echo $address; ?>"/>
				<span class="text-danger"><?php echo form_error('address'); ?></span></td>
		</tr>
		<tr>
			<td>Enter Phone No.:</td>
			<td><input class="form-control" type="text" name="phoneno" value="<?php echo $phoneno; ?>"/>
				<span class="text-danger"><?php echo form_error('phoneno'); ?></span></td>
		</tr>
		<tr>
			<td></td>
			<td><a href="<?php echo site_url('operator/generatepasscode/'.$id); ?>">Generate New Pass</a></td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-primary" type="submit"  name="btn-edit" value="Edit"/></td>
		</tr>
	</table>
	<?php echo form_close();?>	
</div>
</div>