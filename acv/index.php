<?php session_start() ?>
<?php require_once('../initialize.php'); ?>


<?php require_once('./phpFunc/connection/connect.php'); ?>
    
<?php require_once('../inc/header.php'); ?>


<body>

    <table>
    <tr>

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
        while ($row = mysqli_fetch_assoc($result)) {
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
            <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#abc?id=" . $row['customer_id'] . "'><button class='edit-button' role='button'>Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>";
        }
    ?>

    </table>

</body>

</html>