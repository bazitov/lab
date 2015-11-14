<div style="width:400px; margin:0 auto"><?php echo $this->session->flashdata('msg'); ?></div>
<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>Add Report</h1>

	<div class="inset" style="width:500px; margin:0 auto">
		<h3>Add Report Form</h3>
	<?php echo form_open("operator/addreport");?>
	<table width="100%">
		<tr>
			<td>Enter Report Name:</td>
			<td><input class="form-control" type="text" name="reportname" value="<?php echo set_value('reportname'); ?>"/>
				<span class="text-danger"><?php echo form_error('reportname'); ?></span>
			</td>
		</tr>
		<tr>
			<td>Select Patient:</td>
			<td>
				<?php echo form_dropdown('patient_id', $patients, set_value('patient_id'));?>
			</td>
		</tr>
		<tr>
			<td>Tests:</td>
			<td>
				<a href="javascript:window.open('<?php echo site_url("operator/addtests"); ?>','addtests','width=600,height=400')">Add Tests</a>
				<input type="hidden" name="completetests" id="completetests" value="<?php echo set_value('completetests'); ?>" />
				<div id="testsmsg"></div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-primary" type="submit"  name="btn-add" value="Add"/></td>
		</tr>
	</table>
	<?php echo form_close();?>	
</div>
</div>