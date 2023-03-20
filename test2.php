<?php session_start(); ?>

<?php require_once('./inc/header.php'); ?>


            <h1 class="isHeader">Admin_Business</h1>


        <div class="isSubHead">
            <h1>Users</h1>
        </div>

        <div class="dashboard"></div>

<table class="cont cont-layout">
        <thead class="cont cont-layout">
			<tr class="row1-layout inside-layout tblcnt">						
				<th class="cell">Id</th>					
				<th class="cell">Name</th>					
				<th class="cell">Email</th>
				<th class="cell">Password</th>	
				<th class="cell">Roles</th>	
				<th class="cell">LastLogin</th>	
				<th class="cell">Deleted</th>
                <th class="cell"></th>
                <th class="cell"></th>						
			</tr>
		</thead>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr bgcolor='#373737'>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['password'] . "</td>
                <td>" . $row['roles'] . "</td>
                <td>" . $row['lastLogin'] . "</td>
                <td>" . $row['deleted'] . "</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./phpFunc/functions/businessUser/update.php?id=".$row['id']."'><button class='edit-button' role='button'>Edit</button> </a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./phpFunc/functions/businessUser/delete.php?id=".$row['id']."'><button class='delete-button' role='button'>Delete</button> </a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>";
            }
        ?>

        </table>

        <div class="isHeader">
            <h1>Admin_Business</h1>
        </div>

        <div class="isSubHead">
            <h1>Users</h1>
        </div>

        

        <div>
            <div class="dashboard-content">Dashboard</div>
            <div><button onclick="document.getElementById('user.php')".style.display="none" class="dashboard-content-user"; style="border: 0cap;">User</button></div>
            <div><button onclick="document.getElementById('customer.php')" class="dashboard-content-user";">Customer</button></div>
        </div>

        <div>
            <span><button onclick="document.getElementById('addform').style.display='block'" class="addBtn addBtn-text">Add</button></span>
        </div>

<?php require_once('./inc/footer.php'); ?>

