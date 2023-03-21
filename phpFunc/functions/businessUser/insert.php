<?php
require_once('../../connection/connect.php'); 
session_start();

if(!($_SESSION["name"] AND $_SESSION["id"] AND $_SESSION["roles"] )) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='../../../index.php'</script>";
  }else{


  if($_SESSION["roles"] !== 'salesman') { 
    
    echo "<script>alert('Invalid Login Request');</script>";
    echo "<script>window.location='.logout.php'</script>";
  }

  }

  #check there a space for customer

  if(isset($_POST['cus_insert'])){
    
#$sql2 get customer id where was data deleted (LIMIT to 1, only get one row).  if  count=0 mean no deleted row then normal insert , else update data into a delete row.

        $sql2="SELECT customer_id FROM crm_customer WHERE fname='' AND lname='' AND mob='0' AND address='' AND email='' AND age='0' AND gender='' LIMIT 1";
        $result_cusid = mysqli_query($connection,$sql2);
        $row_cusid= mysqli_fetch_assoc($result_cusid);
        $count = mysqli_num_rows($result_cusid);

        if($count==0){

            $sql = "INSERT INTO crm_customer (fname,lname,mob,address,email,age,gender) VALUES ('".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['mob']."','".$_POST['address']."','".$_POST['email']."','".$_POST['age']."','".$_POST['gender']."')";

	        $result = mysqli_query($connection,$sql);

	        if($result) {
                     echo "<script>alert(' Cutomer: ".$_POST['f_name']." ".$_POST['l_name']." added successfully');</script>";
                
                        echo "<script>window.location='../../../staffView.php'</script>";

            } else {

                     echo "<script>alert(' Customer: ".$_POST['f_name']." ".$_POST['l_name']." adding failed');</script>";
  
                        echo "<script>window.location='../../../staffView.php'</script>";

             }

        }else{

            $sql3 = "UPDATE crm_customer SET fname = '".$_POST['f_name']."', lname = '".$_POST['l_name']."', mob = '".$_POST['mob']."', address = '".$_POST['address']."', email = '".$_POST['email']."', age = '".$_POST['age']."', gender = '".$_POST['gender']."' WHERE customer_id = '".$row_cusid['customer_id']."'";


            $result = mysqli_query($connection,$sql3);

	        if($result) {
                     echo "<script>alert(' Cutomer: ".$_POST['f_name']." ".$_POST['l_name']." added successfully');</script>";
                        echo "<script>window.location='../../../staffView.php'</script>";
                     
            } else {

                     echo "<script>alert(' Customer: ".$_POST['f_name']." ".$_POST['l_name']." adding failed');</script>";
                        echo "<script>window.location='../../../staffView.php'</script>";
                       
                     
             }


        }
    
  }


  #experiment over



/*
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

    
*/

?> 