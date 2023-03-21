<?
session_start();
 include "../bd.php";?>
<?php

$login = $_POST['login'];
$password = md5($_POST['password']);


$res = mysqli_query($con,"SELECT * FROM users WHERE login = '$login' AND password = '$password' ");

$row = mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res)>0){

		$_SESSION['id'] = $row['id'];
	header("location:adminpanel.php");

	}else{

		header("location:enter.php");

	}



/* $hash = md5($login . time());
password = password_hash($data['password'], PASSWORD_DEFAULT);?> */
