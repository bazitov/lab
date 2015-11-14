<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?> | the ABC Lab</title>

	<style type="text/css">

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}
.center {
	text-align: center;
}
a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#body {
	margin: 0 15px 0 15px;
}

p.footer {
	text-align: right;
	font-size: 11px;
	border-top: 1px solid #D0D0D0;
	line-height: 32px;
	padding: 0 10px 0 10px;
	margin: 20px 0 0 0;
}

#login {
	width: 400px;
	margin: 0px auto;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}
#wrapper {
	margin: 0px auto;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}
table tr td {
	padding: 10px;
}
.inset {
	padding: 25px;
}
table.list td,th {
	text-align: left;
	padding-left: 0px;
}
table.list tr:nth-child(even) {
	background-color: #f5f5f5;
}
ul.menu {
	list-style: none;
}
ul.menu li {
	float: left;
}
ul.menu li a {
	display: block;
	margin: 0px 5px;
}
a.action {
	height: 24px; width: 20px;
    background: url("../icons/edit_del.png") no-repeat;
    text-indent: -9999px;
    display:inline-block
}
a.edit {
	background-position: 105% 50%;
}
a.del {
	background-position: 0 50%;
}
table.testtable {
	border: 1px solid black;
}
table.testtable th {
	background-color: #333;
	padding: 10px;
	color: white;
}
table.testtable tr:nth-child(even) {
	background-color: #f5f5f5;
}
.signature {
	border-top: 1px solid black;
	margin-top: 100px;
	width: 200px;
}
	
	</style>
</head>
<body>

<div id="container">