<?php session_start(); ?>
<?php require_once('../phpFunc/connection/connect.php'); ?>
<?php require_once('../phpFunc/functions/functions.php'); ?>

<?php
#login check

if(!($_SESSION["name"] AND $_SESSION["id"] AND $_SESSION["roles"] )) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='../index.php'</script>";
  }else{
  
    if($_SESSION["roles"] !== 'admin') { 
    
        echo "<script>alert('Invalid Login Request');</script>";
        echo "<script>window.location='../index.php'</script>";
      }
  
  }

#profile details

$id = $_SESSION["id"];

$sql1 = "SELECT * FROM crm_users WHERE id =$id";
$result_user = mysqli_query($connection,$sql1);
$row_user=mysqli_fetch_assoc($result_user);

#get users data


$sql2 = "SELECT d.Sales_ID as s_id , d.customer_id as c_id, concat(c.fname ,' ', c.lname ) as cust_name , d.Product_ID as p_id, d.Purchased_date as pd, p.Product_Name as item, p.Price_per_unit as price  
FROM sales_details as d , crm_product as p ,crm_customer as c
where d.Product_ID = p.Product_ID and d.customer_id = c.customer_id order by d.Purchased_date";
mysqli_query($connection, $sql2);
$result = mysqli_query($connection,$sql2);

if($result){
  //echo "Sucessfull";
  }
  else{
  echo"failed";	
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../styles/businessUser/main.css" rel="stylesheet">
        <link href="../styles/businessUser/add.css" rel="stylesheet">
        <title>Admin View</title>
    
</head>
<body>


<!-- header -->
<div>

<span class="wel-msg"><p>Welcome <span style="font-size:44px;"><?php echo $_SESSION["name"]; ?></span></p></span>

<!-- sub header -->

<span class="sub-head">Sales Details</span> <div class="sub-line"></div>

<span><a href="../phpFunc/functions/businessUser/logout.php"><button class="log_out-button">Logout</button> </a></span>


</div>

<!-- header over -->

<!--menu-->

<div class="menu">

<div class="piza-staff"><img class="piza-logo" src="../assets/img/logo.png">

<span class="menu-text" style="color:orange;">PiZzA</span><br><span class="menu-text" style="font-size:25px; color:white; postion:relative; left:90px; bottom:45px;">Admin</span>

</div>

 <div class="menu-line"></div>

  <!-- pro view start -->
<button class="pro-view">


      <img class="pro-avatar" src="../assets/img/pro_avatar.png">
      <span class="pro-text">Profile </span> 

</button>

<div id="content-box" class="content">
<p>First Name:  <?php echo $_SESSION["name"]; ?><br><br>
   Email : <?php echo" ". $row_user['email'] . " ";?><br><br>
   Role :  <?php echo" ". $row_user['roles'] . " ";?> </p>
</div>

<div style="position:relative; top:105px;"> <!-- div for space for staff button-->

<!--customer butt-->
<a href="../acv"><button class="sales-but">
<button  class="cus-but">

      <img class="cus-logo" src="../assets/img/cus_det.png">
      <span class="cus-text">Customer</span> 

</button>
</a>
<!-- sales but-->

<a href="../asv"><button class="sales-but">

      <img class="sales-logo" src="../assets/img/sales.png">
      <span class="sales-text">Sales </span> 


</button></a>


<!--add butt-->


<button onclick="document.getElementById('addform').style.display='block'" class="add-but">

      <img class="add-logo" src="../assets/img/add_cus.png">
      <span class="add-text">Add</span> 

</button> 

</div>

<!-- staff button-->

<a href="../index.php"><button class="staff-but">


      <img class="staff-logo" src="../assets/img/staff.png">
      <span class="staff-text"> &nbsp;&nbsp;Staff</span> 

</button>
</a>


</div> <!-- menu div -->

<!-- menu over -->


<!-- user view table -->

<table border="0" class="table_dec2">

<tr bgcolor="#404040"> 

<th>Sales ID</th>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Product ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Purchased Date</th>

</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "  
        <tr bgcolor='#373737'>
            <td style='height:40px;'>" . $row['s_id'] . "</td>
            <td>" . $row['c_id'] . "</td>
            <td>" . $row['cust_name'] . "</td>
            <td>" . $row['p_id'] . "</td>
            <td>" . $row['item'] . "</td>
            <td>" . $row['price'] . "</td>
            <td>" . $row['pd'] . "</td>
        </tr>";
}
?>

</table>

<!-- user view table over -->

<!-- add form -->

<div id="addform" class="formbox">

<form class="formbox-content animate" action="../phpFunc/functions/admin/insert.php" method="post">

<span onclick="document.getElementById('addform').style.display='none'" class="close-admin"><img  class="close-image-admin" src="../assets/img/close.png"></span>
   
<div style="padding:5px;">


<div class="input-pos">

<div class="title">Add a Salesman</div><div class="line-dec"></div><br>

<div class="subtitle"></div> <!-- no subttle added -->

    
      <div class="input-container ic1">
        <input id="fname" name="name" class="input" type="text" placeholder=" " required />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Name</label>
      </div>

      <div class="input-container ic2">
        <input id="email"  name="email" class="input" type="text" placeholder=" " required/>
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">E-mail</label>
      </div>

      <div class="input-container ic2">
        <input id="password"  name="password" class="input" type="password" placeholder=" "required />
        <div class="cut"></div>
        <label for="password" class="placeholder">Password</label>
      </div>


      <button class="form-button"  type="submit" name="sal_insert">ADD</button>

</div>
  
    <br><br><br><br><br>
     </div>
</form>



</div>

<!-- adding  form over -->



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


<script>
// Get the modal
var modal = document.getElementById('addform');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none"; // when click outside of model it close
        
    }
}
</script>

</body>
</html>