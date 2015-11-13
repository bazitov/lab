<div id="wrapper">
	<h1><?php echo $title; ?></h1>
	<div class="inset">
		<p>This will create database and necessary tables</p>
		<form>
		<table>
			<tr>
				<td><label for="username">Enter Database name:</label></td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td><label for="password">Enter Password:</label></td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Make Database and necessary tables" /></td>
			</tr>
		</table>
	</form>
	</div>
</div>