<div id="login">
	<h1><?php echo $title; ?> </h1>
	<div class="inset">
	
	<form>
		<table>
			<tr>
				<td><label for="username">Enter Username:</label></td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td><label for="password">Enter Password:</label></td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login" /></td>
			</tr>
		</table>
	</form>
	<a style="display:block; text-align:center" href="<?php echo site_url('login/patient') ?>">Patient? then click here</a>
	</div>
</div>