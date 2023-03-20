<?php require_once('../init.php'); ?>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" role="menu">
                    
    <li class="nav-header">Dashboard</li>
    <li class="nav-item dropdown">
        <a href="<?php echo base_url ?>admin/?page=user/user_list" class="nav-link nav-user_list">
            <i class="nav-icon fas fa-users"></i>
                <p>
                    User List
                </p>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a href="<?php echo base_url ?>admin/?page=user/customer_list" class="nav-link nav-customer_list">
            <i class="nav-icon fas fa-user-friends"></i>
                <p>
                    Customer List
                </p>
        </a>
    </li>
                   
    </ul>
</nav>