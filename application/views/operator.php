<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>Welcome <?php echo $username; ?>!</h1>

	<div class="inset">
		<h3>What you can do</h3>
		<ul>
			<li><a href="<?php echo site_url('operator/allpatients') ?>">View all Patients</a></li>
			<li><a href="<?php echo site_url('operator/logout') ?>">View all Reports</a></li>
		</ul>
	</div>
</div>