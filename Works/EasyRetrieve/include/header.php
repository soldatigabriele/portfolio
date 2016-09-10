<header class="main-header" id="">

  <!-- Titolo pagina -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Stop</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>EasyRetrieve</b></span>
  </a>

  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    
            <div class="navbar-custom-menu">
                <form method="post" action="../php/settings.php" <?php if(!isset($_SESSION['key2'])){echo'hidden=""';}; ?> data-ajax=false>                
                    <div class="col-md-2" style="padding:5px 80px">                  
                      <input class="btn btn-default " name="settings" type="submit" data-inline="true" value="Settings">
                    </div>
                </form>
                <form method="post" action="../login/logout.php" <?php if(!isset($_SESSION['key'])){echo'hidden=""';}; ?> data-ajax=false>                
                    <div class="col-md-2" style="padding:5px;">                  
                      <input class="btn btn-default " name="logout" type="submit" data-inline="true" value="Logout">
                    </div>
                </form>
          </div>

  </nav>
</header>