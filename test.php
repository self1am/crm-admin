<?php session_start(); ?>

<?php require_once('./inc/header.php'); ?>


<div>

<span class="isHeader"><p>Welcome <span style="font-size:44px;"><?php echo $_SESSION["name"]; ?></span></p></span>

<!-- sub header -->

<span class="sub-head">Details</span> <div class="sub-line"></div>

<span><a href="../phpFunc/functions/businessUser/logout.php"><button class="log_out-button">LogOut</button> </a></span>


</div>

<!-- header over -->


<!--menu-->

<div class="menu">

<span class="menu-header">Dashboard</span>

        <span class="menu-item"><a href="./index.php">Your Details</a></span> <div class="menu-line"></div>
</div>

<!-- menu over -->


<!-- user view table -->

<table border="0" class="table_dec">

<tr bgcolor="#404040"> 

<th>Customer ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Mobile</th>
<th>Address</th>
<th>E-mail</th>
<th>&nbsp;&nbsp;Age&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;Gender&nbsp;&nbsp;</th>
<th>Update</th>

</tr>
<?php
$row = mysqli_fetch_assoc($result);
    echo "
        <tr bgcolor='#373737'>
            <td>" . $row['customer_id'] . "</td>
            <td>" . $row['fname'] . "</td>
            <td>" . $row['lname'] . "</td>
            <td>" . $row['mob'] . "</td>
            <td>" . $row['address'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./phpFunc/functions/customer/update.php?customer_id=".$row['customer_id']."'><button class='edit-button' role='button'>Edit</button> </a>&nbsp;&nbsp;&nbsp;&nbsp;</td>

        </tr>";

?>

</table>

<?php require_once('./inc/footer.php'); ?>