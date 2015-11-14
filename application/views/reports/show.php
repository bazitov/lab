<h2><?php echo $report[0]['name']; ?></h2>
<?php echo $report[0]['phoneno']; ?><br />
<?php echo $report[0]['email']; ?><br />
<?php echo $report[0]['address']; ?><br />
<h3>Report</h3>
<table class="testtable" width="100%">
	<tr>
		<th>Test</th>
		<th>Result</th>
	</tr>

<?php foreach ($report as $p): ?>
	<tr><td><?php echo $p['test'];?></td><td> <?php echo $p['result'];?></td></tr>
<?php endforeach; ?>
</table>

<div class="signature">
	<p>Lab Stamp here</p>
</div>