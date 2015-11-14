<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?> | the ABC Lab</title>

	<style type="text/css">

	
	</style>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>" />
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/autocomplete.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/main.js"); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		    $("#patient").keyup(function () {
		        $.ajax({
		            type: "POST",
		            url: "<?php echo site_url('login/getPatientName'); ?>",
		            data: {
		                keyword: $("#patient").val()
		            },
		            dataType: "json",
		            success: function (data) {
		                if (data.length > 0) {
		                    $('#PatientNameList').empty();
		                    $('#patient').attr("data-toggle", "dropdown");
		                    $('#PatientNameList').dropdown('toggle');
		                }
		                else if (data.length == 0) {
		                    $('#patient').attr("data-toggle", "");
		                }
		                $.each(data, function (key,value) {
		                    if (data.length >= 0)
		                        $('#PatientNameList').append('<li role="presentation" >' + value['name'] + '</li>');
		                });
		            }
		        });
		    });
		    $('ul.txtcountry').on('click', 'li a', function () {
		    	console.log($(this).text());
		        $('#patient').val($(this).text());
		    });
		});
	</script>
</head>
<body>

<div id="container">