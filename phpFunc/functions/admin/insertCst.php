<?php
require_once('../../connection/connect.php'); 
session_start();

if(!$_SESSION["name"]) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='../../../index.php'</script>";
  }

	if(isset($_POST['cus_insert'])){

	$sql = "INSERT INTO crm_customer (fname,lname,mob,address,email,age,gender) VALUES ('".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['mob']."','".$_POST['address']."','".$_POST['email']."','".$_POST['age']."','".$_POST['gender']."')";

	$result = mysqli_query($connection,$sql);
	if($result) {
        echo "<script>alert(' Cutomer: ".$_POST['f_name']." ".$_POST['l_name']." added successfully');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    } else {
        echo "<script>alert(' Customer: ".$_POST['f_name']." ".$_POST['l_name']." adding failed');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    }
    }

    
?>