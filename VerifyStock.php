<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION["guest"])) {
  header("login.php");
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Stock Controller</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


   <!-- PHP --> 
   <?PHP 
   include("dbconnection.php")

   ?>

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="http://localhost/Flaming-Wings/MAIN.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <!-- logo for regular state and mobile devices -->
          <img src="logoo.jpg" alt="Mountain View" style="width:200px;height:50px;">
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


             
              <!-- NOTIFICATION -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>




              <!-- UPPER RIGHT CORNER -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Brooklyn Beckham</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Brooklyn Beckham - Manager
                      <small>Member since Nov. 2016</small>
                    </p>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>






      <!--UPPER LEFT CORNER-->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Brooklyn Beckham</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          



          <!-- SIDEBAR MENU -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!--DASHBOARD-->
            <li class="treeview">
              <a href="MAIN.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>





            <!---RECIPE -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Recipe</span>
                <span class="label label-primary pull-right"></span>
              </a>

              <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/SearchRecipe.php"><i class="fa fa-circle-o"></i> Search Recipe</a></li>
                <li><a href="http://localhost/Flaming-Wings/AddRecipe.php"><i class="fa fa-circle-o"></i> Add Recipe</a></li>
                <li><a href="http://localhost/Flaming-Wings/EditRecipe.php"><i class="fa fa-circle-o"></i> Edit Recipe</a></li>
                <li><a href="http://localhost/Flaming-Wings/DeactivateRecipe.php"><i class="fa fa-circle-o"></i> Deactivate Recipe</a></li>
                 <li><a href="http://localhost/Flaming-Wings/reactivaterecipe.php"><i class="fa fa-circle-o"></i> Reactivate Recipe</a></li>
              </ul>
            </li>




             <!--STOCKS-->
             <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Stocks</span>
                <span class="label label-primary pull-right"></span>
              </a>

              <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/SearchStock.php"><i class="fa fa-circle-o"></i> Search Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/AddStock.php"><i class="fa fa-circle-o"></i> Add new Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/ReplenishStock.php"><i class="fa fa-circle-o"></i> Replenish Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/EditStock.php"><i class="fa fa-circle-o"></i> Edit Stock</a></li>
                <li><a href="http://localhost/Flaming-Wings/WithdrawStock.php"><i class="fa fa-circle-o"></i> Withdraw Stock</a></li>
              </ul>
            </li>





            <!--INVENTORY REPORTS-->
         <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i>
                <span>Inventory Reports</span>
                <span class="label label-primary pull-right"></span>
              </a>

              <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/InventoryReport.php"><i class="fa fa-circle-o"></i> Inventory Report</a></li>
                <li><a href="http://localhost/Flaming-Wings/VerifyStock.php"><i class="fa fa-circle-o"></i>Stock Controller</li>
                 <li><a href="http://localhost/Flaming-Wings/MostSold.php"><i class="fa fa-circle-o"></i> Most sold order</a></li>
              </ul>
            </li>
        <!-- /.sidebar -->

          <!--CONVERSION-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calculator"></i> 
                <span>Conversion</span> 
                <span class="label label-primary pull-right"></span>
              </a>


               <ul class="treeview-menu">
                <li><a href="http://localhost/Flaming-Wings/Conversion.php"><i class="fa fa-circle-o"></i>Conversion Table</a></li>
              </ul>
            </li>
      </aside>


      

  <div class="content-wrapper">
       <section cl ass="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Verify Stock</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="VerifyStock1.php" method="post">
                  <div class="box-body">
                   
                    <div class="form-group">
                      <label>Stock Name</label>
                      <select class="form-control" name="sname" required
                      value="<?php if (isset($_POST['sname']) && !$flag) echo $_POST['sname']; ?>">
                        <option value="" disabled selected> -- ID -- Stock Name -- In-stock --</option> 
                        
                        <?php
                        $sql = mysqli_query($connect, "SELECT SUM(r.qty) AS qty, sname, s.stock_id, pack_name, s.qty AS sqty, unit_name FROM replenishstock AS r, stock AS s, unitpackaging AS p, unitmeasurement AS u WHERE s.stock_id=r.stock_id AND p.pack_id=s.pack_id AND s.unit_id=u.unit_id AND deactivate=0 GROUP BY s.stock_id");
                        while ($row = mysqli_fetch_array($sql)){
                           echo "<option value=\"" . $row['stock_id'] . "\">".$row['stock_id']. " -- ".$row['sname']. " -- " .$row['qty']. " ".$row['pack_name']. " (" .$row['sqty']. " " .$row['unit_name']. ")</option>"; 
                        }
                         ?>
                      </select>
                      
                    </div>
                      <div class="form-group">
                      <label for="InputQty">Actual Quantity</label>
                      <input type="number" min="0" step="any" class="form-control" id="InputQty" placeholder="Quantity" name="qty" required>
                    </div>

                    <!-- DATE -->
                      <div class="form-group">
                        <label for="inputdtReceived">Date Verified</label>
                       
                        <input type="date" class="form-control" id="inputdtReceived" name="dtVerified" required value="<?php echo date('Y-m-d'); ?>" />
                        
                       </div>  

                    
                    <div class="form-group">
                      <label for="InputRemarks">Remarks</label>
                      <input type="text" class="form-control" rows="3" id="InputRemarks" placeholder="Remarks..." name="remarks" required>
                    </div>
                  

                    
                       <div class="form-group">
                      <label>Person in-charge</label>
                      <select class="form-control" name="user_name" required
                      value="<?php if (isset($_POST['user_name']) && !$flag) echo $_POST['user_name']; ?>">
                        <option value="" disabled selected> -- Employees --</option> 
                     
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM users u, employee_type type WHERE type.employee_type='Stock Controller' AND type.user_type_id= u.user_type_id");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['user_id'] . "\">" . $row['user_name'] . "</option>";
                        }
                         ?>
                      </select>
                    </div>


                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Verify Stock</button>
                  </div>
                </form>
              </div><!-- /.box -->




    </div><!-- ./wrapper -->
          
          

 
          
          





          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
