<?php require_once('../../connection/connect.php'); 

session_start();


if(!($_SESSION["name"] AND $_SESSION["id"] AND $_SESSION["roles"] )) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='../../../index.php'</script>";
  }else{
  
    if($_SESSION["roles"] != 'salesman') { 

        echo "<script>alert('Invalid Login Request');</script>";
        echo "<script>window.location='./logout.php'</script>";
      }
  
  }

  #profile details

  $id = $_SESSION["id"];

  $sql1 = "SELECT * FROM crm_users WHERE id =$id";
  $result_user = mysqli_query($connection,$sql1);
  $row_user=mysqli_fetch_assoc($result_user);



if(isset($_GET['customer_id'])) {
    $sql1 = "SELECT * FROM crm_customer WHERE customer_id =".$_GET['customer_id']."";
    $result = mysqli_query($connection,$sql1);
    if($result){
        $row=mysqli_fetch_assoc($result);
    }
    else {
        echo"failed";	
    }
}

if(isset($_POST['update'])){
    $sql2 = "UPDATE crm_customer SET fname = '".$_POST['f_name']."', lname = '".$_POST['l_name']."', mob = '".$_POST['mob']."', address = '".$_POST['address']."', email = '".$_POST['email']."', age = '".$_POST['age']."', gender = '".$_POST['gender']."' WHERE customer_id = '".$_POST['cus_id']."'";
    $result2 = mysqli_query($connection,$sql2);

    if($result2) {
        echo "<script>alert('Updated successfully');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
        echo "<script>window.location='../../../staffView.php'</script>";
    }
    
     
}
?>

<!DOCTYPE html>
<html>
 
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../../styles/businessUser/update.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Customer Update</title>
        
</head>

<body>


<!-- header -->
<div>

<!--
<span class="wel-msg"><p>Update Customer</p></span><div class="line-dec"></div> -->
<span><a href="./logout.php"><button class="log_out-button">Logout</button> </a></span>


</div>

<!-- header over -->


<!--menu-->

<div class="menu">

<div class="piza-staff"><img class="piza-logo" src="../../../assets/img/logo.png">

<span class="menu-text" style="color:orange;">PiZzA</span><br><span class="menu-text" style="font-size:28px; color:white; postion:relative; left:100px; bottom:45px;">Staff</span>

</div>

 <div class="menu-line"></div>

  <!-- pro view start -->
<button class="pro-view">


      <img class="pro-avatar" src="../../../assets/img/pro_avatar.png">
      <span class="pro-text">Profile </span> 

</button>

<div id="content-box" class="content">
<p>First Name:  <?php echo $_SESSION["name"]; ?><br><br>
   Email : <?php echo" ". $row_user['email'] . " ";?><br><br>
   Role :  <?php echo" ". $row_user['roles'] . " ";?> </p>
</div>

<!-- sales but-->

<a href=#abc><button class="sales-but">

      <img class="sales-logo" src="../../../assets/img/sales.png">
      <span class="sales-text">Sales </span> 


</button></a>

<!--customer butt-->

<a href="../../../staffView.php"><button  class="cus-but">

      <img class="cus-logo" src="../../../assets/img/cus_det.png">
      <span class="cus-text">Customer</span> 

</button></a>






</div> <!-- menu div -->

<!-- menu over -->


<!-- update form -->


<div class=cont-pos>
<div class="container" id="container">

<div class="form-container">
    
<form action="update.php" method="post">
<a href="../../../staffView.php"><i class="fa-solid fa-arrow-left fa-3x navigation"></i></a>
<div class="title">Update Customer</div><div class="line-dec2"></div><br>
<?php

echo "<div class='input-container ic1'>";
echo "<input id='customerid' class='input' type='text' name='cus_id' placeholder='' value=".$row['customer_id']." readonly />";
echo "<div class='cut cut-long'></div>";
echo "<label for='firstname' class='placeholder'>CustomerID</label>";
echo "</div>";

echo "<div class='input-container ic1'>";
echo "<input id='fname' name='f_name' class='input' type='text' placeholder=' ' value=".$row['fname']." required>";
echo "<div class='cut'></div>";
echo "<label for='firstname' class='placeholder'>First name</label>";
echo "</div>";

echo "<div class='input-container ic2'>";
echo "<input id='lastname' name='l_name' class='input' type='text' placeholder=' ' value=".$row['lname']." required >";
echo "<div class='cut'></div>";
echo "<label for='lastname' class='placeholder'>Last name</label>";
echo "</div>";

echo "<div class='input-container ic2'>";
echo "<input id='mobie' name='mob' class='input' type='text' placeholder=' ' required pattern='^\+?\d{0,11}' value=".$row['mob']." required>";
echo "<div class='cut cut-short'></div>";
echo "<label for='mobieNO' class='placeholder'>Mobile</label>";
echo "</div>";

echo "<div class='input-container ic2'>";
echo "<input id='email'  name='email' class='input' type='email' placeholder=' ' value=".$row['email']." required>";
echo "<div class='cut cut-short'></div>";
echo "<label for='email' class='placeholder'>E-mail</label>";
echo "</div>";

echo "<div class='input-container ic2'>";
echo "<input id='address'  name='address' class='input' type='text' placeholder=' 'value=".$row['address']." required >";
echo "<div class='cut'></div>";
echo "<label for='address' class='placeholder'>&nbsp;Address</label>";
echo "</div>";

echo "<div class='input-container ic2'>";
echo "<input id='age'  name='age' class='input' type='number' placeholder=' ' value=".$row['age']." required >";
echo "<div class='cut cut-short'></div>";
echo "<label for='age' class='placeholder'>&nbsp;&nbsp;Age</label>";
echo "</div>";

echo "<select name='gender'>
<option value=".$row['gender'].">Gender : ".$row['gender']."</option>
<option value='Male'>Male</option>
<option value='Female' >Female</option></select> ";

echo "<button type='submit' name='update' class='update-button' role='button'>Update</button>"
?>

</form>
</div>
</div>

<!-- update form  over-->


<!-- script for get the modal -->

<script>
var coll = document.getElementsByClassName("pro-view");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

</body>
</html>

