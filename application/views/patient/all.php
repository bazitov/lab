<div style="width:400px; margin:0 auto"><?php echo $this->session->flashdata('msg'); ?></div>
<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>All Patients</h1>

	<div class="inset">
	<a href="<?php echo site_url('operator/addpatient'); ?>">Add new Patient</a>
	<br /><br />
	<table width="100%" class="list">
		<tr>
			<th>Id.</th>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone No.</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($patients as $patient): ?>
			<tr>
				<td><?php echo $patient['id'];?></td>
				<td><?php echo $patient['name'];?></td>
				<td><?php echo $patient['address'];?></td>
				<td><?php echo $patient['email'];?></td>
				<td><?php echo $patient['phoneno'];?></td>
				<td>
					<a href="<?php echo site_url('operator/editpatient/'.$patient['id']) ;?>">Edit</a> | 
					<a href="<?php echo site_url('operator/delpatient/'.$patient['id']) ;?>">Delete</a> | 
					<a href="<?php echo site_url('operator/allreports/'.$patient['id']) ;?>">See Reports</a> | 
					<a href="<?php echo site_url('operator/generatepasscode/'.$patient['id']) ;?>">Generate Passcode</a> | 
					<?php
						$action = ($patient['status'] == 'pending') ? 'activate' : 'deactivate';
					?>
					<a href="<?php echo site_url('operator/changestatus/'.$patient['id'].'/'.$action)?>">
					<?php if($patient['status'] == 'pending'): ?>
						Activate
					<?php else: ?>
						Deactivate
					<?php endif;?>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
</div>