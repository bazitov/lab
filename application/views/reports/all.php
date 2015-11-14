<div style="width:400px; margin:0 auto"><?php echo $this->session->flashdata('msg'); ?></div>
<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>All Reports<?php if($name) echo ' for '.$name; ?></h1>

	<div class="inset">
	<?php if(!$patient):?>
	<a href="<?php echo site_url('operator/addreport'); ?>">Add new Report</a>
	<?php endif;?>
	<br /><br />
	<?php if(!$noData):?>
	<table width="100%" class="list">
		<tr>
			<th>Id.</th>
			<th>Report Name</th>
			<th>Patient Name</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($reports as $report): ?>
			<tr>
				<td><?php echo $report['id'];?></td>
				<td><?php echo $report['reportname'];?></td>
				<td><?php echo $report['name'];?></td>
				<td>
				<?php if(!$patient):?>
					<a href="<?php echo site_url('operator/editreport/'.$report['id']) ;?>">Edit</a> | 
					<a href="<?php echo site_url('operator/delreport/'.$report['id']) ;?>">Delete</a> | 
					<a href="javascript:window.open('<?php echo site_url('operator/report/'.$report['id']); ?>','addtests','width=700,height=800')">View</a>
				<?php else:?>
					<a href="javascript:window.open('<?php echo site_url('patient/report/'.$report['id']); ?>','addtests','width=700,height=800')">View</a> | 
					<a href="<?php echo site_url('patient/generatepdf/'.$report['id']) ;?>">Generate PDF Report</a> | 
					<a target="_blank" href="<?php echo site_url('patient/downloadpdf/'.$report['id']) ;?>">Download Report (PDF)</a> | 
					<a href="<?php echo site_url('patient/emailpdf/'.$report['id']) ;?>">Email Report (PDF)</a>
				<?php endif;?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php else: ?>
		No Reports
	<?php endif; ?>
</div>
</div>