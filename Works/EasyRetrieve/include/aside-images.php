<?php include('function.php'); ?>
<?php include('conf.php'); ?>

<?php $D_NAME=$_GET["D_NAME"]; ?>
<?php $D_ID=$_GET["D_ID"]; ?>


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
            <li class="treeview active">
              <a href="<?php echo WS_DIR ?>">
                <i class="fa fa-th"></i> 
                <span>Results</span>
              </a>
            </li>
            <ul class="treeview-menu menu-open" style="display: block;">
              <li class="active"><a <?php echo 'href="'.WS_RES.'?D_ID='.$D_ID.'&D_NAME='.$D_NAME.'"'; ?> ><i class="fa fa-circle-o"></i> <?php echo $D_NAME; ?></a></li>
                <ul class="treeview-menu menu-open" style="display: block;">

                    <?php dbConnect();
                      $query="SELECT * FROM Search WHERE D_ID = $D_ID";
                      $ris=mysql_query($query);
                      while ($riga=mysql_fetch_array($ris)) {
                      echo '<li><a href="'.WS_IMAGES.'?D_ID='.$D_ID."&D_NAME=".$D_NAME.'&img='.$riga["Latitude"]."_".$riga["Longitude"].'&name='.$riga["name"].'"><i class="fa fa-circle-o"></i>'.$riga["name"].'</a></li>';
                        }

                      dbClose();
                    ?> 
               </ul>
            </ul>
            <li class="header">INSTAGRAM</li>
            <li class="treeview">
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



