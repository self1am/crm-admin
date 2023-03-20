<?php require_once('initialize.php'); ?>                
<div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                    <img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2" alt="User Image" style="height: 2rem;object-fit: cover">
                  </div>
                  <div class="info">
                    <a href="<?php echo base_url ?>admin/?page=user" class="d-block"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></a>
                  </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                   <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                    
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
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>