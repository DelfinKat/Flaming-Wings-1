<?php 
session_start();
if (!isset($_SESSION['user_name'])) {
  header("log_in.php");
}
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Recipe</title>
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

    <?php 
    include("dbconnection.php"); 
    ?>



   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

    

      <header class="main-header">
        <!-- Logo -->
        <a href="MAIN.php" class="logo">
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
                <!-- LOGOUT BUTTON -->
              <li class="dropdown user user-menu">
                <a class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">
                 
                 <?php 
                      $sql = mysqli_query($connect, "SELECT firstName, lastName FROM users WHERE user_name = '".$_SESSION['user_name']."'"); 
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<p>" . $row['firstName'] . " " . $row['lastName'] .  "</p>";}?> 
                  </span>
                </a>
              </li>
              <!-- Control Sidebar Toggle Button -->

             <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu">
                  
                   <li><a href='logout.php'>Logout</a></li>
                </ul>
              </li> 
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
            <li class="active treeview">
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
                <li><a href="SearchRecipe.php"><i class="fa fa-circle-o"></i> Search Recipe</a></li>
                <li><a href="AddRecipe.php"><i class="fa fa-circle-o"></i> Add Recipe</a></li>
                <li><a href="EditRecipe.php"><i class="fa fa-circle-o"></i> Edit Recipe</a></li>
                <li><a href="DeactivateRecipe.php"><i class="fa fa-circle-o"></i> Deactivate Recipe</a></li>
                <li><a href="reactivaterecipe.php"><i class="fa fa-circle-o"></i> Reactivate Recipe</a></li>
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
                <li><a href="SearchStock.php"><i class="fa fa-circle-o"></i> Search Stock</a></li>
                <li><a href="AddStock.php"><i class="fa fa-circle-o"></i> Add new Stock</a></li>
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
                <li><a href="http://localhost/Flaming-Wings/VerifyStock.php"><i class="fa fa-circle-o"></i>Stock Controller</a></li>
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
       <section class="content">
       
            <!-- END OF MODAL -->

        <!--SEARCH-->
      <form action="SearchEditRecipeBar.php" method="post" class="sidebar-form">
            <div class="col-xs-10">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>SEARCH RECIPE TO BE EDITED</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="query" class="col-sm-5 control-label">Search by Recipe ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="query" name="query" placeholder="Enter Recipe ID" required>
                      </div>
                    </div>
                  <div class="box-footer">
                   <input type="submit" class="btn btn-info pull-right" value="Submit"/>
                  </div><!-- /.box-footer -->
                </form>
              </div>
            </div>
          </form>




          <!--RECIPES (EDIT)--> 
           <div class="row">
            <div class="col-xs-10">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>EDIT RECIPE</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="stocktable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                         </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="recipeResults" class="table table-bordered table-hover">
                    <thead>

                      <tr>
                        <th>Recipe ID</th> <!--recipe id-->
                        <th>Recipe Type</th> <!--recipe type-->
                        <th>Recipe Name</th> <!--recipe name-->
                     

                      </tr>
                    </thead>
                    <form action="EditTheRecipe.php" method="get">
                    <tbody>
                     
                       <?php
                        $stock_code = isset($_GET['recipe_name']) ? $_GET['recipe_name'] : '';
                          $sql = mysqli_query($connect, "SELECT recipe_id, recipe.recipe_name, recipe_type FROM recipe, recipetype WHERE deactivate != 1 AND recipe.recipe_typeid=recipetype.recipe_typeid order by recipe.recipe_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['recipe_id']."</td>"; //recipe id
                          echo "<td>".$row["recipe_type"]."</td>"; //type
                          echo "<td>".$row["recipe_name"]."</td>"; //recipe name
                          echo "<td><a href='EditTheRecipe.php?varname=".$row['recipe_id']."'> Edit</a></td>";

                          echo "</tr>";

                      
                        }
                         ?>
                        
                    </tbody>
                  </form>
                  </table>
                   <div class="box-footer">
                   
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



            </section><!-- right col -->
          </div><!-- /.row (main row) -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



    
      
    </div><!-- ./wrapper -->





          <!---TABLE FOR RECIPE-->




          <!---TABLE FOR RECIPE-->
          

    

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
