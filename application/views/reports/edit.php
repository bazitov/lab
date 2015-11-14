<div style="width:400px; margin:0 auto"><?php echo $this->session->flashdata('msg'); ?></div>
<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>Edit Report</h1>

	<div class="inset" style="width:500px; margin:0 auto">
		<h3>Edit Report Data</h3>
	<?php echo form_open("operator/editreport/".$id);?>
	<table width="100%">
		<tr>
			<td>ID:</td>
			<td><input class="form-control" type="hidden" name="rid" value="<?php echo $id; ?>"/>
				<span><?php echo $id;?></span>
			</td>
		</tr>
		<tr>
			<td>Report Name:</td>
			<td><input class="form-control" type="text" name="reportname" value="<?php echo $reportname; ?>"/>
				<span class="text-danger"><?php echo form_error('reportname'); ?></span>
			</td>
		</tr>
		<tr>
			<td>Patient:</td>
			<td><input disabled="disabled" class="form-control" type="text" name="name" value="<?php echo $name; ?>"/>
				</td>
		</tr>
		<tr>
			<td>Tests:</td>
			<td>
				<?php if(isset($tests)):?>
					<?php foreach ($tests as $test): ?>
						<?php echo $test['test'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$test['result'];?>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('operator/deltest/'.$test['testid'].'/'.$id);?>">Delete</a><br />
					<?php endforeach; ?>
				<?php endif;?>
				<a href="javascript:window.open('<?php echo site_url("operator/addtests"); ?>','addtests','width=600,height=400')">Add Tests</a>
				<input type="hidden" name="completetests" id="completetests" value="<?php echo set_value('completetests'); ?>" />
				<div id="testsmsg"></div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-primary" type="submit"  name="btn-edit" value="Edit"/></td>
		</tr>
	</table>
	<?php echo form_close();?>	
</div>
</div>