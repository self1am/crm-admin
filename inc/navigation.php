<?php require_once('initialize.php'); ?>                

                <ul>
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