<?php include('conf.php'); ?>
  <aside class="main-sidebar" id="menu">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left info"></div>
          </div>
        
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">HOME</li>
            <li class="treeview">
              <a href="<?php echo WS_HOME ?>">
                <i class="glyphicon glyphicon-home"></i> 
                <span>Home</span>
              </a>
            </li>
            <li class="header">GOOGLE STREETVIEW</li>
            <li class="treeview">
              <a href="<?php echo WS_INDEX ?>">
                <i class="glyphicon glyphicon-road"></i> 
                <span>Retrieve</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo WS_DIR ?>">
                <i class="fa fa-th"></i> 
                <span>Results</span>
              </a>
            </li>
            <li class="header">INSTAGRAM</li>
            <li class="treeview active">
              <a href="<?php echo WS_INSTA ?>">
                <i class="glyphicon glyphicon-picture"></i> 
                <span>Retrieve</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo WS_INSTARES ?>">
                <i class="fa fa-th"></i> 
                <span>Results</span>
              </a>
            </li>
          </ul>

        </section>
      </aside>

