<div style="width:400px; margin:0 auto"><?php echo $this->session->flashdata('msg'); ?></div>
<div id="wrapper">
	<div style="float:right; margin-right:20px; margin-top:12px;"><?php echo $menu; ?></div>
	<h1>Generate Passcode<?php if($patientname) echo ' for '.$patientname; ?></h1>

	<div class="inset" style="width:500px; margin:0 auto">
		<h3>New Passcode</h3>
		<?php echo $passcodemsg; ?>
		<a href="<?php echo site_url('operator/generatepasscode/'.$id); ?>">Generate New Pass</a><br />
		<a href="<?php echo site_url('operator/editpatient/'.$id); ?>">Edit <?php echo $patientname; ?> Details</a>
</div>
</div>