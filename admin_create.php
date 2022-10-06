<?php

	$dbhost = 'localhost';
	$dbuser = 'root';
	$pass = '8241';
	$conn = mysqli_connect($dbhost, $dbuser, $pass);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = 'create database admin';
	mysqli_query($conn, $sql);
	mysqli_select_db($conn,'admin');
	$sql = 'create table books (id int auto_increment, book_name varchar(100), author varchar(100), quantity int, Price int, primary key(id))';
	mysqli_query($conn, $sql);
	$sql = 'create table members (id int auto_increment, name varchar(100), address varchar(100), phone_no int, passwd varchar(50), primary key(id))';
	mysqli_query($conn, $sql);
	$sql = 'create table book_members (mem_id int, book_id int not null)';
	mysqli_query($conn, $sql);
	mysqli_close($conn);
?>