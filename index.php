<?php 

require_once('header.php');


?>
<!DOCTYPE html>
<html lang="en">
  
  <?php include('indexhtmlheader.php');?>

  <body class="nav-md">
    
    <!--menu top logo div-->
     <?php include('menutoplogodiv.php'); ?>
            
     <!-- /menu top logo div-->

            <!-- menu profile quick info -->
           <?php include('quickprofileinfodiv.php'); ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           <?php include('menu.php'); ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php include('menufooterbuttondiv.php'); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
      <?php include('topnavigationdetailsdiv.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
      <?php include('indexContents.php');?>
                 
        <!-- /page content -->

        <!-- footer content -->
       <?php include('htmlfooter.php'); ?>
        <!-- /footer content -->
      </div>
    </div>

   <?php include('libraries.php'); ?>
	
  </body>
</html>